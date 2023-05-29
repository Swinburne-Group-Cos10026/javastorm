<!DOCTYPE html>
<html>

<head>
	<title>Job Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Le Minh Vu">
</head>

<body>
	<header id="header__apply">
		<div id="navbar">
			<?php session_start(); ?>
			<?php require_once "./common/header.inc" ?>
			<?php 
				require_once("./common/menu.php");
				navbar("PHP");
			?>
		</div>
	</header>
	<main>
		<h1>Enhancements PHP</h1>
		<section>
			<h3>Many-Many Relationship</h3>
			<section>
				<h5>What's special about it?</h5>
				<p>We use a Many-Many Relationship for the database. We have a separate table for Jobs and for Applicants.</P>
				<p>Let's take a look at the relationship between applicants and eoi first:</p>
				<p>So now if a person applies another position, we would not have redundant information</p>
				<p>The system still have some slight problem regarding temporary use applicants' email as the primary key instead of a register system for the applicants</p>
				<br>
				<p>Another relationship is between jobs and jobs' description.</p>
				<p>Since we have a separate page for more detail for each job, we decide to contain it in a separate table to reduce the size</p>
				<a href="apply.html" class="link">Link.</a>
			</section>
			<section>
				<h5>Implementations</h5>
				<p>
					Please take a look at our SQL below:
				</p>
				<pre>
CREATE TABLE JOB (
	job_reference_number VARCHAR(255) NOT NULL,
	position VARCHAR(255) NOT NULL,
	address VARCHAR(255) NOT NULL,
	salary VARCHAR(255) NOT NULL,
	jobtype VARCHAR(255) NOT NULL,
	shift VARCHAR(255) NOT NULL,
	short_desc TEXT NOT NULL,
	html_offer TEXT NOT NULL,
	PRIMARY KEY (job_reference_number)
);

CREATE TABLE JOB_DESCRIPTION (
	job_description_id INT NOT NULL AUTO_INCREMENT,
	job_reference_number VARCHAR(255) NOT NULL,
	html_page TEXT NOT NULL,
	FOREIGN KEY (job_reference_number) REFERENCES JOB(job_reference_number),
	PRIMARY KEY (job_description_id)
);
CREATE TABLE APPLICANTS (
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	street_address VARCHAR(255) NOT NULL,
	suburb_town VARCHAR(255) NOT NULL,
	state VARCHAR(255) NOT NULL,
	postcode INT NOT NULL,
	email VARCHAR(255) NOT NULL,
	phone_number VARCHAR(255) NOT NULL,
	PRIMARY KEY (email)
);

CREATE TABLE EOI (
	eoi_id  INT NOT NULL AUTO_INCREMENT,
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
);
				</pre>
			</section>
		</section>
		<section>
			<h3>Login for Managers</h3>
			<section>
				<h5>What's special about it?</h5>
				<p>
					We have password hashing system and verify password for the login.
				</p>
				<p>We prepare system to have register system for the admin with a role system.</p>
				<p>Due to we have met the required number of enhancements, we only introduce the poteintial of what we can expand the login system instead of also implementing register system.</p>
				<p>Since on Swinburne's sever, the PHP's version is 5.4 which doesn't have the default function password_hash(), we have to created one our own based on bcrypt algorithm.</p>
				<a href="manager_login.html" class="link">Link.</a>
			</section>
			<section>
				<h5>Implementations</h5>
				<p>
					Please take a look at our SQL below:
				</p>
				<pre>
CREATE TABLE MANAGER (
	manager_id INT AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role INT DEFAULT 0,
	PRIMARY KEY (manager_id)
);
				</pre>
			</section>
		</section>
	</main>
	<?php require_once "./common/footer.inc" ?> 
	<style>
		<?php require_once 'styles/style.css'; ?>
	</style>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>

</html>
