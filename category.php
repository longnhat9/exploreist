<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Exploreist is your ultimate destination for travel inspiration, tips, and guides. Discover hidden gems, plan your next adventure, and make the most out of your travels with our expertly curated content. Join our community of wanderers and explore the world with Exploreist.">
    <meta name="keywords" content="blog, blogging, blogger, articles, posts, content, writing, writers, blogosphere, online journal, web log, topics, ideas, tips, advice">
    <meta name="author" content="themeperch">
    <title>Exploreist</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,700;1,900&amp;family=Lovers+Quarrel&amp;family=Meddon&amp;display=swap" rel="stylesheet">


</head>

<body>
    <div class="page" style="margin-bottom: 100px;">
        <?php
        include("./layouts/header.php");
        if ($_GET['id'] && isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            die("Not found id of category");
        }
        ?>
        <!-- Offcanvas Serch -->
        <div class="offcanvas offcanvas-top offcanvasserch py-lg-100 py-40" data-bs-scroll="false" tabindex="-1" id="offcanvasserch" data-bs-backdrop="false">
            <div class="offcanvas-header py-0 justify-content-end">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="serch-modal-title mb-lg-60 mb-30">What are you looking for?</h2>
                            <div class="serch-form mb-lg-60 mb-40">
                                <form action="#">
                                    <div class="d-flex flex-wrap gap-40 justify-content-center">
                                        <input type="search" name="search" class="form-control" placeholder="Search..." required>
                                        <button type="submit" class="btn btn-primary search-btn">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Offcanvas Serch -->

        <!-- start to top button -->
        <div class="scroll_to_top to_top-2">
            <i class="fa-regular fa-angle-up"></i>
        </div>
        <!-- eND to top button -->

        <!-- dark-light-Buttons -->
        <div class="dark-light-theme-btn" id="toggleBtn">
            <span class="light-icon"><i class="fa-light fa-sun-bright"></i></span>
            <span class="dark-icon"><i class="fa-solid fa-moon"></i></span>
        </div>
        <!-- dark-light-buttons -->

        <?php
        $RsCategory = GetCategoryById($id);

        if ($RsCategory == null) {
            die ("Category Invalid!");
        }
        $Category = mysqli_fetch_array($RsCategory);
                                
        ?>

        <div class="main" data-bs-spy="scroll" data-bs-target="#navContentmenu" data-bs-root-margin="0px 0px -50%" data-bs-smooth-scroll="true">

            <!--Banner Section ======================-->
            <section class="section-banner category-1 position-relative overlay">
                <div class="category-wrapper category-wrapper-1 mx-auto position-relative parallax" style="background-image: url('./public/images/categories/<?php echo $Category['Image']; ?>');">
                    <div class="container">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mb-100">
                                <li class="breadcrumb-item breadcrumb-style-3"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item breadcrumb-style-3 active" aria-current="page">Category</li>
                            </ol>
                        </nav>
                        <!-- breadcrumb -->

                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                
                                <div class="category-title-style-1 text-start category-title-bg-position">
                                    <h2 class="text-white">
                                        <?php
                                        echo $Category['Name'];
                                        ?>
                                    </h2>
                                    <p class="text-white">
                                        <?php
                                        echo CountPostInCategory($id);
                                        ?>
                                        articles
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Blog Section ======================-->
            <?php
            $listPostOfCategory = GetAllPostsByCategoryID($id);
            if ($listPostOfCategory == null) {
                echo ("Not found post in category");
                return;
            }
            ?>
            <section class="section-blog py-4 py-sm-5 py-md-60 py-lg-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="d-flex flex-column justify-content-center gap-lg-40 g gap-md-30 gap-10  mb-lg-60 mb-30">
                                <?php
                                foreach ($listPostOfCategory as $post) {
                                ?>
                                    <div class="card card-style-5">
                                        <div class="row align-items-center  justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="card-image-wrapper">
                                                    <a href="./post-detail.php?id=<?php echo $post['PostID']; ?>"><img src="./public/images/<?php echo $post['Image']; ?>" data-src="./public/images/<?php echo $post['Image']; ?>" class="card-img-top" alt="camping"></a>
                                                </div>
                                            </div>
                                            <!-- col-6 -->
                                            <div class="col-lg-6">
                                                <div class="card-body">
                                                    <div class="card-header text-uppercase">
                                                        <a href="./category.php?id=<?php echo $post['CategoriesID']; ?>">
                                                            <?php
                                                            echo $Category['Name'];
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <h2 class="fs-2 card-title"><a href="./post-detail.php?id=<?php echo $post['PostID']; ?>" class="blog-title"><?php echo $post['Title']; ?></a></h2>

                                                    <ul class="list-unstyled card-meta lead  small">
                                                        <li>By <a class="fw-bold"><?php echo GetNameOfUserInPost($post['UserID'])["FullName"]; ?></a></li>
                                                        <li><?php echo $post['PostDate']; ?></li>
                                                    </ul>

                                                    <p class="card-text"><?php echo $post['Content']; ?></p>
                                                </div>
                                            </div>
                                            <!-- col-6 -->
                                        </div>
                                        <!-- row -->
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- container -->
            </section>
            <!--Blog Section ======================-->


            <!--CTA Section ======================-->
            <section class="section-cta">
                <div class="container">
                    <div class="cta-area pt-lg-60 pb-lg-90 pt-30 pb-30">
                        <div class="col-lg-6">
                            <div class="cta-content pl-lg-100">
                                <p class="fs-6 text-white mb-10">Keep in Touch</p>
                                <h3 class=" fs-3 text-white  mb-30 ">Explore the world</h3>
                                <form>
                                    <div class="form-group d-flex gap-30">
                                        <input type="email" class="form-control" name="email" placeholder="Your email address" required>
                                        <button type="submit" class="btn btn-secondary">Subscribe</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--CTA Section ======================-->

        </div>
        <!-- main -->

        <!--Footer Section ======================-->
        <footer class="section-footer section-footer-2  parallax pt-40 pt-md-60 pt-lg-130">
            <?php
            include("./layouts/footer.php");
            ?>
        </footer>
    </div>
    <!-- page -->

    <!-- js link -->
    <script src="./public/js/jquery-3.7.0.min.js"></script>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/swiper-bundle.min.js"></script>
    <script src="./public/js/wow.js"></script>
    <script src="./public/js/venobox.min.js"></script>
    <script src="./public/js/odometer.min.js"></script>
    <script src="./public/js/owl.carousel.min.js"></script>
    <script src="./public/js/gsap/gsap.min.js"></script>
    <script src="./public/js/gsap/SplitText.min.js"></script>
    <script src="./public/js/gsap/ScrollTrigger.min.js"></script>
    <script src="./public/js/gsap/split-type-0.3.3.min.js"></script>
    <script src="./public/js/lazy.image.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>