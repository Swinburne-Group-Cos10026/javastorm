DROP TABLE IF EXISTS job;
DROP TABLE IF EXISTS eoi;
DROP TABLE IF EXISTS EOI;
DROP TABLE IF EXISTS APPLICANTS;
DROP TABLE IF EXISTS JOB_DESCRIPTION;
DROP TABLE IF EXISTS JOB;
DROP TABLE IF EXISTS MANAGER;

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

CREATE TABLE MANAGER (
	manager_id INT AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role INT DEFAULT 0,
	PRIMARY KEY (manager_id)
);
