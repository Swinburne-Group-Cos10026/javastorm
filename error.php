<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Display Error Messages"/>
    <meta name="keywords" content="Database, MySQL, PHP, Data Validation, Error"/>
    <meta name="author" content="Khai Wen Lee"/>
    <title>Error Page</title>
</head>
<body>
    <h1>Error</h1>
    <?php
        session_start();
				require_once("common/utils.php");
        
				if (check_isset_session("errors")) {
					$err_msg = $_SESSION["errors"];
					echo $err_msg;
					unset($_SESSION["errors"]); //clear it so that error messages are not displayed again on subsequent requests
        }
    ?>
    <p>Please <a href="apply.php">go back</a> and correct the errors.</p>
</body>
</html>
