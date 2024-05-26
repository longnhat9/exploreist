<!doctype html>
<html lang="en" data-bs-theme="light">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Exploreist is your ultimate destination for travel inspiration, tips, and guides. Discover hidden gems, plan your next adventure, and make the most out of your travels with our expertly curated content. Join our community of wanderers and explore the world with Exploreist.">
        <meta name="keywords" content="blog, blogging, blogger, articles, posts, content, writing, writers, blogosphere, online journal, web log, topics, ideas, tips, advice">
        <meta name="author" content="themeperch">
		<title>Exploreist</title>
		<link rel="shortcut icon" type="images/png" href="./public/images/fav-icon/favicon.png">
	</head>
	<body>
		<div class="page">
            <?php
            include("./layouts/header.php");
            ?>

            <!-- start to top button -->
            <div class="scroll_to_top to_top-2" >
                <i class="fa-regular fa-angle-up"></i>
            </div>
            <!-- eND to top button -->
            
             <!-- dark-light-Buttons -->
             <div class="dark-light-theme-btn" id="toggleBtn">
                <span class="light-icon"><i class="fa-light fa-sun-bright"></i></span>
                <span class="dark-icon"><i class="fa-solid fa-moon"></i></span>
            </div>
            <!-- dark-light-buttons -->


            <div class="main"  data-bs-spy="scroll" data-bs-target="#navContentmenu" data-bs-root-margin="0px 0px -50%" data-bs-smooth-scroll="true">
                <!--Hero Section ======================-->
                <section class="section-hero hero-1 position-relative overlay">
                    <div class="hero-wrapper mx-auto position-relative parallax">
                        <div class="container">
                            <div class="hero-inner-text position-relative text-center mb-5 mb-xxl-70 ">
                                <h1 id="text-anim" class="display-2 lh-1 font-family-style-1 text-white exp-text-animate-1">Your Adventure</h1>	
                                <h2 class="display-1 lh-1 font-family-style-2 text-white exp-text-animate-1">begin here</h2>	
                            </div>

                                <div class="swiper swiper-card">
                                    <div class="swiper-wrapper">
                                        <?php
                                        foreach ($Categories as $Category) {
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="card card-style-18">
                                                    <div class="card-image-wrapper">
                                                        <a href="./category.php?id=<?php echo $Category['CategoriesID']; ?>"> <img src="./public/images/categories/<?php echo $Category['Image']; ?>" class="card-img-top" alt="<?php echo $Category['Name']; ?>"><?php echo $Category['Name']; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- swiper-wrapper -->                                    
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <!-- hero-wrapper -->
                    				
                </section>
                <!--Hero Section ======================-->

                
                <!--Blog Section ======================-->
                <section class="section-blog py-4 py-sm-5 py-md-60 py-lg-100">
                    <div class="container">
                        <div class="row custom-row-gap">
                            <div class="col-xl-4 order-xl-1">
                                <div class="sticky-elements">
                                    <div class="d-flex flex-row flex-xl-column justify-content-center gap-lg-60 gap-30 pb-30  pb-lg-0 ml-lg-0">
                                        <div class="d-none d-lg-block" >
                                            <div class="d-flex flex-column gap-60">
    
                                                <div class="widget widget-style-1  wow fadeInUp" data-wow-delay="0.3s">                                           
                                                    <h4 class="fs-1 mb-3 mb-lg-20">Newsletter</h4>
                                                    <p class="mb-4 mb-lg-30">Make sure to subscribe to our newsletter and be first to get latest updates and news.</p>
        
                                                    <form  id="contactForm-04" class="contact-form d-flex flex-column gap-20">                                                
                                                        <div>
                                                            <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                                        </div>	
                                                        <div>
                                                            <button type="submit" class="btn btn-xl btn-primary w-100">Subscribe</button>
                                                        </div>	                                                
                                                    </form>
                                                </div>
                                                <!-- widget -->
        
                                                <div class="widget widget-style-2  wow fadeInUp" data-wow-delay="0.3s">                                           
                                                    <h4 class="fs-1 mb-3 mb-lg-30 text-white">Lets Talk</h4>
                                                    <p class="mb-20 mb-lg-40 text-white">We are a team always open to discuss your project and improve your online presence.</p> 
                                                    
                                                    <div class="social-icons d-flex flex-wrap align-items-center gap-20">
                                                        <a href="https://www.facebook.com/">
                                                            <span class="">
                                                                <svg width="10" height="16" viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.13046 2.63679V0.036944C9.13046 0.036944 6.47179 0.0117188 6.29118 0.0117188C5.08995 0.0117188 3.36232 1.37817 3.36232 2.92941C3.36232 4.67665 3.36232 5.71267 3.36232 5.71267H0.873047V8.66395H3.32872V15.9876H6.2352V8.63036H8.80428L9.13046 5.74627H6.2688C6.2688 5.74627 6.2688 3.97383 6.2688 3.62803C6.2688 3.11981 6.65242 2.62141 7.22643 2.62141C7.60864 2.62141 9.13046 2.63679 9.13046 2.63679Z"/>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        
                                                        <a href="https://www.instagram.com/">
                                                            <span class="">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.0524 15.9895H4.94685C2.22518 15.9895 0.0117188 13.776 0.0117188 11.0544V4.9488C0.0117188 2.22713 2.22518 0.0136719 4.94685 0.0136719H11.0524C13.7741 0.0136719 15.9875 2.22713 15.9875 4.9488V11.0544C15.9889 13.776 13.7741 15.9895 11.0524 15.9895ZM4.94685 1.79451C3.208 1.79451 1.79256 3.20996 1.79256 4.9488V11.0544C1.79256 12.7932 3.208 14.2087 4.94685 14.2087H11.0524C12.7912 14.2087 14.2067 12.7932 14.2067 11.0544V4.9488C14.2067 3.20996 12.7912 1.79451 11.0524 1.79451H4.94685Z"/>
                                                                    <path d="M8.00046 12.0849C5.7492 12.0849 3.91797 10.2537 3.91797 8.00242C3.91797 5.75116 5.7492 3.91992 8.00046 3.91992C10.2517 3.91992 12.083 5.75116 12.083 8.00242C12.083 10.2537 10.2517 12.0849 8.00046 12.0849ZM8.00046 5.52156C6.63263 5.52156 5.5196 6.63458 5.5196 8.00242C5.5196 9.37025 6.63263 10.4833 8.00046 10.4833C9.3683 10.4833 10.4813 9.37025 10.4813 8.00242C10.4813 6.63458 9.3683 5.52156 8.00046 5.52156Z"/>
                                                                    <path d="M12.982 3.68044C12.982 4.06125 12.6726 4.37069 12.2918 4.37069C11.911 4.37069 11.6016 4.06125 11.6016 3.68044C11.6016 3.29963 11.911 2.99023 12.2918 2.99023C12.6726 2.99023 12.982 3.29823 12.982 3.68044Z"/>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        
                                                        <a href="https://www.youtube.com/">
                                                            <span class="">
                                                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M14.4105 0.0820312H3.591C1.89275 0.0820312 0.503906 1.47084 0.503906 3.16909V8.83366C0.503906 10.5319 1.89275 11.9207 3.591 11.9207H14.4105C16.1087 11.9207 17.4975 10.5319 17.4975 8.83366V3.16909C17.4975 1.47084 16.1087 0.0820312 14.4105 0.0820312ZM9.47816 7.67723L6.84188 9.30826V6.04617V2.78408L9.47816 4.41514L12.1144 6.04617L9.47816 7.67723Z"/>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        
                                                        <a href="https://twitter.com/">
                                                            <span class="">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.8092 15.98H11.1569L6.89801 9.78339L1.56807 15.98H0.19043L6.28619 8.89157L0.19043 0.0195312H4.84276L8.87486 5.88989L13.9234 0.0195312H15.301L9.48808 6.77751L15.8092 15.98ZM11.8079 14.9929H13.9234L4.18054 1.05696H2.06508L11.8079 14.9929Z"/>
                                                                </svg>                                                        
                                                            </span>
                                                        </a>
                                                        
                                                        <a href="https://www.pinterest.com/">
                                                            <span class="">
                                                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.21932 8.5049C4.21932 8.5049 3.5417 6.42445 4.33972 5.28762C5.13774 4.15079 5.81536 4.0052 6.68619 4.22361C7.55701 4.44201 7.77542 5.57882 7.58081 6.54625C7.38761 7.51367 6.8794 9.23153 6.8556 9.49753C6.8318 9.76354 6.7828 10.5378 7.53322 10.8528C8.28364 11.1678 9.49327 10.78 10.1219 9.49753C10.7505 8.2151 10.9927 6.49724 10.8961 5.84483C10.7995 5.19101 10.7029 3.57118 8.76664 2.84456C6.83039 2.11794 5.29595 2.83617 4.92074 3.06718C4.36073 3.41159 3.30089 4.1956 2.86688 5.23583C2.59668 5.88405 2.49729 6.63306 2.56449 7.18467C2.64009 7.80629 2.9607 8.45591 3.2267 8.73452C3.49271 9.01313 3.3961 9.30292 3.3597 9.52132C3.3233 9.73973 3.2421 10.3445 3.0335 10.57C2.82349 10.7954 2.37967 10.8247 2.20187 10.7365C2.02406 10.6483 1.18826 10.2116 0.695443 9.35893C0.18163 8.46711 -0.0367782 7.08387 0.325831 5.29462C0.688441 3.50398 2.18787 1.89954 3.78251 1.10292C5.36875 0.310501 7.28401 -0.0871181 9.07466 0.429495C10.8653 0.946109 12.4445 1.92612 13.3154 3.81337C14.1862 5.70062 13.8236 8.14369 13.412 9.28192C13.0004 10.4188 12.2583 11.718 10.8555 12.5076C9.45266 13.2986 8.22623 13.2818 7.82302 13.1852C7.41981 13.0886 6.48459 12.7988 6.06458 12.3298C6.06458 12.3298 5.46816 14.6525 5.22596 15.2811C4.98375 15.9097 4.56934 16.9387 4.20533 17.3251C3.84272 17.7115 3.67332 17.846 3.33451 17.797C2.9957 17.748 2.8025 17.4455 2.7423 16.5383C2.68209 15.6311 3.12869 13.0228 3.3065 12.264C3.4857 11.5052 4.13112 8.86051 4.21932 8.5049Z"/>
                                                                </svg>                                                   
                                                            </span>
                                                        </a>
                                                        
                                                        <a href="https://www.linkedin.com/">
                                                            <span class="">
                                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.10708 6.41797H1.4502V16.6369H5.10708V6.41797Z"/>
                                                                    <path d="M6.99243 6.41898H9.8149V7.83861C9.8149 7.83861 10.2489 6.40637 12.8586 6.40637C15.0118 6.40637 16.5533 7.24499 16.5533 9.54945C16.5533 10.8235 16.5533 16.6379 16.5533 16.6379H13.539C13.539 16.6379 13.5558 10.6765 13.5726 10.4931C13.5894 10.3097 13.406 8.80606 11.8701 8.80606C10.3343 8.80606 9.8499 9.90786 9.8499 10.7423C9.8499 11.5767 9.8499 16.6365 9.8499 16.6365H6.99523V6.41898H6.99243Z"/>
                                                                    <path d="M4.56523 4.4804C5.27928 3.76636 5.27928 2.60864 4.56523 1.8946C3.85119 1.18055 2.69347 1.18055 1.97943 1.8946C1.26538 2.60864 1.26538 3.76636 1.97943 4.4804C2.69347 5.19445 3.85119 5.19445 4.56523 4.4804Z"/>
                                                                </svg>                                                                                                           
                                                            </span>
                                                        </a>
                                                        
                                                    </div>
                                                    <!-- social-icons -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- d-flex flex-column -->
                            </div>
                            <!-- col-4 -->
                            <div class="col-xl-8 order-xl-0">
                                <?php
                                $ListPostsLastest = GetAllPostsLastest();
                                foreach($ListPostsLastest as $PostLastest) {
                                    ?>
                                    <div class="d-flex flex-column">
                                        <div class="card card-style-1 mb-lg-30 md-mb-20 mb-10  wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="card-image-wrapper">
                                            <a href="./post-detail.php?id=<?php echo $PostLastest['PostID']; ?>"> <img src="./public/images/<?php echo $PostLastest['Image']; ?>" data-src="./public/images/<?php echo $PostLastest['Image']; ?>" class="card-img-top" alt="beach"> </a>                              
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="card-header text-uppercase">
                                                    <a href="./category.php?id=<?php echo $PostLastest['CategoriesID']; ?>" class="fs-6 card-header-title">
                                                    <?php
                                                    $Category = GetNameCategoryByID($PostLastest['CategoriesID']);
                                                    echo $Category;
                                                    ?>
                                                    </a>
                                                </div>
                                                <h5 class="fs-1 card-title "><a href="./post-detail.php?id=<?php echo $PostLastest['PostID']; ?>" class="blog-title"><?php echo $PostLastest['Title']; ?></a></h5>
                
                                                <ul class="list-unstyled card-meta lead ">
                                                    <li>By <a href="author-1.html" class="blog-author fw-bold"><?php GetFullNameByUserID($PostLastest['UserID']); ?></a></li>
                                                    <li><?php echo $PostLastest['PostDate']; ?></li>
                                                </ul>
                
                                                <p class="card-text"><?php echo $PostLastest['Content']; ?>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            include("./layouts/footer.php");
            ?>
		</div>
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