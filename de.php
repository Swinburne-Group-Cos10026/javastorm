<?php
if (isset($_POST['eoi_id']) && isset($_POST['value'])) {
	$id = $_POST['eoi_id'];
    $val = $_POST['value'];
	require_once ('./dbconfig/dbhelper.php');
	$sql = 'update eoi set status = "'.$val.'" where eoi_id = '.$id;
    //echo $sql;
	execute($sql);

	//echo 'Da update';
}

?>