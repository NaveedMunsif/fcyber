<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: welcome.php");
    exit;
}

require_once "config.php";


$username = $password = "";
$username_err = $password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    
    if (empty(trim($_POST["username"])))
    {
        $username_err = "Username/Email required.";
    }
    else
    {
        $username = trim($_POST["username"]);
    }

    
    if (empty(trim($_POST["password"])))
    {
        $password_err = "Check Password.";
    }
    else
    {
        $password = trim($_POST["password"]);
    }

    
    if (empty($username_err) && empty($password_err))
    {
        
        $sql = "SELECT id, username FROM users WHERE username = '$username' and password = md5('$password')";

        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            session_start();

            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;

            
            header("location: welcome.php");
        }
        else
        {
            
            $password_err = "Sorry, password not valid.";
        }
        /* Close statement */
        mysqli_close($link);
    }
}
?>
<style>
<?php include 'css/login.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
	<!-- Swiper JS link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

	<!-- Font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

	<!-- Custom CSS File link -->
    <link href="/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="/dist/css/demo.min.css" rel="stylesheet"/>

</head>
<body class="border-top-wide border-primary d-flex flex-column wrapper">
    <div class="page page-center">
        <div class="container-tight py-4" style="
    z-index: 2;
">
            <div class="container">
                <h2 class="card-title text-center mb-4">Login to your account</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form card card-md">
                    <div class="card-body">
                        <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" autocomplete="off" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="mb-2 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" autocomplete="off" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-footer">
                            <input type="submit" class="btn btn-primary w-100" value="Login">
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted mt-3">
                    Don't have an account yet? <a href="register.php" tabindex="-1">Sign up</a>
                </div>
            </div>
        </div>
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>
