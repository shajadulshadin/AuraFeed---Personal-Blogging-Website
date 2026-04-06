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
                <a href="../admin/index.php"
                    class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">Published</a>
                <a href="index.php" class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">+ Save
                    Post</a>
                <a href="../index.php"
                    class="text-decoration-none text-white bg-dark fs-4 border-0 px-4 py-2 fw-bold py-1 rounded">Log out</a>
            </div>
        </div>
    </header>

    <main class="mt-5">
        <div class="container">
            <form action="">
                <input type="text" placeholder="Enter post title"
                    class="w-100 fs-3 px-3 py-2 rounded border letter-spacing-1 mb-5">
                <select class="w-100 mb-5 py-3 px-3 fs-4 bg-transparent text-dark border rounded">
                    <option>Select Cateogry</option>
                    <option class="text-gray" value="Technology">Technology</option>
                    <option class="text-gray" value="Space">Space</option>
                    <option class="text-gray" value="Fashion">Fashion</option>
                    <option class="text-gray" value="Geography">Geography</option>
                    <option class="text-gray" value="Smart Home Tech">Smart Home Tech</option>
                    <option class="text-gray" value="Career Development">Career Development</option>
                    <option class="text-gray" value="Real Estate">Real Estate</option>
                    <option class="text-gray" value="Mental Well-being">Mental Well-being</option>
                </select>
                <textarea name="" id="" class="w-100 fs-3 p-3 letter-spacing-1 rounded border" rows="10"
                    placeholder="What's on your mind"></textarea>
                <input type="file" class="mt-5 fs-3">
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
</body>

</html>