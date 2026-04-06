<?php require "header.php"; ?>

<main>
    <div class="mb-5 page-title-container page-title-container-about d-flex align-items-center justify-content-center">
        <h1 class="text-white text-uppercase fw-bold letter-spacing-1">Blogs</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php require "includes/configuration.php"; ?>
                
                <form id="blogSearchForm" class="category-tag-search d-flex align-items-center position-relative">
                    <input type="text" id="blogSearchInput" placeholder="Looking for something special..!"
                        class="w-100 fs-4 letter-spacing-1 p-3 px-5 rounded-pill border"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <i class="fa-solid fa-magnifying-glass search_icon fs-1 position-absolute" role="button" id="searchBtn"></i>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <?php
                if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                    $searchValue = $_GET['search'];
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 AND title LIKE ? ORDER BY id DESC");
                    $loadQuery->execute(["%$searchValue%"]);
                } else {
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                    $loadQuery->execute();
                }

                $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);

                if(count($loadAllBlogs) > 0){
                    foreach($loadAllBlogs as $post){
                        ?>
                        <div class="col-12">
                            <div class="feed-item feed-item-meta rounded mb-5">
                                <img src="assets/img/upload/<?php echo $post['image']?>" alt="blog" class="w-100 rounded">
                                <div class="feed-item-metadata mb-3 px-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                    <div class="metadata-left">
                                        <a href="category.php?search=<?php echo urlencode($post['category']); ?>"
                                            class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">
                                            <?php echo htmlspecialchars($post['category']); ?>
                                        </a>
                                        <span><?php echo $post['date']; ?></span>
                                    </div>
                                    <div class="metadata-right d-none d-md-block">
                                        <a href="#" class="text-decoration-none"><?php echo htmlspecialchars($post['author']); ?></a>
                                    </div>
                                </div>
                                <div class="px-3 pb-4">
                                    <a href="single.php?id=<?php echo $post['id']; ?>"
                                        class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center mt-5"><h3>No blogs found matching your search.</h3></div>';
                }
            ?>
        </div>
    </div>
</main>

<script>
    const blogSearchForm = document.getElementById("blogSearchForm");
    const blogSearchInput = document.getElementById("blogSearchInput");
    const searchBtn = document.getElementById("searchBtn");

    function executeSearch(e) {
        if(e) e.preventDefault(); // Stop page reload
        
        let query = blogSearchInput.value.trim();
        if (query !== "") {
            window.location.href = "blogs.php?search=" + encodeURIComponent(query);
        } else {
            window.location.href = "blogs.php";
        }
    }

    blogSearchForm.addEventListener("submit", executeSearch);

    searchBtn.addEventListener("click", executeSearch);
</script>

<?php require "footer.php"; ?>