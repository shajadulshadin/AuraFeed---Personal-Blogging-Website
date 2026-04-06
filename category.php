<?php require "header.php"; ?>

<main class="">
    <div class="mb-5 page-title-container page-title-container-about d-flex align-items-center justify-content-center">
        <h1 class="text-white text-uppercase fw-bold letter-spacing-1">Category</h1>
    </div>

    <div class="container">
        <div class="row">
            <form id="searchForm" class="category-tag-search d-flex align-items-center position-relative">
                <input type="text" id="categoryInput" placeholder="Looking for specific category..!"
                    class="w-100 fs-4 letter-spacing-1 p-3 px-5 rounded-pill border"
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <i class="fa-solid fa-magnifying-glass search_category fs-1 position-absolute" role="button"></i>
            </form>
        </div>

        <div class="row mt-5">
            <?php
            require "includes/configuration.php";

            if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                $searchValue = $_GET['search'];
                
                $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 AND category LIKE ? ORDER BY id DESC");
                $loadQuery->execute(["%$searchValue%"]);
            } else {
                $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE status = 1 ORDER BY id DESC");
                $loadQuery->execute();
            }

            $loadAllBlogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);

            if (count($loadAllBlogs) > 0) {
                foreach ($loadAllBlogs as $post) {
                    ?>
                    <div class="col-lg-4 col-12">
                        <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                            <img src="assets/img/upload/<?php echo $post['image']; ?>" alt="blog" class="w-100 rounded">
                            <div class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                                <div class="metadata-left d-flex align-items-center justify-content-between w-100">
                                    <a href="category.php?search=<?php echo urlencode($post['category']); ?>"
                                       class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">
                                        <?php echo htmlspecialchars($post['category']); ?>
                                    </a>
                                    <span><?php echo $post['date']; ?></span>
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
                echo '<div class="col-12 text-center"><h3>No blogs found in this category.</h3></div>';
            }
            ?>
        </div>
    </div>
</main>

<script>
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("categoryInput");
    const searchIcon = document.querySelector(".search_category");

    function performSearch(e) {
        if(e) e.preventDefault();
        
        let searchValue = searchInput.value.trim();
        if (searchValue !== "") {
            window.location.href = "./category.php?search=" + encodeURIComponent(searchValue);
        } else {
            window.location.href = "./category.php";
        }
    }

    searchForm.addEventListener("submit", performSearch);

    searchIcon.addEventListener("click", performSearch);
</script>

<?php require "footer.php"; ?>