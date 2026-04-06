<?php

session_start();

if(!isset($_SESSION['authentication'])){
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraFeed | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

    <header class="bg-danger py-4">
        <div class="header-container container-fluid d-flex align-items-center justify-content-between">
            <a href="index.php" class="text-decoration-none fw-bold letter-spacing-1 text-white fs-3">AuraFeed</a>
            <div class="admin-header-right">
                <a href="../index.php" target="_blank" class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">Load
                    Front-end</a>
                <a href="../includes/functions.php?logout=1"
                    class="text-decoration-none text-white bg-dark fs-4 border-0 px-4 py-2 fw-bold py-1 rounded">Log out</a>
            </div>
        </div>
    </header>

    <main class="mt-5">
        <div class="container">
            <?php
                if(isset($_GET["publish_failed"])){
                    echo "<div class='bg-warning fw-bold fs-4 letter-spacing-1 text-uppercase text-center rounded my-5'>Something went wrong, try again..!</div>";
                }
            ?>
            <form action="../includes/functions.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="blog_title" placeholder="Enter post title" required
                    class="blog-title w-100 fs-3 px-3 py-2 rounded border letter-spacing-1 mb-5">
                <select name="blog_category" class="w-100 mb-5 py-3 px-3 fs-4 bg-transparent blog-category text-dark border rounded" required>
                    <option>Select Cateogry</option>
                    <option class="text-gray" value="Technology">Technology</option>
                    <option class="text-gray" value="Space">Space</option>
                    <option class="text-gray" value="Fashion">Fashion</option>
                    <option class="text-gray" value="physics">Physics</option>
                    <option class="text-gray" value="Geography">Geography</option>
                    <option class="text-gray" value="Smart Home Tech">Smart Home Tech</option>
                    <option class="text-gray" value="Career Development">Career Development</option>
                    <option class="text-gray" value="Real Estate">Real Estate</option>
                    <option class="text-gray" value="Mental Well-being">Mental Well-being</option>
                </select>
                <select name="blog_trending" required class="w-100 mb-5 py-3 px-3 fs-4 bg-transparent blog-trending text-dark border rounded">
                    <option>Trending This Week</option>
                    <option class="text-gray" value="1">Yes</option>
                    <option class="text-gray" value="0">No</option>
                </select>
                <textarea name="blog_text" required class="blog-text w-100 fs-3 p-3 letter-spacing-1 rounded border" rows="10"
                    placeholder="What's on your mind"></textarea>
                <input type="file" name="blog_image" required class="mt-5 fs-3">
                <br><br>
                <div class="d-flex">
                    <input type="submit" value="Publish Now" name="publish_post" class="w-50 py-3 bg-danger border-0 text-white fw-bold letter-spacing-1 rounded fs-4 me-3">
                    <input type="submit" value="Save Post" name="save_post" class="w-50 py-3 bg-warning border-0 text-dark fw-bold letter-spacing-1 rounded fs-4 ms-3">
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
</body>

</html>