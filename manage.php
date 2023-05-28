<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Assignment 1 index">
	<meta name="keywords" content="navigation bar, index">
	<meta name="author" content="Burhanuddin kapasi">
	<title> Javastorm careers</title>
	<link href="styles/style.css" rel="stylesheet">
	<!-- <link href="styles/styleManage.css" rel="stylesheet"> </head> -->

<body>
	<header id="header__home">
		<div id="navbar">
			<?php include "./common/header.inc" ?>
			<?php 
			include("./common/menu.php");
			navbar("Home");
		?> </div>
		<?php 
			include("./common/banner.php");
			banner("Home");
		?>
	</header>
	<main>
		<p class="center">Search EOI</p>
		<form method="get" id="form__manage">
			<div class="form-control" id="first-name__container">
				<input type="text" id="first_name" name="first_name" pattern="[A-Za-z]+" maxlength="20"
					placeholder="First Name:" required>
				<label for="first_name">First Name:</label>
			</div>
			<div class="form-control" id="last_name__container">
				<input type="text" id="last_name" name="last_name" pattern="[A-Za-z]+" maxlength="20"
					placeholder="Last Name:" required>
				<label for="last_name">Last Name:</label>
			</div>
			<div class="form-control" id="job_reference_number__container">
				<select name="job_reference_number" id="job_reference_number">
					<option value="" selected>All</option>
					<option value="1">Java Developer</option>
					<option value="2">Data Analyst</option>
				</select>
			</div>
			<button type="submit" value="Search">Search</button> 
		</form>
		<br>
		<br>
		<br>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>eoi_id</th>
				<th>job_reference_number</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>street_address</th>
				<th>suburb_town</th>
				<th>state</th>
				<th>postcode</th>
				<th>email_address</th>
				<th>phone_number</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
	<?php
// Check if the login form is submitted
require_once('common/utils.php');
session_start();

try {
	require_once("dbconfig/settings.php");
	if (!check_isset_session("mysql")) {
		$_SESSION["mysql"] = mysqli_connect(
			$host,
			$user,
			$pwd,
			$sql_db
		);
	}
	$conn = $_SESSION["mysql"];

	$sql = "";
	if (check_isset_get('status') && check_isset_get('eoi_id')) { // in update mode
		$sql = "UPDATE EOI SET status='" . $_GET['status'] . "' WHERE eoi_id=" . $_GET['eoi_id'];
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		exit();
	}

	$sql = "select * from eoi ";
	$cond = "";

	add_cond($cond, "first_name");
	add_cond($cond, "last_name");
	add_cond($cond, "job_reference_number");

	if (empty($cond))
		throw new Exception("No conditions given.");

	$sql .= $cond;

	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0)
		throw new Exception("Can't find this EOI");

	while ($row = mysqli_fetch_assoc($result)) {
				echo '
		<tr>
			<td>
				<form method="get">
					<input style="display: none;" type="text" name="eoi_id" value="'.$row['eoi_id'].'">
					<div class="form-control">
						<select name="status" id="status">
							<option value="" disabled selected>Update Status</option>
							<option value="New">New</option>
							<option value="Current">Current</option>
							<option value="Final">Final</option>
						</select>
						<label for="status">State:</label>
					</div>
					<button type="submit" value="changeStatus">change status</button>
				</form>
			</td>
			<td>'.$row['job_reference_number'].'</td>
			<td>'.$row['first_name'].'</td>
			<td>'.$row['last_name'].'</td>
			<td>'.$row['street_address'].'</td>
			<td>'.$row['suburb_town'].'</td>
			<td>'.$row['state'].'</td>
			<td>'.$row['postcode'].'</td>
			<td>'.$row['email_address'].'</td>
			<td>'.$row['phone_number'].'</td>
			<td>'.$row['status'].'</td>
		</tr>';
	}
} catch(Exception $err) {
}
		?>
			</tbody>
		</table>
	</main>
	<?php include "./common/footer.inc" ?> </body>

</html>
