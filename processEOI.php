<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		header("location: apply.php");
	}
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Process EOI Records"/>
	<meta name="keywords" content="Database, MySQL, PHP, Server, Data _validation, EOI"/>
	<meta name="author" content="Khai Wen Lee"/>
	<title>EOI Submission Confirmation</title>
</head>
<body>
	<h1>EOI Submission Confirmation</h1>
	<?php
		error_reporting(E_ALL & ~E_NOTICE);
		require_once("common/utils.php");
		require_once("common/validations.php");

		try {
			$_SESSION["form_data"] = $_POST; // Store the form data in session
			$form_checking_list = [
				"job-reference-number",
				"first-name",
				"last-name",
				"email",
				"phone-number",
				"date-of-birth",
				"gender",
				"street-address",
				"suburb-town",
				"state",
				"postcode"
			];

			foreach ($form_checking_list as $form_checking_elm) {
				if (!check_isset_post($form_checking_elm))
					throw new Exception(format_missing_error(str_replace("-", " ", $form_checking_elm)));
			}

			//Sanitization
			$job_reference_num = sanitise_input($_POST["job-reference-number"]);
			$first_name = sanitise_input($_POST["first-name"]);
			$last_name = sanitise_input($_POST["last-name"]);
			$email = sanitise_input($_POST["email"]);
			$phone_num = sanitise_input($_POST["phone-number"]);
			$date_of_birth = sanitise_input($_POST["date-of-birth"]);
			$gender = $_POST["gender"];
			$street_addr = sanitise_input($_POST["street-address"]);
			$suburb_town = sanitise_input($_POST["suburb-town"]);
			$state = $_POST["state"];
			$postcode = sanitise_input($_POST["postcode"]);
			$skills = isset($_POST["skill"]) ? $_POST["skill"] : array();
			$other_skill = isset($_POST["other-skills"]) ? sanitise_input($_POST["other-skills"]): NULL;

			//_validation
			if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_reference_num))
				throw new Exception(format_invalid_error("Job Reference Number", ""));

			if (!preg_match("/^[A-Za-z]{1,20}$/", $first_name) || !preg_match("/^[A-Za-z]{1,20}$/", $last_name)) {
				throw new Exception(format_invalid_error(
					"First Name and Last Name",
					"First Name and Last Name must contain only <strong>letters</strong> and have a maximum length of <strong>20</strong>"
				));
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				throw new Exception(format_invalid_error("Email", ""));

			if (!preg_match("/^[0-9\s]{8,12}$/", $phone_num))
				throw new Exception(format_invalid_error("Phone Number", ""));
		
			if (!date_validation($date_of_birth) || !age_validation($date_of_birth))
				throw new Exception(format_invalid_error("Date of Birth", "Please ensure that your age is between 15 and 80."));

			if (!preg_match("/^.{1,40}$/", $street_addr) || !preg_match("/^.{1,40}$/", $suburb_town))
				throw new Exception(format_invalid_error("Address", "The street address  or suburb/town you provided can only have a maximum length of  <strong>40</strong>."));

			if (!preg_match("/^[0-9]{4}$/", $postcode)) {
				throw new Exception(format_invalid_error("Postcode", "Please ensure that the postcode is exactly <strong>4</strong> digits."));
			} else if (!postcode_states_matching($postcode, $state)) {
				throw new Exception(format_invalid_error("Postcode", "The selected postcode does not match with the states you selected."));
			}

			if (empty($skills) && empty($other_skill)) {
				throw new Exception(format_missing_error("Skills"));
			}

			if (isset($_POST["skill"]) && in_array("others", $_POST["skill"]) && (empty($other_skill) || trim($other_skill) === "")) {
				throw new Exception(format_invalid_error("Skills", "Please provide the other skills you possessed"));
			}
			
			//Database
			require_once("dbconfig/settings.php");

			$conn = mysqli_connect($host.':'.$port, $user,$pwd,$sql_db);

			$applicants_table = "APPLICANTS";
			$eoi_table = "EOI";

			//Check if the EOI table exists, and create it if necessary
			$create_eoi_query = "CREATE TABLE IF NOT EXISTS EOI (
				eoi_id  BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
				job_reference_number VARCHAR(255) NOT NULL,
				applicant_email VARCHAR(255) NOT NULL,
				skill1 VARCHAR(255),
				skill2 VARCHAR(255),
				skill3 VARCHAR(255),
				skill4 VARCHAR(255),
				skill5 VARCHAR(255),
				other_skills TEXT,
				status ENUM('New', 'Current', 'Final') DEFAULT 'New',
				PRIMARY KEY (eoi_id),
				FOREIGN KEY (job_reference_number) REFERENCES JOB(job_reference_number),
				FOREIGN KEY (applicant_email) REFERENCES APPLICANTS(email)
			);";
			//Execute query & check its execution
			$create_eoi_result = mysqli_query($conn, $create_eoi_query);
			if (!$create_eoi_result) {
				die("<p>Error: The EOI table cannot be created.</p>");
			}

			//Check if Job Reference Number exists before insert records
			$job_exist_query = "SELECT * FROM JOB WHERE job_reference_number = '". mysqli_real_escape_string($conn, $job_reference_num) ."'";
			$job_exist_result = mysqli_query($conn, $job_exist_query);
			$job_exist = mysqli_num_rows($job_exist_result) > 0;

			if (!$job_exist)
				throw new Exception("This job does not exist.");

			$mysqli_first_name = mysqli_real_escape_string($conn, $first_name);
			$mysqli_last_name = mysqli_real_escape_string($conn, $last_name);
			$mysqli_street_addr = mysqli_real_escape_string($conn, $street_addr);
			$mysqli_suburb_town = mysqli_real_escape_string($conn, $suburb_town);
			$mysqli_state = mysqli_real_escape_string($conn, $state);
			$mysqli_postcode = intval($postcode);
			$mysqli_email = mysqli_real_escape_string($conn, $email);
			$mysqli_phone_num = mysqli_real_escape_string($conn, $phone_num);

			//Check email existence in the APPICANTS table
			$email_exist_query = "SELECT * FROM APPLICANTS WHERE email = '$mysqli_email'";
			$email_exist_result = mysqli_query($conn, $email_exist_query);
			$email_exist = mysqli_num_rows($email_exist_result) > 0;
			//Insert into Applicants if email does not exist

			if (!$email_exist) {
				$insert_applicant_query = "INSERT INTO APPLICANTS (
					first_name,
					last_name,
					street_address,
					suburb_town,
					state,
					postcode,
					email,
					phone_number
				) VALUES (
					'$mysqli_first_name',
					'$mysqli_last_name',
					'$mysqli_street_addr',
					'$mysqli_suburb_town',
					'$mysqli_state',
					'$mysqli_postcode',
					'$mysqli_email',
					'$mysqli_phone_num'
				)";
				$insert_applicant_result = mysqli_query($conn, $insert_applicant_query);
				if (!$insert_applicant_result) {
					die("<p>Error: There is an error inserting applicant's record.</p>");
				}
			}

			//Check if the applicant has submmitted more than one EOI under same job position
			$eoi_exist_query = "SELECT * FROM EOI 
								WHERE job_reference_number = '". mysqli_real_escape_string($conn, $job_reference_num) ."'
								&& applicant_email = '". mysqli_real_escape_string($conn, $email) ."'";
			$eoi_exist_result = mysqli_query($conn, $eoi_exist_query);
			$eoi_exist = mysqli_num_rows($eoi_exist_result) > 0;

			try {
				//Insert EOI records
				$insert_eoi_query = "INSERT INTO EOI (
					job_reference_number,
					applicant_email,
					skill1,
					skill2,
					skill3,
					skill4,
					skill5,
					other_skills
				) VALUES (
				'" . mysqli_real_escape_string($conn, $job_reference_num). "',
				'$mysqli_email',
				" . (isset($skills[0]) ? "'" . mysqli_real_escape_string($conn, $skills[0]). "'" : "NULL") . ",
				" . (isset($skills[1]) ? "'" . mysqli_real_escape_string($conn, $skills[1]). "'" : "NULL") . ",
				" . (isset($skills[2]) ? "'" . mysqli_real_escape_string($conn, $skills[2]). "'" : "NULL") . ",
				" . (isset($skills[3]) ? "'" . mysqli_real_escape_string($conn, $skills[3]). "'" : "NULL") . ",
				" . (isset($skills[4]) ? "'" . mysqli_real_escape_string($conn, $skills[ 4]). "'" : "NULL") . ",
				" . (isset($other_skill) ? "'" . mysqli_real_escape_string($conn, $other_skill). "'" : "NULL") . "
				)";
			
				$insert_eoi_result = mysqli_query($conn, $insert_eoi_query);
				if (!$insert_eoi_result) {
					die("<p>Error: There is an error inserting this EOI record.</p>");
				}

				//Confirmation message
				echo "<p><strong>EOI submitted successfully!</strong>";
				echo "<p><strong>Your id is " . mysqli_insert_id($conn) . ".</strong></p>";
				} catch(Exception $e) {
					echo "<p><strong>EOI Submission Received</strong> 
					<br />We have received a large number of application.</p>";
				}
			
			echo "<p><a href='index.php'>Home Page</a></p>";
			unset($_SESSION["form_data"]);
		} catch (Exception $e) {
			$_SESSION["errors"] = $e->getMessage();
			header("location: error.php");
		}
	?>
</body>
</html>

<!-- References
https://www.w3schools.in/php/operators/ternary-operator 
https://www.w3schools.com/php/php_form_url_email.asp 
https://postcodes-australia.com/state-postcodes/vic -->
