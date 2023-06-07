<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Position Decriptions Page" />
	<meta name="keywords" content="HTML, CSS, Job Description, Java Developer" />
	<meta name="author" content="Khai Wen Lee, Le Minh Vu" />
	<title>Job Description</title>
</head>

<body>
	<header id="header__jobs">
		<div id="navbar"> 
		<?php require_once "./common/header.inc" ?>
		<?php 
				require_once("./common/menu.php");
				navbar("Jobs");
			?>
		</div>
		<?php 
				require_once("./common/banner.php");
				banner("Jobs");
			?>
	</header>
	<main>
		<?php
			try {
				require_once("dbconfig/settings.php");
				$conn = mysqli_connect(
					$host,
					$user,
					$pwd,
					$sql_db
				);

				$query = "SELECT * FROM JOB;";
				$result = mysqli_query($conn, $query);

				while ($row = mysqli_fetch_assoc($result)) {
					echo "<div class='job'>";
					echo "<section class='job_overview'>";
					echo "<h4>" . $row['position'] . "</h4>";
					echo "<p class='job_location'><img class='icon' src='images/location_icon.png' alt='location icon'>" . $row['address'] . "</p>";
					echo "<p class='job_overview_info'>" . $row['short_desc'] . "</p>";
					echo "</section>";

					echo "<div class='job_details'>";
					echo "<div class='job_details--container'>";
					echo "<p class='job_details--title'><img class='icon' src='images/salary_icon.png' alt='salary icon'></p>";
					echo "<p class='job_details--info'>:" . $row['salary'] . "</p>";
					echo "</div>";

					echo "<div class='job_details--container'>";
					echo "<p class='job_details--title'><img class='icon' src='images/jobtype_icon.png' alt='jobtype icon'></p>";
					echo "<p class='job_details--info'>: " . $row['jobtype'] . "</p>";
					echo "</div>";

					echo "<div class='job_details--container'>";
					echo "<p class='job_details--title'><img class='icon' src='images/shift_icon.png' alt='shift icon'></p>";
					echo "<p class='job_details--info'>: " . $row['shift'] . "</p>";
					echo "</div>";
					echo "</div>";
					echo "<div class='job_reference_number'>";
					echo "<p>Reference Number: " . $row['job_reference_number'] . "</p>";
					echo "</div>";
					echo "<a class='btn' href='jobs_desc.php?job=" . $row['job_reference_number'] . "'>Show More</a>";
					echo "</div>";
					echo $row['html_offer'];
				}
				mysqli_close($conn);
			} catch(Exception $err) {
				echo "<section>No job found</section>";
				echo "<p>ERROR: " . $err->getMessage() . "</p>";
			}
		?>
	</main>
	<?php require_once "./common/footer.inc" ?>
	<style>
		<?php require_once 'styles/style.css'; ?>
		<?php require_once 'styles/pages/jobs.css'; ?>
	</style>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>

</html>
