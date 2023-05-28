<?php
$nav_elms = [
    "Home" => "index.php",
    "About us" => "about.php",
    "Jobs" => "jobs.php",
    "Apply" => "apply.php",
    "Enhancements" => "enhancements.php",
];
function navbar($page_name) {
    echo "<nav>";
    foreach ($GLOBALS["nav_elms"] as $name => $addr) {
        if($page_name == $name) {
            echo "<a class='nav-link__current' href='$addr'>$name</a>";
        } else {
            echo "<a href='$addr'>$name</a>";
        }
    }
    echo "<div id='indicator'></div>\n</nav>";
}  
?>
