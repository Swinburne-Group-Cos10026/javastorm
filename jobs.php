<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Position Decriptions Page" />
	<meta name="keywords" content="HTML, CSS, Job Description, Java Developer" />
	<meta name="author" content="Khai Wen Lee, Le Minh Vu" />
	<title>Job Description</title>
	<!--Reference for CSS Stylesheet-->
	<link href="styles/style.css" rel="stylesheet" />
</head>

<body>
	<header id="header__jobs">
		<div id="navbar"> 
		<?php include "./common/header.inc" ?>
			<nav>
				<a href="index.php">Home</a>
				<a href="about.php">About us</a>
				<a class="nav-link__current" href="jobs.php">Jobs</a>
				<a href="apply.php">Apply</a>
				<a href="enhancements.php">Enhancements</a>
				<div id="indicator"></div>
			</nav>
		</div>
		<div id="banner">
			<section id="jointeam">
				<h1>JOIN OUR TEAM!!!</h1><br>
				<p> Head over to jobs <br> to apply.<br><a href="apply.html" class="link">Apply now!!</a></p>
			</section>
		</div>
	</header>
	<main>
		<div class="job">
			<section class="job_overview">
				<h4>Java Developer</h4>
				<p class="job_location"><img class="icon" src="images/location_icon.png" alt="location icon">Melbourne, VIC 3000
				</p>
				<p class="job_overview_info">Anchored in <em>JAVASTORM Digital Product Department</em>, responsible for
					delivering
					the best value in software applications for our internal and external clients.</p>
			</section>

			<div class="job_details">
				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/salary_icon.png" alt="salary icon"></p>
					<p class="job_details--info">: $70,000 - $85,000</p>
				</div>

				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/jobtype_icon.png" alt="jobtype icon"></p>
					<p class="job_details--info">: Full-Time, Contract</p>
				</div>

				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/shift_icon.png" alt="shift icon"></p>
					<p class="job_details--info">: 8h Mon to Fri</p>
				</div>
			</div>
			<div class="job_reference_number">
				<p>Reference Number: QWE12</p>
			</div>
			<a class="btn" href="jobs/java_developer.html">Show More</a>
		</div>

		<aside>
			<p>
				<strong>What&#39;s on Offer: </strong>
			</p>
			<ol>
				<li>Opportunity to work with the biggest players in the industry</li>
				<li>Stable and productive environment with exposure towards the latest technologies</li>
			</ol>
		</aside>

		<div class="job">
			<section class="job_overview">
				<h4>Security Analyst</h4>
				<p class="job_location"><img class="icon" src="images/location_icon.png" alt="location icon"> Melbourne, VIC
					3000</p>
				<p class="job_overview_info">Part of the <em>JavaStorm Digital Security Department</em> and specializes in
					software solution security initiatives across the group.</p>
			</section>

			<div class="job_details">
				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/salary_icon.png" alt="salary icon"></p>
					<p class="job_details--info">: $130,000 - $145,000</p>
				</div>

				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/jobtype_icon.png" alt="jobtype icon"></p>
					<p class="job_details--info">: Full-Time, Contract</p>
				</div>

				<div class="job_details--container">
					<p class="job_details--title"><img class="icon" src="images/shift_icon.png" alt="shift icon"></p>
					<p class="job_details--info">: Flexible - Mon to Fri</p>
				</div>
			</div>

			<div class="job_reference_number">
				<p id="ref">Reference Number: DEF67</p>
			</div>

			<a class="btn" href="jobs/security_analyst.html">Show More</a>
		</div>

		<aside>
			<p>
				<strong>What&#39;s on Offer: </strong>
			</p>
			<ol>
				<li>Opportunity to work with the biggest players in the industry</li>
				<li>Career advancement opportunities within the organization</li>
				<li>Supportive work environment with a focus on employee well-being</li>
			</ol>
		</aside>
	</main>

	<?php include "./common/footer.inc" ?>
</body>

</html>
