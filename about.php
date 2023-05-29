<!DOCTYPE html>
<html>

<head>
	<title>Javastorm About</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Learn more about our amazing team members!">
	<!-- Include CSS and JavaScript files for validation -->
	<meta name="author" content="Indigo Daly, Le Minh Vu">
</head>

<body>
	<header id="header__about">
		<div id="navbar">
		<?php require_once "./common/header.inc" ?>
		<?php 
				require_once("./common/menu.php");
				navbar("About us");
			?>
		</div>
		<?php 
				require_once("./common/banner.php");
				banner("About us");
			?>
	</header>

	<main>
		<h1>About Us</h1>
		<section>
			<article>
				<p>Welcome to our website! We are a group of five computer science students
					who are passionate about web development and dedicated to creating a user-friendly and visually appealing HTML
					website.
					Our team consists of individuals with various expertise in graphic design, front-end and back-end development,
					and project management.</p>
				<h5>COS10026-Computing Technology Inquiry Project - Computer Science</h5>
				<p>The Inquiry Project is a class, run by <b>Grace Tao</b>. In this class JavaStorm have been put up to the
					challenge to create a html website that is simple but fully functional.
					In order to do this javaStorm have learnt how to effectively communcate and spent their own time creating
					their
					own individual pages to come together and form a whole website.
				</p>
			</article>
		</section>

		<section>
			<h2>About Our Team</h2>
			<p>As computer science students, we are constantly expanding our knowledge and skills in the field.
				Throughout the process of creating this website, we faced various challenges and setbacks, but we worked
				collaboratively and overcame each obstacle to deliver a high-quality product.
				Our website is designed to showcase our skills and creativity while also providing valuable information and
				resources to our audience. We hope that you find our website helpful, informative, and enjoyable to use. Thank
				you
				for visiting our page, and we welcome any feedback or suggestions you may have!</p>

			<div class="group-info">
				<dl class="group-info__dl">
					<dt>Group name:</dt>
					<dd>JavaStorm</dd>
					<dt>Group ID:</dt>
					<dd>10563854</dd>
					<dt>Tutor name:</dt>
					<dd>Grace Tao</dd>
					<dt>University Course:</dt>
					<dd>bachelor of Computer Science</dd>
				</dl>

				<figure class="group-info__figure">
					<img src="images/group.JPG" alt="group">
				</figure>
			</div>
		</section>

		<section>
			<section class="team-members__section">
				<h2 id="teammembers">Team Members</h2>
				<p>Meet the talented individuals who make up our team!</p>
				<div class="team-members__container">
					<input type="radio" id="personal-info-card--Pham__label" name="personal-info-card__label">
					<figure class="personal-info-card personal-info-card--Pham">
						<label class="personal-info-card__border" for="personal-info-card--Pham__label">
							<figcaption>Cong Hiep Pham</figcaption>
							<p class="personal-info-card__role">Leader</p>
							<div class="personal-info-card__detail">
								<p>
									A bit about Pham: Pham is a 20 male university student at Swinburne University of technology.
									Completing a High School
									year 12 level education Pham has knowledge on subjects such as Java Back-end: Spring, J2EE, JSP,
									Servlet, etc.
									Pham
									brings many qualities to the team such as leadership, communication and friendliness.
								</p>
								<p>
									Born in South East Asia, more specifically Vietnam. Pham describes his hometown as "A beautiful
									place,
									with
									a dreamlike river running over the city embellished by luxuriant forest."
									Along with this Pham enjoys watching films such as 'The Godfather' and listening to Vietnamese Bolero.
									He
									also has big interests in football and reading novels.
								</p>
							</div>
						</label>
					</figure>
					<input type="radio" id="personal-info-card--Minh__label" name="personal-info-card__label">
					<figure class="personal-info-card personal-info-card--Minh">
						<label class="personal-info-card__border" for="personal-info-card--Minh__label">
							<figcaption>Le Minh Vu</figcaption>
							<p class="personal-info-card__role">Lead Programmer</p>
							<div class="personal-info-card__detail">
								<p>
									A bit about Minh:
									Minh is a 19 year old male university student attentding Swinburne University of technology doing an
									Undergraduate degree in Computer science. Minh brings a variety of skills to the team such as Web
									Development, Web Scrapping, Software Development, Database and Photography. Combined with his
									communication
									skills and easygoing personality Minh makes everyone in the team feel welcome and helps out where he
									can.
								</p>
								<p>
									Raised in vietnam, Minh finds life in his hometown describing it as " a crowded place; a horde of
									people;
									but inside that chaos, there is an order, and everything just flows correctly. I see and love the
									beauty
									of
									the flow and its peacefulness inside the chaos". In his spare time Minh has found a love in the Lord
									of
									the
									Rings series, accompanied with a love for his favourite anime series Monogatari and Jojo's bizarre
									adventures.
								</p>
							</div>
						</label>
					</figure>
					<input type="radio" id="personal-info-card--Jean__label" name="personal-info-card__label">
					<figure class="personal-info-card personal-info-card--Jean">
						<label class="personal-info-card__border" for="personal-info-card--Jean__label">
							<figcaption>Khai Wen Lee</figcaption>
							<p class="personal-info-card__role">Lead Designer</p>
							<div class="personal-info-card__detail">
								<p>
									A bit about Jean:
									Jean is a 21 year old female university student at Swinburne University of Technology studying a
									Bachelor
									Degree in Computer Science. Jean is a fast paced worker specialising in Critical thinking, writing
									Machine
									Learning/data analysis/data visualisation code, bringing a lot of value not only as an individual but
									as
									a
									team member of JavaStorm.
								</p>
								<p>
									Born and raised in Teluk Intan Perak, Malaysia. jean describes it as "a town known for a leaning clock
									tower, which is one of the iconic landmarks of Malaysia. It is also famous for its local delicacies
									such
									as
									chee cheong fun (rice noodle rolls), mee rebus (noodles in a thick spicy gravy), and the traditional
									Malay
									kuih (cake)."
									Along with this jean has interest in R&B, K-pop, and soft pop music. Followed by a love for The Marvel
									cinematic universe. If shes not listening to music or watching films jean loves to Dance and watch the
									sunrise and set.
								</p>
							</div>
						</label>
					</figure>
					<input type="radio" id="personal-info-card--Indigo__label" name="personal-info-card__label">
					<figure class="personal-info-card personal-info-card--Indigo">
						<label class="personal-info-card__border" for="personal-info-card--Indigo__label">
							<figcaption>Indigo Daly</figcaption>
							<p class="personal-info-card__role">Secondary Designer</p>
							<div class="personal-info-card__detail">
								<p>
									A bit about Indigo:
									Indigo is a 19 year old male student attending Swinburne university of technology. Indigo is a highly
									cooperative teammate focusing on his ability to communicate and effectively work with his other
									teamates.
									With some knowledge in programming and critical thinking he makes a lovely addition to any team.
								</p>
								<p>
									Born in Australia and raised in the Bellerine. Indigo describes it as "a wonderful coastal enviroment
									with
									a tightly knit community along with amazing scenic views of the ocean and vegetation around". Indigo's
									other
									interests require_once his love for Star wars along with a passion for sports such as soccer and tennis.
								</p>
							</div>
						</label>
					</figure>
					<input type="radio" id="personal-info-card--Burhan__label" name="personal-info-card__label">
					<figure class="personal-info-card personal-info-card--Burhan">
						<label class="personal-info-card__border" for="personal-info-card--Burhan__label">
							<figcaption>Burhan Kapasi</figcaption>
							<p class="personal-info-card__role">Secondary Programmer</p>
							<div class="personal-info-card__detail">
								<p>
									A bit about Burhan:
									Burhan is a 20 year old male uni student at Swinburne University of Technology. he is currently
									studying
									a
									bachelors in computer science. Because of this Burhan is a very adaptable and skilled teammate who can
									pick
									up new skills on the go. Although only having little experiance, Burhan strives to be the best, easily
									adapting and challenging himself when new problems arrise.
								</p>
								<p>
									Raised in Karachi, Pakistan. Burhan describes it as "the industrial hub of pakistan. extremely crowded
									and
									busy city of pakistan which accommodates around 20 million people". Burhan is a big fan of bollywood
									with
									some of his favourites being "kabhi khushi kabhi gham" and "DDLG". He says this is because of SRK
									being
									the
									lead actor who is the most iconic actor in bollywood.
								</p>
							</div>
						</label>
					</figure>
				</div>
			</section>
			<section class="timetable__container">
				<h2>Our Timetable</h2>

				<table>
					<thead>
						<tr>
							<th></th>
							<th>Monday</th>
							<th>Tuesday</th>
							<th>Wednesday</th>
							<th>Thursday</th>
							<th>Friday</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time">9:00 AM</td>
							<td>Team Meeting</td>
							<td></td>
							<td>Team Meeting</td>
							<td></td>
							<td>Team Meeting</td>
						</tr>
						<tr>
							<td class="time">10:00 AM</td>
							<td>Team Collaberation work</td>
							<td>Independant work</td>
							<td>Team Collaberation work</td>
							<td>Independant work</td>
							<td>Team Collaberation work</td>
						</tr>
						<tr>
							<td class="time">11:00 AM</td>
							<td colspan="5">Lunch</td>
						</tr>
						<tr>
							<td class="time">12:00 PM</td>
							<td colspan="5">Lunch</td>
						</tr>
						<tr>
							<td class="time">1:00 PM</td>
							<td>Independant work</td>
							<td></td>
							<td>Independant work</td>
							<td></td>
							<td>Independant work</td>
						</tr>
						<tr>
							<td class="time">2:00 PM</td>
							<td></td>
							<td></td>
							<td>Group work</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td class="time">3:00 PM</td>
							<td></td>
							<td></td>
							<td>Group work</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td class="time">4:00 PM</td>
							<td>Group Activity</td>
							<td></td>
							<td>Group work</td>
							<td></td>
							<td>Group Activity</td>
						</tr>
						<tr>
							<td class="time">5:00 PM</td>
							<td>team Meeting</td>
							<td></td>
							<td>Team Meeting</td>
							<td></td>
							<td>Team Meeting</td>
						</tr>
					</tbody>
				</table>
			</section>
			<section>
				<h2>Contact</h2>
				<p>Contact us at by mailing to <a href="mailto:javastorm@gmail.com" class="link">javaStorm@gmail.com</a></p>
			</section>
		</section>
	</main>
	<?php require_once "./common/footer.inc" ?>
	<style>
		<?php require_once 'styles/style.css'; ?>
		<?php require_once 'styles/pages/about.css'; ?>
	</style>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>

</html>
