
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

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="styles/styleManage.css" rel="stylesheet">
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
    <p class="center">Search EOI</p>
    <form method="get">
        <input type="text" name="first_name">
        <input type="text" name="last_name">
        <select name="job_reference_number" id="job_reference_number">
            <option value="">All</option>
            <option value="1">Java Developer</option>
            <option value="2">Data Analyst</option>
        </select>
        <button type="submit" value="Search">Search</button>
    </form>
    <br><br>
    <p class="center">Delete</p>
    <form>
        <select name="delete" id="delete">
            <option value="">Choose job_reference_number</option>
            <option value="1">Java Developer</option>
            <option value="2">Data Analyst</option>
        </select>
        <button type="submit" value="Delete">Delete</button>
    </form>
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
$sql = "";
$fN = isset($_GET['first_name']) && $_GET['first_name'] != '';
$lN = isset($_GET['last_name']) && $_GET['last_name'] != '';
$p = isset($_GET['job_reference_number']) && $_GET['job_reference_number'] != '';
$d = isset($_GET['delete']) && $_GET['delete'] != '';
$s = isset($_GET['status']) && $_GET['status'] != '';
$e = isset($_GET['eoi_id']) && $_GET['eoi_id'] != '';

if($s && $e) {
    $sql = 'update eoi set status = "'.$_GET['status'].'" where eoi_id = '.$_GET['eoi_id'];
    execute($sql);
}
if($fN && $lN && $p) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%" and job_reference_number = "'.$_GET['job_reference_number'].'"';
} else if($fN && $lN) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%"';
} else if($fN && $p) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and job_reference_number = "'.$_GET['job_reference_number'].'"';
} else if($lN && $p) {
    $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%" and job_reference_number = "'.$_GET['job_reference_number'].'"';
} else if($fN) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%"';
} else if($lN) {
    $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%"';
} else if($p) {
    $sql = 'select * from eoi where job_reference_number = "'.$_GET['job_reference_number'].'"';
} else if(($fN || $lN || $p) == false) {
    $sql = 'select * from eoi';
}
$studentList = executeResult($sql);
if($d) {
    $sql = 'delete from eoi where job_reference_number = "'.$_GET['delete'].'"';
    execute($sql);
}

$index = 1;
foreach ($studentList as $std) {
    echo '<tr>
            <td>
                    <form method="get">
                        <input style="display: none;" type="text" name="eoi_id" value="'.$std['eoi_id'].'">
                        <select name="status" id="status">
                            <option value="">Update Status</option>
                            <option value="New">New</option>
                            <option value="Current">Current</option>
                            <option value="Final">Final</option>
                        </select>
                        <button type="submit" value="changeStatus">change status</button>
                    </form>
            </td>
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



