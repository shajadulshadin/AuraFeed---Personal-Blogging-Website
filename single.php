<?php require "header.php"; ?>

    <!-- main section starts here -->

    <main class="pt-5 pb-5">
        <div class="container pt-5">
            <div class="row pt-2">
                <!-- feed section starts here -->
                <?php

                    $id = $_GET['id'];
                    require "includes/configuration.php";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE id = $id");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);

                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs  as $post){
                            ?>
                            
                            <div class="col-12 col-lg-8">
                                <img src="assets/img/upload/<?php echo $post['image'];?>" alt="blog" class="w-100 rounded single-imge">
                                <div class="single-page-meta d-flex align-items-center justify-content-between fs-4 mt-4">
                                    <a href="category.php"
                                        class="bg-danger text-white text-decoration-none px-4 rounded fw-bold letter-spacing-1"><?php echo $post['category'];?></a>
                                    <span class="text-gray"><?php echo $post['author'];?></span>
                                </div>
                                <h1 class="single-page-title letter-spacing-1 lh-base mt-5"><?php echo $post['title'];?></h1>
                                <div class="single-page-blog fs-3 lh-base letter-spacing-1 mt-5 pt-3">
                                    <?php echo $post['blog'];?>
                                </div>
                            </div>

                            <?php
                        }
                    }

                ?>
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