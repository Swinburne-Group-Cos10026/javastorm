<?php 
require_once('common/utils.php');
session_start();

// redirect if already logged in
if (check_isset_session('user')) {
	header("location: index.php");
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
		if (!check_isset_post('re-password'))
			throw new Exception("Please enter re-password");

		$username = $_POST['username'];
		$password = $_POST['password'];
		$re_password = $_POST['password'];
		
		if ($password !== $re_password)
			throw new Exception("Password and Re-Password must be the same");

		require_once("common/password_hash.php");
		$hash = password_hash($password, PASSWORD_BCRYPT);

		$query = "INSERT INTO MANAGER (username, password) VALUES (". $username . "," . $hash . ");";

		$_SESSION['register_error'] = "";
		header("Location: manager_login.php");
		exit();
	} catch(Exception $err) {
		$_SESSION['register_error'] = $err->getMessage();
	}
}
?>
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
		<?php if (check_isset_session('register_error')) : ?>
			<div class="error"><?php echo $_SESSION['register_error']; ?></div>
		<?php endif; ?>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>

			<label for="repassword">Re-Password:</label>
			<input type="password" id="repassword" name="repassword" required>

			<button type="submit">Log In</button>
		</form>
	</main>
</body>

</html>
