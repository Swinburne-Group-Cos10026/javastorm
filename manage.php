<?php
	session_start();
?>
<?php
	require_once ('./dbconfig/dbhelper.php');
?>
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
	<link href="styles/pages/manage.css" rel="stylesheet">
</head>
<body>
	<header id="header__job--description">
		<div id="navbar">
			<?php require_once "./common/header.inc" ?>
			<?php 
				require_once("./common/menu.php");
				navbar("Manage");
			?>
		</div>
	</header>
	<?php
		require_once("dbconfig/settings.php");
		$conn = mysqli_connect(
			$host,
			$user,
			$pwd,
			$sql_db
		);

		$sql = "SELECT job_reference_number, position FROM JOB;";
		$jobs = array();

		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$jobs[$row["job_reference_number"]] = $row["position"];
		}
	?>
	<main>
		<section id="manage-form__container">
			<form method="POST" id="form__manage" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<h2>Search EOI</h2>
				<div class="form-control" id="first-name__container">
					<input type="text" id="first_name" name="first_name" pattern="[A-Za-z]+" maxlength="20"
						placeholder="First Name:">
					<label for="first_name">First Name:</label>
				</div>
				<div class="form-control" id="last_name__container">
					<input type="text" id="last_name" name="last_name" pattern="[A-Za-z]+" maxlength="20"
						placeholder="Last Name:">
					<label for="last_name">Last Name:</label>
				</div>
				<div class="form-control" id="job-reference-number__container">
					<select name="job_reference_number" id="job_reference_number">
						<option value="" selected>All</option>
						<?php
							foreach ($jobs as $job_reference_number => $position) {
								echo "<option value='$job_reference_number'>$position</option>";
							}
						?>
					</select>
				</div>
				<button class="btn" type="submit" value="Search">Search</button> 
			</form>
			<form method="POST" id="form__manage" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<h2 class="center">Delete</h2>
				<div class="form-control" id="job-reference-number__container">
					<select name="delete" id="job_reference_number-delete">
						<option value="" selected>Choose job reference number</option>
						<?php
							foreach ($jobs as $job_reference_number => $position) {
								echo "<option value='$job_reference_number'>$position ($job_reference_number)</option>";
							}
						?>
					</select>
				</div>
				<button class="btn" type="submit" value="Delete">Delete</button> 
			</form>
		</section>
		<section class="eoi__container">
			<table>
				<thead>
					<tr>
							<th>ID</th>
							<th>JOB</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Street</th>
							<th>Suburb</th>
							<th>State</th>
							<th>Postcode</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Status</th>
					</tr>
				</thead>
				<tbody>
		<?php
	// Check if the login form is submitted
	require_once('common/utils.php');
	if (!check_isset_session('user')) {
		header("location: manager_login.php");
	}

	{
		try {
			$sql = "";
			$fN = isset($_POST['first_name']) && $_POST['first_name'] != '';
			$lN = isset($_POST['last_name']) && $_POST['last_name'] != '';
			$p = isset($_POST['job_reference_number']) && $_POST['job_reference_number'] != '';
			$s = isset($_POST['status']) && $_POST['status'] != '';
			$e = isset($_POST['eoi_id']) && $_POST['eoi_id'] != '';
			$d = isset($_POST['delete']) && $_POST['delete'] != '';
			
			if($s && $e) {
				$sql = "UPDATE EOI SET status='" . $_POST['status'] . "' WHERE eoi_id=" . $_POST['eoi_id'];
				mysqli_query($conn, $sql);
			} 
			if($d) {
				$sql = 'DELETE from EOI where job_reference_number = "'.$_POST['delete'].'"';
				mysqli_query($conn, $sql);
			}
			$sql = "select * from APPLICANTS RIGHT JOIN EOI ON email=applicant_email ";
			if($fN && $lN && $p) {
				$sql .= ' where first_name like "'.$_POST['first_name'].'%" and last_name like "'.$_POST['last_name'].'%" and job_reference_number = "'.$_POST['job_reference_number'].'"';
			} else if($fN && $lN) {
				$sql .= ' where first_name like "'.$_POST['first_name'].'%" and last_name like "'.$_POST['last_name'].'%"';
			} else if($fN && $p) {
				$sql .= ' where first_name like "'.$_POST['first_name'].'%" and job_reference_number = "'.$_POST['job_reference_number'].'"';
			} else if($lN && $p) {
				$sql .= ' where last_name like "'.$_POST['last_name'].'%" and job_reference_number = "'.$_POST['job_reference_number'].'"';
			} else if($fN) {
				$sql .= ' where first_name like "'.$_POST['first_name'].'%"';
			} else if($lN) {
				$sql .= ' where last_name like "'.$_POST['last_name'].'%"';
			} else if($p) {
				$sql .= ' where job_reference_number = "'.$_POST['job_reference_number'].'"';
			}
			$result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0)
                throw new Exception("Can't find this EOI");

            while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                <tr>
                    <td>
                        <form method="post">
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
                            <button class="link" type="submit" value="ChangeStatus">Change Status</button>
                        </form>
                    </td>
                    <td>'.$row['job_reference_number'].'</td>
                    <td>'.$row['first_name'].'</td>
                    <td>'.$row['last_name'].'</td>
                    <td>'.$row['street_address'].'</td>
                    <td>'.$row['suburb_town'].'</td>
                    <td>'.$row['state'].'</td>
                    <td>'.$row['postcode'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone_number'].'</td>
                    <td>'.$row['status'].'</td>
                </tr>';
            }
		} catch(Exception $err) {
		}
	}
			?>
				</tbody>
			</table>
		</section>
	</main>
	<?php include "./common/footer.inc" ?>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>
</html>
