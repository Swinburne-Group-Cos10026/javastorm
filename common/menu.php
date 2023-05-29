<?php
require_once("common/utils.php");

$nav_elms = [
	"Home" => "index.php",
	"About us" => "about.php",
	"Jobs" => "jobs.php",
	"Apply" => "apply.php",
	"Enhancements" => "enhancements.php",
	"PHP" => "enhancements2.php",
	"Login" => "manager_login.php",
];

$manager_nav_elms = [
	"Home" => "index.php",
	"About us" => "about.php",
	"Jobs" => "jobs.php",
	"Apply" => "apply.php",
	"Enhancements" => "enhancements.php",
	"PHP" => "enhancements2.php",
	"Manage" => "manage.php",
	"Logout" => "logout.php",
];

$nav_colours = [
	["yellow", "red"],
	["#00e2ff", "#89ff00"],
	["purple", "palevioletred"],
	["grey", "var(--accent)"],
	["royalblue", "aliceblue"],
	["blueviolet", "cornflowerblue"],
	["darkcyan", "darkolivegreen"],
	["mediumseagreen", "mediumspringgreen"],
];

function navbar($page_name) {
	$nav = $GLOBALS["nav_elms"];
	if (check_isset_session('user')) {
		$nav = $GLOBALS["manager_nav_elms"];
	}

	echo "<nav id='nav'>";
	foreach ($nav as $name => $addr) {
		if($page_name == $name) {
			echo "<a class='nav-link__current' href='$addr'>$name</a>";
		} else {
			echo "<a href='$addr'>$name</a>";
		}
	}
	echo "<div id='indicator'></div>\n</nav>";
}

function navbar_css() {
	$nav = $GLOBALS["nav_elms"];
	if (check_isset_session('user')) {
		$nav = $GLOBALS["manager_nav_elms"];
	}
	echo "@media only screen and (min-width: 1001px) {";
	echo "nav a {   width: " . floor(100 / count($nav)) . "%; }";
	for ($index = 0; $index < count($nav); ++$index) {
		echo "nav a:nth-child(" . $index + 1 . "):before { background-color: " . $GLOBALS['nav_colours'][$index][0] . "; }";
		echo "nav a:nth-child(" . $index + 1 . "):after { background-color: " . $GLOBALS['nav_colours'][$index][1] . "; }";
		echo "nav a:nth-child(" . $index + 1 . ").nav-link__current ~ #indicator {
			left: " . floor($index * 100 / count($nav)) . "%; 
		}";
		echo "nav a:nth-child(" . $index + 1 . "):hover ~ #indicator { 
			left: " . floor($index * 100 / count($nav)) . "% !important; 
			background: linear-gradient(130deg, " . $GLOBALS['nav_colours'][$index][0] . ", " . $GLOBALS['nav_colours'][$index][1] . "); 
		}";
	}
	echo "}";

	echo "@media only screen and (max-width: 1000px) {";
	echo "nav a {   height: " . floor(100 / count($nav)) . "%; }";
	echo "nav a.nav-link__current ~ #indicator { left: 10px !important; }";
	for ($index = 0; $index < count($nav); ++$index) {
		echo "nav a:nth-child(" . $index + 1 . "):before { background-color: " . $GLOBALS['nav_colours'][$index][0] . "; }";
		echo "nav a:nth-child(" . $index + 1 . "):after { background-color: " . $GLOBALS['nav_colours'][$index][1] . "; }";
		echo "nav a:nth-child(" . $index + 1 . ").nav-link__current ~ #indicator {
			top: calc(" . floor($index * 100 / count($nav)) . "% + 40px); 
		}";
		echo "nav a:nth-child(" . $index + 1 . "):hover ~ #indicator { 
			top: calc(" . floor($index * 100 / count($nav)) . "% + 40px) !important; 
			background: linear-gradient(130deg, " . $GLOBALS['nav_colours'][$index][0] . ", " . $GLOBALS['nav_colours'][$index][1] . "); 
		}";
	}
	echo "}";
}
?>
