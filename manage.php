
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
        <select name="position" id="position">
            <option value="">All</option>
            <option value="1">Java Developer</option>
            <option value="2">Data Analyst</option>
        </select>
        <p>Delete</p>
        <select name="delete" id="delete">
            <option value="">Choose position</option>
            <option value="1">Java Developer</option>
            <option value="2">Data Analyst</option>
        </select>
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
$p = isset($_GET['position']) && $_GET['position'] != '';
$d = isset($_GET['delete']) && $_GET['delete'] != '';

if($fN && $lN && $p) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%" and job_reference_number = "'.$_GET['position'].'"';
} 
if($fN && $lN) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%"';
}
if($fN && $p) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and job_reference_number = "'.$_GET['position'].'"';
}
if($lN && $p) {
    $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%" and job_reference_number = "'.$_GET['position'].'"';
}   
if($fN) {
    $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%"';
}
if($lN) {
    $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%"';
}
if($p) {
    $sql = 'select * from eoi where job_reference_number = "'.$_GET['position'].'"';
}
if(($fN || $lN || $p) == false) {
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
                <div>
                    <button onclick="changeStatus('.$std['eoi_id'].', this)">New</button>
                    <button onclick="changeStatus('.$std['eoi_id'].', this)">Current</button>
                    <button onclick="changeStatus('.$std['eoi_id'].', this)">Final</button>
                </div>
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
    <script type="text/javascript">
        
        function changeStatus(id, t) {

            //console.log(t.innerText);
            $.post('de.php', {
                'eoi_id': id,
                'value': t.innerText
            }, function(data) {
                //alert(data)
                location.reload()
            })
        }
    </script>
</body>

</html>


