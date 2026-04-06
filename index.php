<?php require "header.php"; ?>

<main class="pt-5 pb-5">
    <div class="container pt-5">
        <div class="row pt-2">
            <div class="col-lg-8 col-12">
                <?php
                    require "includes/configuration.php";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                    $loadQuery->execute();
                    $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);
                    
                    if(count($loadAllBlogs) > 0){
                        foreach($loadAllBlogs as $post){
                            ?>
                            <div class="feed-item rounded mb-5 shadow-sm border">
                                <img src="assets/img/upload/<?php echo $post['image'];?>" alt="blog" class="w-100 rounded-top">
                                <div class="feed-item-metadata mb-3 px-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                    <div class="metadata-left">
                                        <a href="category.php?search=<?php echo urlencode($post['category']); ?>"
                                            class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3"><?php echo htmlspecialchars($post['category']);?></a>
                                        <span><?php echo $post['date']?></span>
                                    </div>
                                    <div class="d-none d-lg-block metadata-right text-muted letter-spacing-1">
                                        <?php echo htmlspecialchars($post['author'])?>
                                    </div>
                                </div>
                                <div class="px-3 pb-4">
                                    <a href="single.php?id=<?php echo $post['id'];?>"
                                        class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2 fw-bold">
                                        <?php echo htmlspecialchars($post['title'])?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="col-12 col-lg-4 d-none d-lg-block">
                <div class="most-read-container">
                    <h2 class="mb-5 fs-1 letter-spacing-1">Most Read</h2>
                    <?php
                        $mostReadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY views DESC LIMIT 3");
                        $mostReadQuery->execute();
                        $mostReadBlogs = $mostReadQuery->fetchAll(PDO::FETCH_ASSOC);
                        foreach($mostReadBlogs as $post){
                            ?>
                            <div class="right-sidebar-item mb-5 d-flex align-items-center">
                                <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="rounded">
                                <span class="fs-4 letter-spacing-1 ms-3">
                                    <a href="single.php?id=<?php echo $post['id'];?>" class="text-decoration-none text-dark"><?php echo htmlspecialchars($post['title']);?></a>
                                </span>
                            </div>
                            <?php
                        }
                    ?>
                </div>

                <div class="category-container">
                    <h2 class="mb-5 fs-1 letter-spacing-1">Top categories</h2>
                    <ul class="list-unstyled">
                        <?php
                            $myCategories = [
                                ['name' => 'Technology', 'color' => 'bg-primary'],
                                ['name' => 'Space',      'color' => 'bg-success'],
                                ['name' => 'Physics',    'color' => 'bg-dark'],
                                ['name' => 'Fashion',    'color' => 'bg-danger'],
                                ['name' => 'Geography',  'color' => 'bg-warning']
                            ];

                            foreach($myCategories as $cat) {
                                $stmt = $connection->prepare("SELECT COUNT(*) FROM blog_post WHERE status = 1 AND category = ?");
                                $stmt->execute([$cat['name']]);
                                $count = $stmt->fetchColumn();
                                ?>
                                <li class="fs-5 fw-bold d-flex align-items-center justify-content-between border-bottom pb-3 mb-4" role="button">
                                    <span>
                                        <a href="category.php?search=<?php echo urlencode($cat['name']); ?>" class="text-decoration-none text-dark">
                                            <?php echo $cat['name']; ?>
                                        </a>
                                    </span>
                                    <span class="<?php echo $cat['color']; ?> text-white rounded-pill px-4">
                                        <?php echo $count; ?>
                                    </span>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>

                <div class="most-read-container trending-container mt-5">
                    <h2 class="mb-5 fs-1 letter-spacing-1">Trending now</h2>
                    <?php
                        $trendingQuery = $connection->prepare("SELECT * FROM blog_post WHERE trending = 1 AND status = 1 ORDER BY views DESC LIMIT 3");
                        $trendingQuery->execute();
                        $trendingBlogs = $trendingQuery->fetchAll(PDO::FETCH_ASSOC);
                        foreach($trendingBlogs as $post){
                            ?>
                            <div class="right-sidebar-item mb-5 d-flex align-items-center">
                                <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="rounded" style="width:80px; height:60px; object-fit:cover;">
                                <span class="fs-4 letter-spacing-1 ms-3">
                                    <a href="single.php?id=<?php echo $post['id'];?>" class="text-decoration-none text-dark"><?php echo htmlspecialchars($post['title']);?></a>
                                </span>
                            </div>
                            <?php
                        }
                    ?>
                </div>

                <div class="blogs-container d-flex flex-wrap mt-5">
                    <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4 border shadow-sm" role="button"><a href="blogs.php?search=science" class="text-decoration-none text-dark">science</a></div>
                    <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4 border shadow-sm" role="button"><a href="blogs.php?search=clothing" class="text-decoration-none text-dark">clothing</a></div>
                    <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4 border shadow-sm" role="button"><a href="blogs.php?search=lamborgini" class="text-decoration-none text-dark">lamborghini</a></div>
                    <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4 border shadow-sm" role="button"><a href="blogs.php?search=galaxy" class="text-decoration-none text-dark">galaxy</a></div>
                    <div class="px-3 py-2 rounded-pill letter-spacing-1 fs-5 me-3 mb-4 border shadow-sm" role="button"><a href="blogs.php?search=space" class="text-decoration-none text-dark">space</a></div>
                </div>
            </div>
            </div>
    </div>
</main>

<?php require "footer.php";?>