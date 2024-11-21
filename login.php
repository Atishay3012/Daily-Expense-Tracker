<?php
require('config.php');
session_start();
$errormsg = "";
if (isset($_POST['email'])) {
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "SELECT * FROM `users` WHERE email='$email' AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .login-form {
            width: 340px;
            margin: auto;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.8); /* Transparent white */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .login-form h2 {
            color: #333;
            margin: 0 0 15px;
            text-align: center;
        }

        .login-form .hint-text {
            color: #666;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 5px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Video Background -->
    <video autoplay loop muted>
        <source src="https://media.istockphoto.com/id/1502932890/video/total-all-of-monthly-household-expenses-woman-counts-finances-for-family-at-home.mp4?s=mp4-640x640-is&k=20&c=_jIlJDhvHaqMRACR916JY00ypztawTyBIKNhFiF1lAg=" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Login Form -->
    <div class="login-form">
        <form action="" method="POST" autocomplete="off">
            <h2 class="text-center">TrackMySpend: Expense Tracker</h2>
            <p class="hint-text">Login</p>
            <?php if (!empty($errormsg)) : ?>
                <div class="alert alert-danger"><?php echo $errormsg; ?></div>
            <?php endif; ?>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" required="required" autocomplete="on">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="on">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            </div>
        </form>
        <p class="text-center">Don't have an account? <a href="register.php" class="text-danger">Register Here</a></p>
    </div>
</body>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    feather.replace()
</script>

</html>
