<?php

session_start();

if(isset($_SESSION['authentication'])){
    header("Location: admin/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraFeed</title>
    <!-- bootstrap css cdn here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- main css here -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="login-signup-bg">

    <form action="includes/functions.php" class="form-container container d-flex flex-column align-items-center justify-content-center" method="POST">
        <div class="shadow-lg p-5 rounded bg-white">
            <h1 class="text-center text-uppercase mb-4 letter-spacing-1">Get Access</h1>
            <span class="d-block mb-5 text-center text-gray letter-spacing-1 fs-5">Enter your login credential to continue</span>
            <input type="email" name="email" placeholder="Your valid email" required class="mb-3 p-3 rounded border letter-spacing-2 fs-5 w-100"><br><br>
            <input type="password" name="password" required placeholder="Enter your password" class="p-3 rounded border letter-spacing-2 fs-5 w-100"><br><br>
            <?php
                if(isset($_GET["login_failed"])){
                    echo "<div class='text-center text-uppercase bg-warning rounded fs-3 letter-spacing-1'>Wrong Login Credential</div>";
                }
            ?>
            <a href="forget.php" class="text-end fs-5 d-block text-decoration-none letter-spacing-1 text-danger">Forget password</a>
            <input type="submit" name="login_submit" value="Login" required class="w-100 p-3 bg-danger text-white fw-bold rounded border-0 letter-spacing-1 fs-5 my-3">
            <span class="fw-bold letter-spacing-2 fs-5 text-center d-block">Don't have any account? <a href="contact.php" class="text-decoration-none text-danger">Contact us for collaboration</a></span>
        </div>
    </form>

    <!-- bootstrap js cdn here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- https://fontawesome.com/ -->
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
</body>

</html>