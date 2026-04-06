<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraFeed</title>
    <!-- bootstrap css cdn here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- main css here -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-signup-bg">

    <form action="" class="form-container container d-flex flex-column align-items-center justify-content-center">
        <div class="shadow-lg p-5 rounded bg-white">
            <h1 class="text-center text-uppercase mb-4 letter-spacing-1">Account recovery</h1>
            <span class="d-block mb-5 text-center text-gray letter-spacing-1 fs-5">Find you account with the associated
                email address</span>
            <input type="email" placeholder="Your valid email"
                class="mb-3 p-3 rounded border letter-spacing-2 fs-5 w-100" required><br><br>
            <input type="text" disabled placeholder="Enter recover code" required
                class="p-3 rounded border letter-spacing-2 fs-5 w-100"><br><br>
            <input type="submit" value="Send Code"
                class="w-100 p-3 bg-danger text-white fw-bold rounded border-0 letter-spacing-1 fs-5 my-3">
            <input type="submit" value="Enter Code"
                class="d-none w-100 p-3 bg-danger text-white fw-bold rounded border-0 letter-spacing-1 fs-5 my-3">
            <span class="fw-bold letter-spacing-2 fs-5 text-center d-block">Are you having trouble? <a
                    href="contact.html" class="text-decoration-none text-danger">Contact us for help</a></span>
        </div>
    </form>

    <!-- bootstrap js cdn here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- https://fontawesome.com/ -->
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
</body>

</html>