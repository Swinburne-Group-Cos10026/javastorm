<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Assignment 1 index">
	<meta name="keywords" content="navigation bar, index">
	<meta name="author" content="Burhanuddin kapasi">
	<title> Javastorm careers</title>
	<link href="styles/style.css" rel="stylesheet">
	<style>

	</style>
</head>

<body>	
	<header id="header__home">
		<div id="navbar">
			<?php include "./common/header.inc" ?>
			<?php 
				include("./common/menu.php");
				navbar("Home");
			?>
		</div>
		<?php 
				include("./common/banner.php");
				banner("Home");
			?>
	</header>
	<main>
		<div class="sec-intro">
			<h2>Be Innovative!</h2>
		</div>
		<div class="quality-boxes">
			<div class="quality-box">
				<div class="quality-box__content">
					<h3>Open-minded</h3>
					<p>Every option should be explored and tried no matter how unpredictable, impossible, insane or
						ridiculous does it looks or sound.</p>
				</div>
				<img src="images/open_minded.png" alt="open_minded image">
			</div>
			<div class="quality-box">
				<div class="quality-box__content">
					<h3>Creative</h3>
					<p>Brainstorming, idea generation, playing sessions, note taking. You think you used everything? We
						will challenge your mind and its abilities to the limits.</p>
				</div>
				<img src="images/creative.png" alt="creative image">
			</div>
			<div class="quality-box">
				<div class="quality-box__content">
					<h3>Bold</h3>
					<p>Our methods and ideas are are not written or following any books, curriculums or rules. We
						consider ourselves rebels and we are proud of it.</p>
				</div>
				<img src="images/bold.png" alt="bold image">
			</div>
			<div class="quality-box">
				<div class="quality-box__content">
					<h3>Smart</h3>
					<p>Every project with innovation as a goal requires smart approach. Identify real problem first and
						look for the smartest and simplest solution later.</p>
				</div>
				<img src="images/smart.png" alt="smart image">
			</div>
		</div>
		<h2>Upcomming events</h2>
		<div class="events">
			<div class="event">
				<div class="event__detail">
					<h3>Javastorm</h3>
					<p>
						Javastorm has grown in strength and stature every year since it was started in Europe
						15 years ago. Visitors and exhibitors to the conference and exhibition staged in February 2014
						universally praised it as the 'world's leading tire design and tire manufacturing event', noting
						in particular the outstanding quality of the conference papers and speakers, and the
						comprehensive extent of machinery manufacturers and suppliers who exhibited at the event.
					</p>
					<a class="link" href="#">More...</a>
				</div>
				<img src="images/event1.png" alt="">
			</div>
			<div class="event">
				<div class="event__detail">
					<h3>Wearable Tech Expo</h3>
					<p>See live demos, listen to case studies, speak with Wearable Tech Experts The first Wearable Tech
						Expo in Tokyo 2014. Key players from Japan, America and Europe announced their new products and
						attracted attention from all over the world. The next Wearable Tech Expo in Tokyo will be
						doubling in size and include Robotics and IoT. The main players in the wearable industry, human
						factor engineers, brain scientists, media providers and creators will discuss the future of
						wearable technology! </p>
					<a class="link" href="#">More...</a>
				</div>
				<img src="images/wearable.png" alt="wearable image">
			</div>
			<div class="event">
				<div class="event__detail">
					<h3>Space Tech Expo</h3>
					<p>Space Tech Expo is the West Coast's premier B2B space event for spacecraft, satellite, launch
						vehicle and space-related technologies. Taking place in Long Beach, the Space Tech Expo
						exhibition and conference brings together global decision-makers involved in the design, build
						and testing of spacecraft, satellite, launch vehicle and space-related technologies. Leading the
						West Coast space and satellite industry, Space Tech Expo is where end-users connect with
						solution providers.</p>

					<a class="link" href="#">More...</a>
				</div>
				<img src="images/space.jpg" alt="">
			</div>
		</div>
		<h2>Previous Projects</h2>
		<div class="projects">
			<div class="project" id="project--ctech">
				<h3>Neural network for CTech</h3>
				<a class="link" href="#">more...</a>
			</div>
			<div class="project" id="project--os">
				<h3>Faster operating system for JacTech</h3>
				<a class="link" href="#">more...</a>
			</div>
			<div class="project" id="project--apple">
				<h3>Manufacturing technology for Apple</h3>
				<a class="link" href="#">more...</a>
			</div>
			<div class="project" id="project--intel">
				<h3>Technology for Intel</h3>
				<a class="link" href="#">more...</a>
			</div>
			<div class="project" id="project--samsung">
				<h3>Data Science Samsung</h3>
				<a class="link" href="#">more...</a>
			</div>
			<div class="project" id="project--telecom">
				<h3>Network Telecom</h3>
				<a class="link" href="#">more...</a>
			</div>
		</div>
		<h2>Our Standards</h2>
		<div class="standards-boxes">
			<div class="standard-box">
				<div class="standard-box__content">
					<h3>Excellence</h3>
					<p>
						Our goal is to give our customers the best solutions in highest aquality. Our employees strive
						for excellence and work hard to achieve it. Everything must work and be reliable. Great design
						must be both, aesthetic and functional. Product or service that pass these conditions will be
						everlasting.
					</p>
				</div>
				<img src="images/excellence.jpg" alt="">
			</div>
			<div class="standard-box">
				<div class="standard-box__content">
					<h2>Uniqueness</h2>
					<p>Our mantra is to create new paths. We are not interested in copying others because we know, that
						if you want to succeed, you have to be different, unique. Our customers know that we create
						unique products and experience for them. This is the best way to differentiate us and our brand
						from the noise on market. Unique, different and proud.</p>
				</div>
				<img src="images/unique.jpg" alt="">
			</div>
		</div>
	</main>
	<?php include "./common/footer.inc" ?>

</body>

</html>
