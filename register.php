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
 
<style>
.wrapper {
  height: auto; /* Change height to auto */
  transform: translateY(-4%); /* Center vertically */
}

.container {
  height: auto; /* Change height to auto */
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="card card-md">
  <div class="card-body">
    <h2 class="card-title text-center mb-4">Create new account</h2>
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
    <div class="mb-2 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" autocomplete="off" class="form-control">
      <span class="help-block"><?php echo $confirm_password_err; ?></span>
    </div>
    <div class="form-footer">
      <input type="submit" class="btn btn-primary w-100" style="margin-bottom: 4px;"value="Submit">
      <input type="reset" class="btn btn-secondary w-100" value="Reset">
    </div>
  </div>
</form>

        <div class="text-center text-muted mt-3"> Already have account? <a href="implementation.php">Sign in</a>
        </div>
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
