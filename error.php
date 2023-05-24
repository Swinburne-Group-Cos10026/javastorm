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
        
        if(isset($_SESSION["errors"]) && !empty($_SESSION["errors"])) {
            $errMsg = $_SESSION["errors"];

            echo "<ul>";
            foreach ($errMsg as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            unset($_SESSION["errors"]); //clear it so that error messages are not displayed again on subsequent requests
        }
    ?>
    <p>Please go back to the <a href="apply.php">Application Form Page</a> and correct the errors.</p>
</body>
</html>