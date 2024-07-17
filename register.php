<?php

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

   
    if (empty(trim($_POST["username"])))
    {
        $username_err = "Write a username.";
    }
    else
    {
        
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            
            $param_username = trim($_POST["username"]);

            /* Attempt to execute the prepared statement */
            if (mysqli_stmt_execute($stmt))
            {
                
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "username not available.";
                }
                else
                {
                    $username = trim($_POST["username"]);
                }
            }
            else
            {
                echo "Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }

    
    if (empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";
    }
    elseif (strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Atleast 6 characters in password allowed.";
    }
    else
    {
        $password = trim($_POST["password"]);
    }

   
    if (empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password not match.";
        }
    }

    
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {

        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            
            $param_username = $username;
            $param_password = md5($password);
            
            if (mysqli_stmt_execute($stmt))
            {
                
                header("location: login.php");
            }
            else
            {
                echo "Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }

    /* Close connection */
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
    <title>Sign Up</title>
</head>
<body class="wrapper">
    <div class="container">
        <h2>Sign Up</h2>
        <p>To create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" class="" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class=" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" autocomplete="off" class="" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class=" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" autocomplete="off" class="" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="">
                <input type="submit" id="login-button" style="appearance: none;outline: 0;background-color: white;border: 0;padding: 10px 15px;color: #53e3a6;border-radius: 3px;width: 250px;transition-duration: 0.25s;cursor: pointer;font-size: 18px;" class="" value="Submit">
                <input type="reset" id="login-button" value="Reset">
            </div>
            <p>Already have account? <a href="implementation.php">Login here</a>.</p>
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
</body>
</html>
