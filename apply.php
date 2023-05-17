<!DOCTYPE html>
<html>

<head>
	<title>Job Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Cong Hiep Pham, Le Minh Vu" />
	<!--Reference for CSS Stylesheet-->
	<link href="styles/style.css" rel="stylesheet">
</head>

<body>
	<header id="header__apply">
		<div id="navbar">
		<?php include "./common/header.inc" ?>
		<?php 
				include("./common/menu.php");
				navbar("Apply");
			?>
		</div>
	</header>
	<main>
		<form id="form__apply" action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
			<h1>Job Application Form</h1>
			<div class="form-control" id="job-reference-number__container">
				<input type="text" id="job-reference-number" name="job-reference-number" pattern="[A-Za-z0-9]{5}"
					placeholder="Job Reference Number:" required>
				<label for="job-reference-number">Job Reference Number:</label>
			</div>

			<div class="form-control">
				<input type="text" id="first-name" name="first-name" maxlength="20" pattern="[A-Za-z]+"
					placeholder="First Name:" required>
				<label for="first-name">First Name:</label>
			</div>

			<div class="form-control">
				<input type="text" id="last-name" name="last-name" maxlength="20" pattern="[A-Za-z]+" placeholder="Last Name:"
					required>
				<label for="last-name">Last Name:</label>
			</div>

			<div class="form-control">
				<input type="email" id="email" name="email" placeholder="Email Address:" required>
				<label for="email">Email Address:</label>
			</div>

			<div class="form-control">
				<input type="tel" id="phone-number" name="phone-number" pattern="[\d\s]{8,12}" placeholder="Phone Number:"
					required>
				<label for="phone-number">Phone Number:</label>
			</div>

			<div class="form-control" id="date-of-birth__container">
				<input type="text" id="date-of-birth" name="date-of-birth" pattern="\d{1,2}/\d{1,2}/\d{4}"
					placeholder="Date of Birth:" required>
				<label for="date-of-birth">Date of Birth:</label>
			</div>

			<fieldset class="form-control">
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-male" value="male" required>
					<label for="gender-male">Male</label>
				</div>
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-female" value="female">
					<label for="gender-female">Female</label>
				</div>
				<div class="form-control">
					<input name="gender" class="radio" type="radio" id="gender-other" value="other">
					<label for="gender-other">Other</label>
				</div>
			</fieldset>

			<div class="form-control" id="street-address__container">
				<input type="text" id="street-address" name="street-address" maxlength="40" placeholder="Street Address:"
					required>
				<label for="street-address">Street Address:</label>
			</div>

			<div class="form-control" id="surburb-town__container">
				<input type="text" id="suburb-town" name="suburb-town" maxlength="40" placeholder="Suburb/Town:" required>
				<label for="suburb-town">Suburb/Town:</label>
			</div>

			<div class="form-control">
				<select id="state" name="state" required>
					<option value="" disabled selected></option>
					<option value="VIC">VIC</option>
					<option value="NSW">NSW</option>
					<option value="QLD">QLD</option>
					<option value="NT">NT</option>
					<option value="WA">WA</option>
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="ACT">ACT</option>
				</select>
				<label for="state">State:</label>
			</div>

			<div class="form-control">
				<input type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="Postcode:" required>
				<label for="postcode">Postcode:</label>
			</div>

			<h5>Skills</h5>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="communication" id="skill-communication">
				<label for="skill-communication">Communication<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="teamwork" id="skill-teamwork">
				<label for="skill-teamwork">Teamwork<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="leadership" id="skill-leadership">
				<label for="skill-leadership">Leadership<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="problem-solving" id="skill-problem-solving">
				<label for="skill-problem-solving">Problem Solving<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="creativity" id="skill-creativity">
				<label for="skill-creativity">Creativity<span class="box"></span></label>
			</div>
			<div class="form-control">
				<input type="checkbox" class="checkbox" name="skill[]" value="others" id="skill-others">
				<label for="skill-others">Other Skills<span class="box"></span></label>
				<div class="form-control" id="skill-others__textarea">
					<textarea id="other-skills" name="other-skills" rows="4" placeholder="Other Skills:"></textarea>
					<label for="other-skills">Other Skills:</label>
				</div>
			</div>

			<button class="btn" type="submit">Apply</button>
		</form>
	</main>
	<?php include "./common/footer.inc" ?>
</body>

</html>


