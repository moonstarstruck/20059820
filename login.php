<!DOCTYPE html>

<?php 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){ 
        header('Location index.php');
        exit;
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sign In</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <?php
    if (isset($_SESSION['err'])) { //if there is an error
        $error = $_SESSION['err'];

        if($error === ''){ //if no error
            echo '<script> alert("Registration Successful"); </script>';
            unset($_SESSION['err']);
        }else{ //if error
            echo '<script> alert("' . $error . '"); </script>';
            unset($_SESSION['err']);
        }
    }
    ?>

    <!-- Sign In -->
    <main class='form-bg'>
        <div class="container">
            <!-- sign in form -->
            <form method="post" action="<?php echo htmlspecialchars("useLogin.php"); ?>">
                <h3 class="form-title">Login</h3>
                <!-- username -->
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <!-- Password -->
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>
                <!-- submit button -->
                <input type="submit" name="submit" value="Login" class="btn-login"> <br>
                <!-- register link -->
                <a href="register.php">Don't have an account? Register Now</a>
            </form>
        </div>
    </main>
</body>
</html>

