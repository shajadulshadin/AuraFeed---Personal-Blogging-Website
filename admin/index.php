<?php

session_start();

if(!isset($_SESSION['authentication'])){
    header("Location: ../index.php");
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

    <header class="bg-danger py-3">
        <div class="header-container container-fluid d-flex align-items-center justify-content-between">
            <a href="index.php" class="letter-spacing-1 fw-bold text-white fs-3 text-decoration-none">AuraFeed</a>
            <div class="admin-header-right">
                <a href="../index.php" target="_blank"
                    class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">Load
                    Front-end</a>
                <a href="post.php" class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">+ New
                    Post</a>
                <a href="../includes/functions.php?logout=1"
                    class="text-decoration-none text-white bg-dark fs-4 border-0 px-4 py-2 fw-bold py-1 rounded">Log
                    out</a>
            </div>
        </div>
    </header>

    <div class="container">
        <form action="" class="mt-5 d-flex align-items-center">
            <input type="text" placeholder="Search post..."
                class="w-100 fs-3 letter-spacing-1 rounded-start border px-4 py-3 admin-search">
            <input type="submit" value="Search"
                class="fs-3 letter-spacing-1 border px-4 py-3 text-white fw-bold bg-danger rounded-end">
        </form>
    </div>

    <div class="container-fluid">
        <h1 class="my-5 letter-spacing-1 text-center fs-1">Manage Content</h1>
        <table class="w-100 fs-4 text-center letter-spacing-1 table table-hover mt-2">
            <thead class="bg-danger text-white">
                <tr class="">
                    <th class="py-4">ID</th>
                    <th class="py-4">Post Title</th>
                    <th class="py-4">Author</th>
                    <th class="py-4">Status</th>
                    <th class="py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require "../includes/configuration.php";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs as $post){
                            ?>
                                <tr>
                                    <td class="py-5"><?php echo $post['id'];?></td>
                                    <td class="text-start py-5"><?php echo $post['title'];?></td>
                                    <td class="py-5"><?php echo $post['author'];?></td>
                                    <td class="py-5">
                                    <?php
                                        if($post["status"] == 0){
                                            echo "<span class='badge text-dark bg-warning'>Saved</span>";
                                        }else{
                                            echo "<span class='badge bg-success'>Published</span>";
                                        }
                                    ?>
                                    </td>
                                    <td class="py-5">
                                        <i class="fa-regular fa-trash-can text-danger me-2" data-id="<?php echo $post['id']; ?>" role="button"></i>
                                        <i class="fa-regular fa-pen-to-square text-primary" data-id="<?php echo $post['id']; ?>" role="button"></i>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                ?>

            </tbody>
        </table>

        <div class="text-center mt-5 mb-5">
            <a href=""
                class="fs-4 text-center text-dark text-decoration-none shadow-sm bg-danger text-white me-4 px-4 py-2 rounded">1</a>
            <a href=""
                class="fs-4 text-center text-dark text-decoration-none shadow-sm bg-light text-dark me-4 px-4 py-2 rounded">2</a>
            <a href=""
                class="fs-4 text-center text-dark text-decoration-none shadow-sm bg-light text-dark me-4 px-4 py-2 rounded">3</a>
            <a href=""
                class="fs-4 text-center text-dark text-decoration-none shadow-sm bg-light text-dark me-4 px-4 py-2 rounded">.
                . .</a>
            <a href=""
                class="fs-4 text-center text-dark text-decoration-none shadow-sm bg-light text-dark me-4 px-4 py-2 rounded">12</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js" defer></script>
</body>

</html>