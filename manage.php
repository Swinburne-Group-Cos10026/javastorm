
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
	<style>
        
	</style>
</head>

<body>	
	<header id="header__home">
		<div id="navbar">
			<?php include "./common/header.inc" ?>
			<?php 
				include("./common/menu.php");
				navbar("Home");
			?>
		</div>
		<?php 
				include("./common/banner.php");
				banner("Home");
			?>
	</header>
	<main>
    <form method="get">
		<input type="text" name="first_name">
		<input type="text" name="last_name">
        <!-- <select name="position" id="position">
            <option value="1">Java Developer</option>
            <option value="2">Data Analyst</option>
        </select> -->
        <input type="submit">
	</form>
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
$sql = "";
$fN = isset($_GET['first_name']) && $_GET['first_name'] != '';
$lN = isset($_GET['last_name']) && $_GET['last_name'] != '';

if ($fN == true && $lN == false) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%"';
} else if($fN == false && $lN == true) {
    $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%"';
} else if($fN == true && $lN == true) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%"';
} else {
	$sql = 'select * from eoi';
}

$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
    echo '<tr>
            <td>'.$std['eoi_id'].'</td>
            <td>'.$std['job_reference_number'].'</td>
            <td>'.$std['first_name'].'</td>
            <td>'.$std['last_name'].'</td>
            <td>'.$std['street_address'].'</td>
            <td>'.$std['suburb_town'].'</td>
            <td>'.$std['state'].'</td>
            <td>'.$std['postcode'].'</td>
            <td>'.$std['email_address'].'</td>
            <td>'.$std['phone_number'].'</td>
            <td>'.$std['status'].'</td>
        </tr>';
}
?>
                    </tbody>
                </table>

    </main>
	<?php include "./common/footer.inc" ?>

</body>

</html>
