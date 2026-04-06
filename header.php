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

<body>

    <!-- header section starts here -->

    <header class="shadow py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-3">
                    <a href="index.php">
                        <img src="assets/img/logo.png" alt="Logo" class="w-100">
                    </a>
                </div>
                <div class="col-9 d-flex align-items-center justify-content-end">
                    <nav>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li class="ms-5 d-none d-xl-block">
                                <a href="index.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Home</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="category.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Category</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="blogs.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Blogs</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="about.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">About us</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="contact.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Contact us</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="login.php"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-white bg-danger px-5 rounded-pill py-2">Admin
                                    Login</a>
                            </li>
                            <li class="ms-5"><i class="fa-solid fa-bars fs-1 d-initial d-xl-none"
                                    data-bs-toggle="offcanvas" data-bs-target="#mobile-menu" role="button"></i>
                            </li>
                            <div class="mobile-menu-container offcanvas offcanvas-end" id="mobile-menu">
                                <i class="fa-solid fa-xmark fs-1 text-end me-3 mt-3" data-bs-dismiss="offcanvas"
                                    role="button"></i>
                                <ul class="list-unstyled fs-3 text-end me-3 mt-5">
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="index.php" class="text-decoration-none text-danger">Home</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="category.php" class="text-decoration-none text-danger">Category</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="blogs.php" class="text-decoration-none text-danger">Blogs</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="about.php" class="text-decoration-none text-danger">About</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="contact.php" class="text-decoration-none text-danger">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- header section ends here -->