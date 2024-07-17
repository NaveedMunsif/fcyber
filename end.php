<?php

session_start();


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
        $username_err = "Username required.";
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
        
        $sql = "SELECT id, username FROM users WHERE username = '$username' AND password = md5('$password')";

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
</head>
<body class="wrapper">
    <div class="wrapper1">
    <div class="container">
        <h2>Login</h2>
        <p>Enter your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" class="" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class=" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" autocomplete="off" class="">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="">
                <input type="submit" id="login-button" class="" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
        </form>
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
