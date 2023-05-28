<!DOCTYPE html>
<html>

<head>
	<title>Job Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Le Minh Vu">
	<!--Reference for CSS Stylesheet-->
	<link href="styles/style.css" rel="stylesheet">
</head>

<body>
	<header id="header__apply">
		<div id="navbar">
			<?php include "./common/header.inc" ?>
			<?php 
				include("./common/menu.php");
				navbar("Enhancements");
			?>
		</div>
	</header>
	<main>
		<h1>Enhancements</h1>
		<section>
			<h3>About Card</h3>
			<section>
				<h5>What's special about it?</h5>
				<p>It only uses basic features like radio buttons, background images, pseudo elements, grid layout.</p>
				<p>Combine all those simple stuffs, I have made a card with on-click reactions without the use of Javascript.
				</p>
				<a href="about.html#teammembers" class="link">Link.</a>
			</section>
			<section>
				<h5>Implementations</h5>
				<p>I set radio button to none and use the label as display block.</p>
				<p>
					By clicking on the label I would change the state of the radio button and modify the css with :checked state
				</p>
				<p>
					Combine the card with grid, I set the clicked on to expand to a whole row and move other memebrs down to
					second row.
				</p>
				<p>
					In addition, I am using the auto-fill of the grid, so in smaller device that is not too small, we would
					only have 2 or 3 collumns.
				</p>
				<p>
					In a phone situation, I would center all the cards, and drop the text from below instead of on the side and
					move them the the first
					row
				</p>
			</section>
		</section>
		<section>
			<h3>Responsive and Reactive Navbar</h3>
			<section>
				<h5>What's special about it?</h5>
				<p>
					The header has 2 modes, one has banner and one does not. The one has banner will cover the whole pages. The
					other one will only have a background colour of darker accent colour.
				</p>
				<p>For the desktop version of the navbar, it will highlight the current page with a class.</p>
				<p>
					For each elements of the navbar, they will have differet colours and gradients to highlight them, and there
					will be animation moving around under the link.
				</p>
				<p>For the mobile, tablet version, I would have a burger menu then expand it to a fullscreen vertical navbar.
					They still highlight the current page, but no more animation between two links.</p>
				<p>Please use the inspection tool to check out the phone mode</p>
				<a href="about.html" class="link">Link.</a>
			</section>
			<section>
				<h5>Implementations</h5>
				<p>
					I use display flex and fixed width for links so that the indicator can move around between links smoothly.
				</p>
				<p>
					For the burger menu, I use the same system as the previous enhancement, but instead of radio buttons, I use
					checkbox buttons.
				</p>
				<p>
					I expand the the burger menu with box shadow instead of a bigger div.
				</p>
				<p>
					I would also need to set the nav to pointer-events: none so that I would not click on it while its opacity
					being 0.
				</p>
			</section>
		</section>
	</main>
	<?php include "./common/footer.inc" ?> 
</body>

</html>
