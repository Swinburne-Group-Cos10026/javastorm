<?php 
require_once('common/utils.php');
session_start();

// redirect if already logged in
if (check_isset_session('user')) {
	header("location: manage.php");
	exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		require_once("dbconfig/settings.php");
		$conn = mysqli_connect(
			$host,
			$user,
			$pwd,
			$sql_db
		);

		if (!check_isset_post('username'))
			throw new Exception("Please enter username");
		if (!check_isset_post('password'))
			throw new Exception("Please enter password");

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT username, password, role FROM MANAGER WHERE username='". $username . "';";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 0)
			throw new Exception("Can't find this user");


		$row = mysqli_fetch_assoc($result);

		require_once("common/password_hash.php");
		if (!password_verify($password, $row['password']))
			throw new Exception("Wrong password");
		
		$_SESSION['user'] = $row;
		$_SESSION['login_error'] = "";
		header("Location: manage.php");
	} catch(Exception $err) {
		$_SESSION['login_error'] = $err->getMessage();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta ame="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Assignment 1 index">
	<meta name="keywords" content="navigation bar, index">
	<meta name="author" content="Burhanuddin kapasi">
	<title>Javastorm careers</title>
</head>

<body>	
	<header id="header__login">
		<div id="navbar">
			<?php require_once "./common/header.inc" ?>
			<?php
				require_once("./common/menu.php");
				navbar("Login");
			?>
		</div>
	</header>
	<main>
		<?php if (check_isset_session('login_error')) : ?>
			<div class="error"><?php echo $_SESSION['login_error']; ?></div>
		<?php endif; ?>

		<section id="form__login">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<h1>Login</h1>
				<div class="form-control">
					<input type="text" id="username" name="username" maxlength="20" pattern="[A-Za-z]+"
						placeholder="Username:" required>
					<label for="username">Username:</label>
				</div>

				<div class="form-control">
					<input type="password" id="password" name="password"
						placeholder="Password:" required>
					<label for="password">Password:</label>
				</div>

				<button class="btn" type="submit">Log In</button>
			</form>
		</section>
	</main>
	<?php require_once "./common/footer.inc" ?>
	<style>
		<?php require_once 'styles/style.css'; ?>
		<?php require_once 'styles/pages/manager_login.css'; ?>
	</style>
	<style>
		<?php navbar_css(); ?>
	</style>
</body>

</html>
