<?php
$nav_elms = [
	"Home" => "index.php",
	"About us" => "about.php",
	"Jobs" => "jobs.php",
	"Apply" => "apply.php",
	"Enhancements" => "enhancements.php",
	"Enhancements PHP" => "enhancements2.php",
	"Login" => "manager_login.php",
];

$manager_nav_elms = [
	"Home" => "index.php",
	"About us" => "about.php",
	"Jobs" => "jobs.php",
	"Apply" => "apply.php",
	"Enhancements" => "enhancements.php",
	"Enhancements PHP" => "enhancements2.php",
	"Manage" => "manage.php",
];

$nav_colours = [
	["yellow", "red"],
	["#00e2ff", "#89ff00"],
	["purple", "palevioletred"],
	["grey", "var(--accent)"],
	["royalblue", "aliceblue"],
	["blueviolet", "cornflowerblue"],
	["darkcyan", "darkolivegreen"],
];

function navbar($page_name) {
	echo "<nav id='nav'>";
	foreach ($GLOBALS["nav_elms"] as $name => $addr) {
		if($page_name == $name) {
			echo "<a class='nav-link__current' href='$addr'>$name</a>";
		} else {
			echo "<a href='$addr'>$name</a>";
		}
	}
	echo "<div id='indicator'></div>\n</nav>";
}

function manager_navbar($page_name) {
	echo "<nav id='nav__manage'>";
	foreach ($GLOBALS["manager_nav_elms"] as $name => $addr) {
		if($page_name == $name) {
			echo "<a class='nav-link__current' href='$addr'>$name</a>";
		} else {
			echo "<a href='$addr'>$name</a>";
		}
	}
	echo "<div id='indicator'></div>\n</nav>";
}

function navbar_css() {
	echo "@media only screen and (min-width: 1001px) {";
	echo "nav a {   width: " . floor(100 / sizeof($GLOBALS["nav_colours"])) . "%; }";
	for ($index = 0; $index < sizeof($GLOBALS["nav_colours"]); ++$index) {
		echo "nav a:nth-child(" . $index + 1 . "):before { background-color: " . $GLOBALS['nav_colours'][$index][0] . "; }";
		echo "nav a:nth-child(" . $index + 1 . "):after { background-color: " . $GLOBALS['nav_colours'][$index][1] . "; }";
		echo "nav a:nth-child(" . $index + 1 . ").nav-link__current ~ #indicator {
			left: " . floor($index * 100 / sizeof($GLOBALS["nav_colours"])) . "%; 
		}";
		echo "nav a:nth-child(" . $index + 1 . "):hover ~ #indicator { 
			left: " . floor($index * 100 / sizeof($GLOBALS["nav_colours"])) . "% !important; 
			background: linear-gradient(130deg, " . $GLOBALS['nav_colours'][$index][0] . ", " . $GLOBALS['nav_colours'][$index][1] . "); 
		}";
	}
	echo "}";

	echo "@media only screen and (max-width: 1000px) {";
	echo "nav a {   height: " . 100 / sizeof($GLOBALS["nav_colours"]) . "%; }";
	echo "nav a.nav-link__current ~ #indicator { left: 10px !important; }";
	for ($index = 0; $index < sizeof($GLOBALS["nav_colours"]); ++$index) {
		echo "nav a:nth-child(" . $index + 1 . "):before { background-color: " . $GLOBALS['nav_colours'][$index][0] . "; }";
		echo "nav a:nth-child(" . $index + 1 . "):after { background-color: " . $GLOBALS['nav_colours'][$index][1] . "; }";
		echo "nav a:nth-child(" . $index + 1 . ").nav-link__current ~ #indicator {
			top: calc(" . floor($index * 100 / sizeof($GLOBALS["nav_colours"])) . "% + 40px); 
		}";
		echo "nav a:nth-child(" . $index + 1 . "):hover ~ #indicator { 
			top: calc(" . floor($index * 100 / sizeof($GLOBALS["nav_colours"])) . "% + 40px) !important; 
			background: linear-gradient(130deg, " . $GLOBALS['nav_colours'][$index][0] . ", " . $GLOBALS['nav_colours'][$index][1] . "); 
		}";
	}
	echo "}";
}
?>
