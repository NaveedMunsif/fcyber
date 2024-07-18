<?php
/* Initialize the session */
session_start();
 
/* Check if the user is logged in, if not then redirect him to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
	<link href="/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="/dist/css/demo.min.css" rel="stylesheet"/>
</head>

<?php include_once("header.php")
    ?>
<body class="border-top-wide border-primary d-flex flex-column wrapper">
    <div class="page page-center">
        <div class="container-tight py-4" style="
    z-index: 2;
">
            <div class="container">
            <a href="logout.php" class="btn btn-danger btn-square w-100">
            Log Out</a>
               
            </div>
        </div>
    </div>
    <?php include_once("jsdata.php")
    ?>
</body>
</html>