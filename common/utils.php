<?php
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function check_isset_session($name) {
	if (!isset($_SESSION[$name]))
		return false;
	return !is_null($_SESSION[$name]);
}

function check_isset_get($name) {
	if (!isset($_GET[$name]))
		return false;
	return !empty($_GET[$name]);
}

function check_isset_post($name) {
	if (!isset($_POST[$name]))
		return false;
	return !empty($_POST[$name]);
}

function add_cond(&$cond, $name) {
	if (!check_isset_get($name)) {
		return;
	}
	if (empty($cond))
		$cond .= "where ";
	else
		$cond .= "and ";
	$cond .= $name . "='" . $_GET[$name] . "' ";
}
?>
