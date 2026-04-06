<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraFeed</title>
    <!-- bootstrap css cdn here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- main css here -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- header section starts here -->

    <header class="shadow py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-3">
                    <a href="index.html">
                        <img src="img/logo.png" alt="Logo" class="w-100">
                    </a>
                </div>
                <div class="col-9 d-flex align-items-center justify-content-end">
                    <nav>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li class="ms-5 d-none d-xl-block">
                                <a href="index.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Home</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="category.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Category</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="blogs.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Blogs</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="about.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">About us</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="contact.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-dark">Contact us</a>
                            </li>
                            <li class="ms-5 d-none d-xl-block">
                                <a href="login.html"
                                    class="text-decoration-none fs-4 letter-spacing-1 fw-bold text-white bg-danger px-5 rounded-pill py-2">Admin
                                    Login</a>
                            </li>
                            <li class="ms-5"><i class="fa-solid fa-bars fs-1 d-initial d-xl-none"
                                    data-bs-toggle="offcanvas" data-bs-target="#mobile-menu" role="button"></i>
                            </li>
                            <div class="mobile-menu-container offcanvas offcanvas-end" id="mobile-menu">
                                <i class="fa-solid fa-xmark fs-1 text-end me-3 mt-3" data-bs-dismiss="offcanvas"
                                    role="button"></i>
                                <ul class="list-unstyled fs-3 text-end me-3 mt-5">
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="index.html" class="text-decoration-none text-danger">Home</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="category.html" class="text-decoration-none text-danger">Category</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="blogs.html" class="text-decoration-none text-danger">Blogs</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="about.html" class="text-decoration-none text-danger">About</a>
                                    </li>
                                    <li class="mb-4 border-bottom pb-3 letter-spacing-1">
                                        <a href="contact.html" class="text-decoration-none text-danger">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- header section ends here -->

    <!-- main section starts here -->

    <main class="">
        <div
            class="mb-5 page-title-container page-title-container-about d-flex align-items-center justify-content-center">
            <h1 class="text-white text-uppercase fw-bold letter-spacing-1">Category</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- <form action="" class="category-tag-search d-flex align-items-center position-relative">
                        <input type="text" placeholder="Search Category"
                            class="w-100 fs-4 letter-spacing-1 p-3 px-5 rounded-pill border">
                        <i class="fa-solid fa-magnifying-glass fs-1 position-absolute" role="button"></i>
                    </form> -->
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
                            <label for="technology">Career Development</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Real Estate</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Mental Well-being</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Fitness</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Parenting</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Living</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Tools of the Trade</label>
                        </div>
                        <div class="category-container me-4 mb-5">
                            <input type="checkbox" name="technology">
                            <label for="technology">Industry Trends</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="feed-item feed-item-meta rounded mb-5 pb-5">
                        <img src="img/blog-item-5.jpeg" alt="blog" class="w-100 rounded">
                        <div
                            class="feed-item-metadata mb-3 pt-3 d-flex align-items-center justify-content-between fs-4">
                            <div class="metadata-left d-flex align-items-center justify-content-between w-100   ">
                                <a href="category.html"
                                    class="text-decoration-none bg-danger text-white rounded-pill px-4 fw-bold me-3">Technology</a>
                                <span>14 Jan 2026</span>
                            </div>
                        </div>
                        <div class="px-3 pb-4">
                            <a href="single.html"
                                class="feed-title text-decoration-none fs-4 text-dark lh-lg letter-spacing-2">
                                Creating and regularly updating a website with articles, news, or multimedia
                                content,
                                typically in a reverse chronological format.
                            </a>
                        </div>
                    </div>
                </div>
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

    <!-- footer section starts here -->

    <footer class="bg-dark pt-5 mt-5">
        <div class="container text-white py-5">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-4">
                    <img src="img/logo-footer.png" alt="Logo" class="w-100">
                    <p class="pt-5 fs-4 letter-spacing-2">Weekly reflections on design, slow living, and the art of the
                        craft. No fluff—just
                        honest writing delivered straight from my desk to your screen.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-center text-start mt-5">
                    <h3 class="fs-1 letter-spacing-1">Quick links</h3>
                    <ul class="list-unstyled fs-3 mt-5">
                        <li class="mb-3 letter-spacing-2"><a href="about.html"
                                class="text-decoration-none text-gray">About us</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="contact.html"
                                class="text-decoration-none text-gray">Contact us</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="policy.html"
                                class="text-decoration-none text-gray">Privacy Policy</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="terms.html"
                                class="text-decoration-none text-gray">Terms of Service</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-4 text-lg-center text-start mt-5">
                    <h3 class="fs-1 letter-spacing-1">Top categories</h3>
                    <ul class="list-unstyled fs-3 mt-5">
                        <li class="mb-3 letter-spacing-2"><a href="category.html"
                                class="text-decoration-none text-gray">Technology</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="category.html"
                                class="text-decoration-none text-gray">Space</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="category.html"
                                class="text-decoration-none text-gray">Fashion</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="category.html"
                                class="text-decoration-none text-gray">Physics</a>
                        </li>
                        <li class="mb-3 letter-spacing-2"><a href="category.html"
                                class="text-decoration-none text-gray">Geography</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row text-center fs-3 letter-spacing-1 border-top mt-5 pt-5">
                <div class="col-12">&#169 All rights reserved by AuraFeed</div>
            </div>
        </div>
    </footer>

    <!-- footer section ends here -->

    <!-- bootstrap js cdn here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- https://fontawesome.com/ -->
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
</body>

</html>