<?php
function q() {
//     $sql = "";
// $fN = isset($_POST['dropdownValue']) && $_POST['dropdownValue'] != '';


// $lN = isset($_GET['last_name']) && $_GET['last_name'] != '';

// if ($fN == true && $lN == false) {
//     $sql = 'select * from eoi where first_name like "'.$_POST['dropdownValue'].'%"';
// } else if($fN == false && $lN == true) {
//     $sql = 'select * from eoi where last_name like "'.$_GET['last_name'].'%"';
// } else if($fN == true && $lN == true) {
//     $sql = 'select * from eoi where first_name like "'.$_GET['first_name'].'%" and last_name like "'.$_GET['last_name'].'%"';
// } else {
// 	$sql = 'select * from eoi';
// }
echo "buoi";
if(isset($_REQUEST['v'])) {
    echo $_REQUEST['v'];
}
//echo "cac";
// $r = isset($_POST['v']) ? $_POST['v']: '';
// echo $r;

// if ($fN == true) {
//     $sql = 'select * from eoi where first_name like "'.$_POST['dropdownValue'].'%"';
// }else {
// 	$sql = 'select * from eoi';
// }


// $studentList = executeResult($sql);

// $index = 1;
// foreach ($studentList as $std) {
//     echo '<tr>
//             <td>'.$std['eoi_id'].'</td>
//             <td>'.$std['job_reference_number'].'</td>
//             <td>'.$std['first_name'].'</td>
//             <td>'.$std['last_name'].'</td>
//             <td>'.$std['street_address'].'</td>
//             <td>'.$std['suburb_town'].'</td>
//             <td>'.$std['state'].'</td>
//             <td>'.$std['postcode'].'</td>
//             <td>'.$std['email_address'].'</td>
//             <td>'.$std['phone_number'].'</td>
//             <td>'.$std['status'].'</td>
//         </tr>';
// }
}

?>