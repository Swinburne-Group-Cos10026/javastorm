<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Java Developer Decriptions Page">
	<meta name="keywords" content="HTML, CSS, Job Description, Java Developer">
	<meta name="author" content="Khai Wen Lee">
	<title>Java Developer Description</title>
	<!--Reference for CSS Stylesheet-->
	<link href="styles/style.css" rel="stylesheet">
</head>

<body>
	<header id="header__job--description">
		<div id="navbar">
			<?php include "./common/header.inc" ?>
			<?php 
				include("./common/menu.php");
				navbar("Jobs");
			?>
		</div>
	</header>
	<main class="job--description">
		<?php
			try {
				require_once("common/utils.php");
				if (!isset($_GET["job"]))
					throw new Exception("Please select a job from jobs.php page");

				require_once("dbconfig/settings.php");
				$conn = mysqli_connect(
					$host,
					$user,
					$pwd,
					$sql_db
				);

				$query = "SELECT * FROM job WHERE job_reference_number=" . $_GET['job'] . ";";
				$result = mysqli_query($conn, $query);

				$row = mysqli_fetch_assoc($result);

				echo $row["html_page"];

				mysqli_close($conn);

				echo "<a class='btn' href='apply.html'>Apply</a>";
			} catch(Exception $err) {
				echo "<section><h1>Job Not Found</h1></section>";
				echo "<p>ERROR: " . $err->getMessage() . "</p>";
				echo "<a href='jobs.php' class='link'>Back</a>";
			}
		?>
	</main>
	<?php include "./common/footer.inc" ?>
</body>

</html>
