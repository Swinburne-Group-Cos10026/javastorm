<!DOCTYPE html>
<html>

<head>
	<title>Job Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Cong Hiep Pham, Le Minh Vu" />
	<!--Reference for CSS Stylesheet-->
	<!-- <link href="styles/style.css" rel="stylesheet"> -->
</head>

<body>
	<?php 
	session_start();

	//function to populate form field values from session data
	function populateFormField($fieldName, $fieldValue = null) {
		if (isset($_SESSION["form_data"]) && isset($_SESSION["form_data"][$fieldName])) {
			$storedValues = $_SESSION["form_data"][$fieldName];

			if (is_array($storedValues)) {
				if(in_array($fieldValue, $storedValues)){ //compare the value of each checkbox
					echo "checked";
				}
			} else if ($storedValues == $fieldValue) { //compare the value of radio button
				echo "checked"; 
			} else { //print the value for each field
				echo 'value="' . $storedValues . '"';
			} 
		}
	}
	?>
	<header id="header__apply">
		<div id="navbar">
			<?php require_once "./common/header.inc" ?>
			<?php 
				require_once("./common/menu.php");
				navbar("Apply");
			?>
		</div>
	</header>
	<main>
		<form id="form__apply" action="processEOI.php" method="post">
			<h1>Job Application Form</h1>
			<div class="form-control" id="job-reference-number__container">
				<input type="text" id="job-reference-number" name="job-reference-number" pattern="[A-Za-z0-9]{5}"
					placeholder="Job Reference Number:" required <?php populateFormField("job-reference-number"); ?>>
				<label for="job-reference-number">Job Reference Number:</label>
			</div>

			<div class="form-control">
				<input type="text" id="first-name" name="first-name" maxlength="20" pattern="[A-Za-z]+"
					placeholder="First Name:" required <?php populateFormField("first-name"); ?>>
				<label for="first-name">First Name:</label>
			</div>

			<div class="form-control">
				<input type="text" id="last-name" name="last-name" maxlength="20" pattern="[A-Za-z]+" placeholder="Last Name:"
					required <?php populateFormField("last-name"); ?>>
				<label for="last-name">Last Name:</label>
			</div>

			<div class="form-control">
				<input type="email" id="email" name="email" placeholder="Email Address:" required <?php populateFormField("email"); ?>>
				<label for="email">Email Address:</label>
			</div>

			<div class="form-control">
				<input type="tel" id="phone-number" name="phone-number" pattern="[\d\s]{8,12}" placeholder="Phone Number:"
					required <?php populateFormField("phone-number"); ?>>
				<label for="phone-number">Phone Number:</label>
			</div>

			<div class="form-control" id="date-of-birth__container">
				<input type="text" id="date-of-birth" name="date-of-birth" pattern="\d{1,2}/\d{1,2}/\d{4}"
					placeholder="Date of Birth:" required <?php populateFormField("date-of-birth"); ?>>
				<label for="date-of-birth">Date of Birth:</label>
			</div>

			<fieldset class="form-control">
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-male" value="male" required <?php populateFormField("gender", "male"); ?>>
					<label for="gender-male">Male</label>
				</div>
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-female" value="female" <?php populateFormField("gender", "female"); ?>>
					<label for="gender-female">Female</label>
				</div>
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-other" value="other" <?php populateFormField("gender", "other"); ?>>
					<label for="gender-other">Other</label>
				</div>
			</fieldset>

			<div class="form-control" id="street-address__container">
				<input type="text" id="street-address" name="street-address" maxlength="40" placeholder="Street Address:"
					required <?php populateFormField("street-address"); ?>>
				<label for="street-address">Street Address:</label>
			</div>

			<div class="form-control" id="surburb-town__container">
				<input type="text" id="suburb-town" name="suburb-town" maxlength="40" placeholder="Suburb/Town:" required <?php populateFormField("suburb-town"); ?>>
				<label for="suburb-town">Suburb/Town:</label>
			</div>

			<div class="form-control">
    			<select id="state" name="state" required>
					<option value="" disabled selected>&nbsp;</option>
					<option value="VIC" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "VIC") echo "selected"; ?>>VIC</option>
					<option value="NSW" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "NSW") echo "selected"; ?>>NSW</option>
					<option value="QLD" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "QLD") echo "selected"; ?>>QLD</option>
					<option value="NT" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "NT") echo "selected"; ?>>NT</option>
					<option value="WA" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "WA") echo "selected"; ?>>WA</option>
					<option value="SA" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "SA") echo "selected"; ?>>SA</option>
					<option value="TAS" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "TAS") echo "selected"; ?>>TAS</option>
					<option value="ACT" <?php if (isset($_SESSION["form_data"]["state"]) && $_SESSION["form_data"]["state"] == "ACT") echo "selected"; ?>>ACT</option>
				</select>
    			<label for="state">State:</label>
			</div>

			<div class="form-control">
				<input type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="Postcode:" required <?php populateFormField("postcode"); ?>>
				<label for="postcode">Postcode:</label>
			</div>

			<h5>Skills</h5>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="communication" id="skill-communication" <?php populateFormField("skill", "communication"); ?>>
				<label for="skill-communication">Communication<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="teamwork" id="skill-teamwork" <?php populateFormField("skill", "teamwork"); ?>>
				<label for="skill-teamwork">Teamwork<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="leadership" id="skill-leadership" <?php populateFormField("skill", "leadership"); ?>>
				<label for="skill-leadership">Leadership<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="problem-solving" id="skill-problem-solving" <?php populateFormField("skill", "problem-solving"); ?>>
				<label for="skill-problem-solving">Problem Solving<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="creativity" id="skill-creativity" <?php populateFormField("skill", "creativity"); ?>>
				<label for="skill-creativity">Creativity<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="others" id="skill-others" <?php populateFormField("skill", "others"); ?>>
				<label for="skill-others">Other Skills<span class="box"></span></label>
				<div class="form-control" id="skill-others__textarea">
					<textarea id="other-skills" name="other-skills" rows="4" placeholder="Other Skills:" <?php populateFormField("other-skills"); ?>></textarea>
					<label for="other-skills">Other Skills:</label>
				</div>
			</div>

			<button class="btn" type="submit">Apply</button>
		</form>
	</main>
	<?php require_once "./common/footer.inc" ?>
	<style>
		<?php require_once 'styles/style.css'; ?>
		<?php require_once 'styles/pages/apply.css'; ?>
	</style>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>

</html>


