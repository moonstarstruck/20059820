<!DOCTYPE html>

<?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
        header('Location: index.php');
        exit;
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <?php
    if (isset($_SESSION['err'])) {
        $error = $_SESSION['err'];
        echo '<script> alert("' . $error . '"); </script>';
        unset($_SESSION['err']);
    }
    ?>

    <!-- Register -->
    <main class='form-bg'>
        <!-- Register container -->
        <div class="container">
            <!-- register form -->
            <form method="post" action="<?php echo htmlspecialchars("useRegister.php"); ?>">
                <h3 class="form-title">Sign Up</h3>
                <!-- username -->
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <!-- password -->
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <!-- confirm password -->
                <div class="form-input">
                    <input type="password" name="cpassword" placeholder="Re-enter your password" required>
                </div>
                <!-- submit button -->
                <input type="submit" name="submit" value="Register" class="btn-register"> <br>
                <!-- login link -->
                <a href="login.php">Already have an account? Login Now</a>
            </form>
        </div>
    </main>
</body>
</html>

