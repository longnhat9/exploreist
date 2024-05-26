<!doctype html>
<html lang="en">

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

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['InputName']) || isset($_POST['lastName']) || isset($_POST['InputEmail']) || isset($_POST['subject']) || isset($_POST['message'])){
                    $firstName = $_POST['InputName'];
                    $lastName = $_POST['lastName'];
                    $Email = $_POST['InputEmail'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];

                    $sql = "INSERT INTO contact VALUES ('$firstName', '$lastName', '$Email', '$subject', '$message')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>window.location.href = './contact.php'</script>";
                    }
                }
            }
            ?>
            <!-- start to top button -->
            <div class="scroll_to_top to_top-2" >
                <i class="fa-regular fa-angle-up"></i>
            </div>
            <!-- eND to top button -->

             <!-- proloder -->
             <div class="loader_main">
                <div class="loader_area">
                    <div class="loader"></div>
                </div>
            </div>
            <!-- proloder -->

            <!-- dark-light-Buttons -->
            <div class="dark-light-theme-btn" id="toggleBtn">
                <span class="light-icon"><i class="fa-light fa-sun-bright"></i></span>
                <span class="dark-icon"><i class="fa-solid fa-moon"></i></span>
            </div>
            <!-- dark-light-buttons -->
            
            <div class="main"  data-bs-spy="scroll" data-bs-target="#navContentmenu" data-bs-root-margin="0px 0px -50%" data-bs-smooth-scroll="true">
                <!--breadcrumb Section ======================-->
                <div class="section-breadcrumb pb-30">
                    <div class="container">
                        <nav aria-label="breadcrumb-nav">
                            <ol class="breadcrumb breadcrumb-style-2 mt-20 mb-0 ">
                                <li class="breadcrumb-item breadcrumb-item-style-2"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item breadcrumb-item-style-2 active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- breadcrumb-wrapper -->			
                </div>
                <!--breadcrumb Section ======================-->

                <!--Blog Section ======================-->
                <section class="section-blog pb-30 pb-md-60 pb-lg-90">
                    <div class="container">
                        <div class="row justify-content-between">
                           
                            <div class="col-xl-8  col-lg-8">
                                <div class="contact-page-content">
                                    <h5 class="mb-20 fix-width-post-content title-style-2">Let's Talk</h5>
                                    <p class="mb-30 fix-width-post-content">I'm always excited to connect with fellow travel enthusiasts, readers, and potential collaborators. Whether you have questions about a destination, want travel tips, or simply wish to share your own adventures, I'd love to hear from you.</p>

                                    <p class="mb-60 fix-width-post-content">Drop me a message below, and let's embark on a conversation filled with wanderlust and travel tales!</p>


                                    <div class="contact-from-area fix-width-post-content">
                                        <h5 class="mb-20 title-style-2">Get in Touch</h5>
                                        <form id="contactForm" class="contact-from" method="POST">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name 
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1V9M8 2L2 8M9 5H1M8 8L2 2" stroke="#4C9BB3" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </label>
                                                        <input type="text" name="InputName" class="form-control" id="firstname" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name 
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1V9M8 2L2 8M9 5H1M8 8L2 2" stroke="#4C9BB3" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </label>
                                                        <input type="text" name="lastName" class="form-control" id="lastname" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email 
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1V9M8 2L2 8M9 5H1M8 8L2 2" stroke="#4C9BB3" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                                <input type="email" name="InputEmail" class="form-control" id="email" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject"  class="form-control" id="subject" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Your Message</label>
                                                <textarea name="message" class="form-control" rows="3" id="message" required></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-lg-0 mb-20 mt-lg-40 mt-10">Submit Form</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 ">
                                <!-- author-card -->
                                <div class="sticky-elements">

                                    <div class="author-card author-card-sidebar-style-2  flex-column mb-30">
                                        
                                        <div class="author-image m-auto">
                                            <img src="./public/images/images-loader.gif" data-src="./public/images/about-image-1.png" alt="author-image">
                                        </div>
                                        <h4 class="author-name">Mike Aiden</h4>
                                        <div class="author-content">
                                            <p class="text-center mb-10 ">I'm a intrepid travel blogger, weaves tales of exploration and discovery. Let's traverse the globe together and share in the beauty of our world.</p>
                                        </div>
                                        <div class="author-socials-area">
                                            <h5 class="title mb-20">Follow me</h5>
                                            <div class="author-socials">
                                                <a href="https://www.facebook.com/" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://www.instagram.com/" class="instagram"><i class="fab fa-instagram"></i></a>
                                                <a href="https://www.linkedin.com/" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a href="https://www.youtube.com/" class="youtube"><i class="fa-brands fa-youtube"></i></a>
                                            </div>
                                        </div>

                                        <div class="author-information-area">
                                            <h5 class="title mb-30">Information</h5>
                                            <div class="single-info"><span class="information-icon"><img src="./public/images/images-loader.gif" data-src="./public/images/phone.png" alt="phone"></span>
                                                <a href="tel:+14842989691">+14842989691</a>
                                            </div>
                                            <div  class="single-info">
                                                <span class="information-icon"><img src="./public/images/images-loader.gif" data-src="./public/images/mail.png" alt="phone"></span>
                                                <a href="mailto:contact@exploreist.com">contact@exploreist.com</a>
                                            </div>
                                            <div  class="single-info">
                                                <span class="information-icon"><img src="./public/images/images-loader.gif" data-src="./public/images/location.png" alt="phone"></span>
                                                <address class="text-start">132, My Street, Kingston,New York 12401.</address>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- author-card -->
                            </div> 
                        </div>
                    </div>
                    <!-- container -->
                </section>
                <!--Blog Section ======================-->

                <!--CTA Section ======================-->
               <section class="section-cta" data-bs-theme="light">
                    <div class="container">
                        <div class="cta-area pt-lg-60 pb-lg-90 pt-30 pb-30">
                            <div class="col-xl-6">
                                <div class="cta-content pl-lg-100">
                                    <p class="fs-6 text-white mb-10">Keep in Touch</p>
                                    <h3 class=" fs-3 text-white  mb-30 ">Explore the world</h3>
                                    <form>
                                        <div class="form-group d-flex gap-30">
                                            <input type="email" class="form-control" name="email" placeholder="Your email address" required>          
                                            <button type="submit" class="btn">Subscribe</button>
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
            <?php
            include("./layouts/footer.php");
            ?>
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