<?php
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function check_isset_get($name) {
	if (!isset($_GET[$name]))
		return false;
	if (empty($_GET[$name]))
		return false;
	return true;
}

function check_isset_post($name) {
	if (!isset($_POST[$name]))
		return false;
	if (empty($_POSTk[$name]))
		return false;
	return true;
}
?>
