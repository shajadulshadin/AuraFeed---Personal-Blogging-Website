
<?php require "header.php"; ?>

    <!-- main section starts here -->

    <main class="pt-5 pb-5">
        <div class="container pt-5">
            <div class="row pt-2">
                <!-- feed section starts here -->
                <div class="col-lg-8 col-12">
                    <?php
                    
                    require "includes/configuration.php";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs as $post){
                            ?>
                            <div class="feed-item rounded mb-5">
                                <img src="assets/img/upload/<?php echo $post['image'];?>" alt="blog" class="w-100 rounded">
                                <div
                                    class="feed-item-metadata mb-3 px-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                    <div class="metadata-left">
                                        <a href="category.php"
                                            class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3"><?php echo $post['category'];?></a>
                                        <span><?php echo $post['date']?></span>
                                    </div>
                                    <div class="d-none d-lg-block metadata-right text-gray letter-spacing-1">
                                        <?php echo $post['author']?>
                                    </div>
                                </div>
                                <div class="px-3 pb-4">
                                    <a href="single.php?id=<?php echo $post['id'];?>"
                                        class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                        <?php echo $post['title']?>
                                    </a>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>

                    <!-- pagination starts here -->

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

                    <!-- pagination ends here -->
                </div>
                <!-- feed section ends here -->

                <!-- right sidebar starts here -->
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <div class="most-read-container">
                        <h2 class="mb-5 fs-1 letter-spacing-1">Most Read</h2>
                        <?php
                            $loadQuery = $connection->prepare("SELECT * FROM blog_post ORDER BY views DESC LIMIT 3");
                            $loadQuery->execute();
                            $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                        if(count($loadAllBlogs) > 0){
                            foreach($loadAllBlogs as $post){
                                ?>
                                    <div class="right-sidebar-item mb-5 d-flex">
                                    <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="rounded">
                                    <span class="fs-4 letter-spacing-1 ms-3" role="button">
                                        <a href="single.php?id=<?php echo $post['id'];?>" class="text-decoration-none text-dark"><?php echo $post['title'];?></a>
                                    </span>
                                </div>
                                
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="category-container">
                        <h2 class="mb-5 fs-1 letter-spacing-1">Top categories</h2>
                        <ul class="list-unstyled">
                            <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4"
                                role="button">
                                <span><a href="category.php"
                                        class="text-decoration-none text-dark">Technology</a></span>
                                <span class="bg-primary text-white rounded-pill px-4">24</span>
                            </li>
                            <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4"
                                role="button">
                                <span><a href="category.php" class="text-decoration-none text-dark">Space</a></span>
                                <span class="bg-success text-white rounded-pill px-4">12</span>
                            </li>
                            <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4"
                                role="button">
                                <span><a href="category.php" class="text-decoration-none text-dark">Physics</a></span>
                                <span class="bg-dark text-white rounded-pill px-4">18</span>
                            </li>
                            <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4"
                                role="button">
                                <span><a href="category.php" class="text-decoration-none text-dark">Fashion</a></span>
                                <span class="bg-danger text-white rounded-pill px-4">19</span>
                            </li>
                            <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4"
                                role="button">
                                <span><a href="category.php"
                                        class="text-decoration-none text-dark">Geography</a></span>
                                <span class="bg-warning text-white rounded-pill px-4">23</span>
                            </li>
                        </ul>
                    </div>
                    <div class="most-read-container trending-container mt-5">
                        <h2 class="mb-5 fs-1 letter-spacing-1">Trending now</h2>
                        <?php
                            $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE trending = 1 ORDER BY views DESC LIMIT 3");
                            $loadQuery->execute();
                            $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                            if(count($loadAllBlogs) > 0){
                                foreach($loadAllBlogs as $post){
                                    ?>
                                        <div class="right-sidebar-item mb-5 d-flex">
                                        <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="rounded">
                                        <span class="fs-4 letter-spacing-1 ms-3" role="button">
                                            <a href="single.php?id=<?php echo $post['id'];?>" class="text-decoration-none text-dark"><?php echo $post['title'];?></a>
                                        </span>
                                    </div>
                                    
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="blogs-container d-flex flex-wrap">
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">science</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">clothing</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">lamborghini</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">galaxy</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">clothing</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">galaxy</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">science</a></div>
                        <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4" role="button"><a
                                href="blogs.php" class="text-decoration-none text-dark">galaxy</a></div>
                    </div>
                </div>
                <!-- right sidebar ends here -->

            </div>
        </div>
    </main>

    <!-- main feed section ends here -->

<?php require "footer.php";?>