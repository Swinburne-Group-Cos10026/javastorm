<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta n	ame="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Assignment 1 index">
	<meta name="keywords" content="navigation bar, index">
	<meta name="author" content="Burhanuddin kapasi">
	<title>Javastorm careers</title>
	<link href="styles/style.css" rel="stylesheet">
</head>

<body>	
	<header id="header__home">
		<div id="navbar">
			<?php require_once "./common/header.inc" ?>
			<?php
				require_once("./common/menu.php");
				navbar("Home");
			?>
		</div>
		<?php
			require_once("./common/banner.php");
			banner("Home");
		?>
	</header>
	<main>
	</main>
</body>

</html>
