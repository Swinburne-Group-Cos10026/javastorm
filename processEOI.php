<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Process EOI Records"/>
    <meta name="keywords" content="Database, MySQL, PHP, Server, Data Validation, EOI"/>
    <meta name="author" content="Khai Wen Lee"/>
    <title>EOI Submission Confirmation</title>
</head>
<body>
    <h1>EOI Submission Confirmation</h1>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);

        session_start(); //store the EOInumber so that it can be accessed from the confirmation page
        $_SESSION["form_data"] = $_POST;// Store the form data in session
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

            if (isset($_POST["skill"]) && in_array("others", $_POST["skill"]) && (empty($otherSkills) || trim($otherSkills) === "")) {
                $errMsg[] = "<p><strong><em>Other Skills Required:</em></strong> Please provide the other skills you possess.</p>";
            }
            
            //Redirect to error page 
            if (!empty($errMsg)) {
                $_SESSION["errors"] = $errMsg;
                header("location: error.php");
                exit;
            }

            //Database
            require_once("settings.php");

            $conn = @mysqli_connect($host, $user,$pwd,$sql_db);

            if(!$conn) {
                echo "<p>Database connection failure.</p>";
            } else {
                $applicants_table = "APPLICANTS";
                $eoi_table = "EOI";

                //Check if the EOI table exists, and create it if necessary
                $createEOIQuery = "CREATE TABLE IF NOT EXISTS EOI (
                            eoi_id varchar(255) NOT NULL,
                            job_reference_number VARCHAR(255) NOT NULL,
                            applicant_email VARCHAR(255) NOT NULL,
                            skill1 VARCHAR(255),
                            skill2 VARCHAR(255),
                            skill3 VARCHAR(255),
                            skill4 VARCHAR(255),
                            skill5 VARCHAR(255),
                            other_skills TEXT,
                            status ENUM ('New', 'Current', 'Final') DEFAULT 'New',
                            PRIMARY KEY (eoi_id),
                            FOREIGN KEY (job_reference_number) REFERENCES JOB(job_reference_number),
                            FOREIGN KEY (applicant_email) REFERENCES APPLICANTS(email)
                            )";
                //Execute query & check its execution
                $createEOIResult = mysqli_query($conn, $createEOIQuery);
                if (!$createEOIResult) {
                    die("<p>Error: The EOI table cannot be created.</p>");
                }

                //Check if Job Reference Number exists before insert records
                $jobExistQuery = "SELECT * FROM JOB WHERE job_reference_number = '". mysqli_real_escape_string($conn, $jobReferenceNum) ."'";
                $jobExistResult = mysqli_query($conn, $jobExistQuery);
                $jobExist = mysqli_num_rows($jobExistResult) > 0;

                if ($jobExist) {
                    //Check email existence in the APPICANTS table
                    $emailExistQuery = "SELECT * FROM APPLICANTS WHERE email = '". mysqli_real_escape_string($conn, $email) ."'";
                    $emailExistResult = mysqli_query($conn, $emailExistQuery);
                    $emailExist = mysqli_num_rows($emailExistResult) > 0;
                    //Insert into Applicants if email does not exist
                    if (!$emailExist) {
                        $insertApplicantQuery = "INSERT INTO APPLICANTS (
                            first_name,
                            last_name,
                            street_address,
                            suburb_town,
                            state,
                            postcode,
                            email,
                            phone_number
                        ) VALUES (
                            '" . mysqli_real_escape_string($conn, $firstName) ."',
                            '" . mysqli_real_escape_string($conn, $lastName) ."',
                            '" . mysqli_real_escape_string($conn, $streetAddress) ."',
                            '" . mysqli_real_escape_string($conn, $suburbTown) ."',
                            '" . mysqli_real_escape_string($conn, $state) ."',
                            '" . intval($postcode) ."',
                            '" . mysqli_real_escape_string($conn, $email) ."',
                            '" . mysqli_real_escape_string($conn, $phoneNumber) ."'
                        )";   
                        $insertApplicantResult = mysqli_query($conn, $insertApplicantQuery);
                        if (!$insertApplicantResult) {
                            die("<p>Error: There is an error inserting applicant's record.</p>");
                        }
                    }

                    //Check if the applicant has submmitted more than one EOI under same job position
                    $EOIExistQuery = "SELECT * FROM EOI 
                                        WHERE job_reference_number = '". mysqli_real_escape_string($conn, $jobReferenceNum) ."'
                                        && applicant_email = '". mysqli_real_escape_string($conn, $email) ."'";
                    $EOIExistResult = mysqli_query($conn, $EOIExistQuery);
                    $EOIExist = mysqli_num_rows($EOIExistResult) > 0;

                    if (!$EOIExist) {
                        //Generate unique EOI ID with the desired format
                        //-- Retrieve the next increment value from the table
                        $selectLastEOIQuery = "SELECT MAX(eoi_id) AS max_id FROM EOI";
                        $selectLastEOIResult = mysqli_query($conn, $selectLastEOIQuery);
                        $row = mysqli_fetch_assoc($selectLastEOIResult);
                        $lastID = $row ? $row["max_id"] : 'EOI-' . date('Y') . '-0';
                        //strpos() finds the last occurrence of the '-' character
                        //substring() extracts the substring starting from that position until the end
                        $lastNumber = explode("-", $lastID);
                        $lastNumber = $lastNumber[2];
                        $nextNumber = $lastNumber + 1; //extract the number based on index
                        $eoiID = 'EOI-' . date('Y') . '-' . $nextNumber;

                        //Insert EOI records
                        $insertEOIQuery = "INSERT INTO EOI (
                            eoi_id,
                            job_reference_number,
                            applicant_email,
                            skill1,
                            skill2,
                            skill3,
                            skill4,
                            skill5,
                            other_skills
                        ) VALUES (
                        '" . mysqli_real_escape_string($conn, $eoiID). "',
                        '" . mysqli_real_escape_string($conn, $jobReferenceNum). "',
                        '" . mysqli_real_escape_string($conn, $email). "',
                        " . (isset($skills[0]) ? "'" . mysqli_real_escape_string($conn, $skills[0]). "'" : "NULL") . ",
                        " . (isset($skills[1]) ? "'" . mysqli_real_escape_string($conn, $skills[1]). "'" : "NULL") . ",
                        " . (isset($skills[2]) ? "'" . mysqli_real_escape_string($conn, $skills[2]). "'" : "NULL") . ",
                        " . (isset($skills[3]) ? "'" . mysqli_real_escape_string($conn, $skills[3]). "'" : "NULL") . ",
                        " . (isset($skills[4]) ? "'" . mysqli_real_escape_string($conn, $skills[ 4]). "'" : "NULL") . ",
                        " . (isset($otherSkills) ? "'" . mysqli_real_escape_string($conn, $otherSkills). "'" : "NULL") . "
                        )";
                    
                        $insertEOIResult = mysqli_query($conn, $insertEOIQuery);
                        if (!$insertEOIResult) {
                            die("<p>Error: There is an error inserting this EOI record.</p>");
                        }

                        //Confirmation message
                        echo "<p><strong>EOI submitted successfully!</strong>
                        <br />Thank you for submitting your expression of interest. Your EOI number is: <strong>$eoiID</strong>.</p>";
                    } else {
                        echo "<p><strong>EOI Submission Received</strong> 
                        <br />We have received your Expression of Interest (EOI) for the job position previouly. Kindly await our response.</p>";
                        echo "<p><a href='index.php'>Home Page</a></p>";
                    }
                } else {
                    echo "<p><strong>Job Reference Number Does Not Exist</strong> 
                    <br /> Please ensure that you are entering a valid Job Reference Number.</p>";
                    echo "<p>Go back to the <a href='apply.php'>Application Form Page</a>.</p>";
                }
    
                mysqli_close($conn);
                unset($_SESSION["form_data"]);
            } 
        } else {
            header("location: apply.php");
        }
    ?>
</body>
</html>

<!-- References
https://www.w3schools.in/php/operators/ternary-operator 
https://www.w3schools.com/php/php_form_url_email.asp 
https://postcodes-australia.com/state-postcodes/vic -->