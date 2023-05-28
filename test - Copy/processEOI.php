<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Process EOI Records"/>
    <meta name="keywords" content="Database, MySQL, PHP, Server, Data Validation, EOI"/>
    <meta name="author" content="Khai Wen Lee"/>
    <title>Job Application Confirmation</title>
</head>
<body>
    <h1>Job Application Confirmation</h1>
    <?php
        session_start(); //store the EOInumber so that it can be accessed from the confirmation page
        //function definition
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
            return $data;
        }
    
        function dateValidation($date) {
            $dateFormat = "d/m/Y";

            $dateObj = DateTime::createFromFormat($dateFormat, $date); //check whether input date is in correct format
            if ($dateObj === false) {
                return false; // Invalid date format
            }

            // Check if the date is valid
            $day = $dateObj->format('d');
            $month = $dateObj->format('m');
            $year = $dateObj->format('Y');
            if (!checkdate($month, $day, $year)|| $dateObj->format($dateFormat) !== $date) {
                return false; // Invalid date
            }

            return true;
        }

        function ageValidation($date) {
            $dateFormat = "d/m/Y";
            $minAge = 15;
            $maxAge = 80;
        
            $dateObj = DateTime::createFromFormat($dateFormat, $date);
            
            if ($dateObj === false) {
                // Invalid date format
                return false;
            }
        
            // Calculate the age
            $today = new DateTime();
            
            if ($today > $dateObj) {
                $diff = $today->diff($dateObj);
                $age = $diff->y; // Retrieve the number of years
            
                return $age >= $minAge && $age <= $maxAge;
            }
            
            // Future date provided
            return false;
        }
        

        function postcodeStatesMatching ($postcode, $state) {
            $mapping = [
                "VIC"=> "/^3/",
                "NSW"=> "/^1|2/",
                "QLD"=> "/^4|9/",
                "NT"=> "/^08/",
                "WA"=> "/^6/",
                "SA"=> "/^5/",
                "TAS"=> "/^7/",
                "ACT"=> "/^0/"
            ];

            return preg_match($mapping[$state], $postcode);
        }

        //Variable declaration
        $errMsg = array();

        // Sanitize and validate form data
        if (isset($_POST["job-reference-number"], $_POST["first-name"], $_POST["last-name"], $_POST["email"], $_POST["phone-number"], $_POST["date-of-birth"],
        $_POST["gender"], $_POST["street-address"], $_POST["suburb-town"], $_POST["state"], $_POST["postcode"], $_POST["skill"]) || isset($_POST["other-skills"])) {
            //Sanitization
            $jobReferenceNum = sanitise_input($_POST["job-reference-number"]);
            $firstName = sanitise_input($_POST["first-name"]);
            $lastName = sanitise_input($_POST["last-name"]);
            $email = sanitise_input($_POST["email"]);
            $phoneNumber = sanitise_input($_POST["phone-number"]);
            $dateOfBirth = sanitise_input($_POST["date-of-birth"]);
            $gender = $_POST["gender"];
            $streetAddress = sanitise_input($_POST["street-address"]);
            $suburbTown = sanitise_input($_POST["suburb-town"]);
            $state = $_POST["state"];
            $postcode = sanitise_input($_POST["postcode"]);
            $skills = isset($_POST["skill"]) ? $_POST["skill"] : array();
            $otherSkills = isset($_POST["other-skills"]) ? sanitise_input($_POST["other-skills"]): NULL;

            //Validation
            if (empty($jobReferenceNum) || empty($firstName) || empty($lastName) || empty($email) || empty($phoneNumber) || empty($dateOfBirth) ||
            empty($gender) || empty($streetAddress) || empty($suburbTown) || empty($state) || empty($postcode) || empty($skills)) {
                $errMsg[]= "<p><strong><em>Error:</em></strong> All required fields must be filled.</p>";
            }

            if (!preg_match("/^[A-Za-z0-9]{5}$/", $jobReferenceNum)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> Please ensure that you are entering a valid Job Reference Number.</p>";
            }

            if (!preg_match("/^[A-Za-z]{1,20}$/", $firstName) || !preg_match("/^[A-Za-z]{1,20}$/", $lastName)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> First name and last name must contain only <strong>letters</strong> and have a maximum length of <strong>20</strong>.</p>";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> Please ensure that you are providing a correct <strong>format</strong> for the Email Address.</p>";
            }

            if (!preg_match("/^[0-9\s]{8,12}$/", $phoneNumber)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> Please ensure that you are providing a correct <strong>format</strong> for the Phone Number.</p>";
            }
        
            if (!dateValidation($dateOfBirth)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> Please ensure that you are providing a valid <strong>format and value</strong> for the Birth of Date.";
            }

            if (!ageValidation($dateOfBirth)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> You must in between the age range of <strong>15 - 80</strong> to apply for this job position.</p>";
            }

            if (empty($gender)) {
                $errMsg[]= "<p><strong><em>Empty Fields Provided:</em></strong> Please select your gender.";
            }

            if (!preg_match("/^.{1,40}$/", $streetAddress) || !preg_match("/^.{1,40}$/", $suburbTown)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> The street address  or suburb/town you provided can only have a maximum length of  <strong>40</strong>.</p>";
            }

            if (!preg_match("/^[0-9]{4}$/", $postcode)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> Please ensure that the postcode you provided is exactly  <strong>4</strong> digits.</p>";
            } else if (!postcodeStatesMatching($postcode, $state)) {
                $errMsg[]= "<p><strong><em>Invalid Fields Provided:</em></strong> The postcode you selected does not match with the states you selected.</p>";
            }

            if (empty($skills) && empty($otherSkills)) {
                $errMsg[]= "<p><strong><em>Empty Fields Provided:</em></strong> Please select at least one skill.";
            }

            if (isset($_POST["other-skills"]) && !empty($_POST["other-skills"]) && empty($otherSkills)) {
                $errMsg[]= "<p><strong><em>Other Skills Required:</em></strong> Please provide the other skills you possess.</p>";
            }

            Redirect to error page 
            if (!empty($errMsg)) {
                $_SESSION["errors"] = $errMsg;
                header("location: error.php");
                exit;
            };
        
        } 
        else {
            header("location : apply.php");
        }
        
    ?>
</body>
</html>

<!-- References
https://www.w3schools.in/php/operators/ternary-operator 
https://www.w3schools.com/php/php_form_url_email.asp 
https://postcodes-australia.com/state-postcodes/vic -->