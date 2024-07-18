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
        $sql = "SELECT id, username FROM users WHERE username = ? AND password = md5(?)";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = $password;

            if (mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0)
                {
                    session_start();

                    mysqli_stmt_bind_result($stmt, $id, $username);
                    mysqli_stmt_fetch($stmt);

                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;

                    header("location: welcome.php");
                }
                else
                {
                    $password_err = "Sorry, password not valid.";
                }
            }
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
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
	<!-- Custom CSS File link -->
    <link href="/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="/dist/css/demo.min.css" rel="stylesheet"/>

</head>
<body class="border-top-wide border-primary d-flex flex-column wrapper">
    <div class="page page-center">
        <div class="container-tight py-4" style="z-index: 2;">
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
</body>
</html>
