<?php
$nav_elms = [
    "Home" => "<h1>Javastorm</h1><br><p>Make all your dream<br> come true.<br><a href='about.php' class='link'>Join us now!!</a></p>",
    "About us" => "<h1>WHO ARE WE!!</h1><br><p>A bit about<br>outselves.<br></p>",
    "Jobs" => "<h1>JOIN OUR TEAM!!!</h1><br><p> Head over to jobs <br> to apply.<br><a href='apply.php' class='link'>Apply now!!</a></p>",
];
function banner($page_name) {
    echo "<div id='banner'><section id='jointeam'>";
    echo $GLOBALS["nav_elms"][$page_name];
    echo "</section></div>";
}  
?>