<?php require "header.php"; ?>

    <!-- main section starts here -->

    <main class="">
        <div
            class="mb-5 page-title-container page-title-container-about d-flex align-items-center justify-content-center">
            <h1 class="text-white text-uppercase fw-bold letter-spacing-1">Category</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action=""
                        class="fs-5 border-bottom letter-spacing-1 fw-bold d-flex align-items-center flex-wrap">
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" checked name="technology">
                            <label for="technology">All</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Technology</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Space</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Fashion</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Geography</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Smart Home Tech</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Finance</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Physics/label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Real Estate</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <?php
                
                    require "includes/configuration.php";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);

                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs as $post){
                            ?>
                                <div class="col-lg-4 col-12">
                                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                                        <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="w-100 rounded">
                                        <div
                                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                                <a href="category.php"
                                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3"><?php echo $post['category']?></a>
                                                <span><?php echo $post['date']?></span>
                                            </div>
                                        </div>
                                        <div class="px-3 pb-4">
                                            <a href="single.php"
                                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                            <?php echo $post['title']?>
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