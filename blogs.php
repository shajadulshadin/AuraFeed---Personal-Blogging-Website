<?php require "header.php"; ?>

    <!-- main section starts here -->

    <main>
        <div
            class=" mb-5 page-title-container page-title-container-about d-flex align-items-center justify-content-center">
            <h1 class="text-white text-uppercase fw-bold letter-spacing-1">Blogs</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php 
                        require "includes/configuration.php";
                    ?>
                    <form action="" class="category-tag-search d-flex align-items-center position-relative">
                        <input type="text" placeholder="Looking for something special..!"
                            class="w-100 fs-4 letter-spacing-1 p-3 px-5 rounded-pill border">
                        <i class="fa-solid fa-magnifying-glass fs-1 position-absolute" role="button"></i>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <?php
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs as $post){
                            ?>
                                <div class="col-12">
                                    <div class="feed-item feed-item-meta rounded mb-5">
                                        <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="w-100 rounded">
                                        <div
                                            class="feed-item-metadata mb-3 px-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                            <div class="metadata-left">
                                                <a href="category.php"
                                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3"><?php echo $post['category']; ?></a>
                                                <span><?php echo $post['date']; ?></span>
                                            </div>
                                            <div class="metadata-right d-none d-md-block">
                                                <a href="" class="text-decoration-none"><?php echo $post['author']; ?></a>
                                            </div>
                                        </div>
                                        <div class="px-3 pb-4">
                                            <a href="single.php"
                                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                                <?php echo $post['title']; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                    ?>

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
        </div>
    </main>

    <!-- main feed section ends here -->

<?php require "footer.php";?>