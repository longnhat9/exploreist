<?php
session_start();
?>
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,700;1,900&amp;family=Lovers+Quarrel&amp;family=Meddon&amp;display=swap" rel="stylesheet">

<!-- css -->
<link rel="stylesheet" href="./public/css/fontawesome.min.css">
<link rel="stylesheet" href="./public/css/all.min.css">
<link rel="stylesheet" href="./public/css/odometer.min.css">
<link rel="stylesheet" href="./public/css/venobox.min.css">
<link rel="stylesheet" href="./public/css/animate.css">
<link rel="stylesheet" href="./public/css/swiper-bundle.min.css">
<link rel="stylesheet" href="./public/css/owl.carousel.min.css">
<link rel="stylesheet" href="./public/css/owl.theme.default.min.css">
<link rel="stylesheet" href="./public/css/style.css">
<?php
include("./config/db.php");
include("./func.php");
?>
<style>
    .section-header {
        background: #4c9bb3;
    }

    .header-nav {
        position: relative;
    }

    .header-nav::after {
        position: absolute;
        top: 20px;
        left: 0;
        content: "";
        width: 70px;
        height: 50px;
        display: block;
        /* display: none; */
        background-color: transparent;
    }

    .header-nav .menu-user {
        position: absolute;
    }

    .section-blog {
        margin-top: 80px;
    }
</style>
<header class="section-header header-1 sticky-navbar" data-bs-theme="light">
    <div class="container">
        <nav class="navbar navbar-expand-xl hover-menu ">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <a class="navbar-brand" href="./index.php" aria-label="nav-brands">
                    <img src="./public/images/logo-white.png" class="logo-light img-fluid" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmobile-menu" aria-controls="offcanvasmobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="./public/images/header-menu.png" alt="menu">
                </button>

                <div class="d-none d-xl-block">
                    <div class="d-flex gap-70 align-items-center">
                        <ul class="gap-20 navbar-nav mb-2 me-2 mb-lg-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link active d-flex gap-2 align-items-center" aria-current="page" href="./index.php" aria-label="nav-links" aria-expanded="false">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-flex gap-2 align-items-center" aria-current="page" href="./category.php" aria-label="nav-links" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                    <span class="dropdown-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $Categories = GetAllCategories();

                                    if ($Categories) {
                                        foreach ($Categories as $Category) {
                                    ?>
                                            <li>
                                                <a class="dropdown-item" href="./category.php?id=<?php echo $Category['CategoriesID']; ?>" aria-label="single-pages"><?php echo $Category['Name']; ?></a>
                                            </li>
                                    <?php
                                        }
                                    } else {
                                        echo "Not found categories";
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-flex gap-2 align-items-center" aria-current="page" href="./contact.php" aria-label="nav-links" aria-expanded="false">
                                    Contact
                                </a>
                            </li>
                        </ul>

                        <div class="d-flex gap-20 align-items-center">
                            <a class="serch-icon px-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasserch" aria-controls="offcanvasserch">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 19L13.0001 13M15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']) {
                                ?>
                                <li class="nav-item dropdown header-nav" style="display: block;">
                                    <a class="nav-link active" data-bs-toggle="dropdown">
                                        Hello: <?php echo $_SESSION['user']; ?>
                                    </a>
                                    
                                    <ul class="dropdown-menu menu-user" style="z-index: 999; top: 60px;">
                                        <li>
                                            <a class="dropdown-item" href="./manager-posts.php" aria-label="single-pages">Manager posts</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="./logout.php" aria-label="single-pages">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <a class="menu-icon" href="./login.php">
                                    Login/Register
                                </a>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
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
                                <form action="./search.php">
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
    </div>
</header>
<!-- Header ======================-->