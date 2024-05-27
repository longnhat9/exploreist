<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .section-header {
            background: #4c9bb3;
        }
    </style>
</head>

<body>
    <div class="app">
        <?php
        require('./layouts/header.php');
        if (isset($_SESSION['user']) && $_SESSION['user']) {
            echo ("<script>window.location.href='./index.php';</script>");
        }

        $message = "";
        $err = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) || isset($_POST['password'])) {
                $Account['UserName'] = $_POST['username'];
                $Account['Password'] = md5($_POST['password']);
                
                if (CheckAccountExist($Account)) {
                    $Account['UserID'] = mysqli_fetch_assoc(CheckAccountExist($Account))['UserID'];
                    $message = "Login successfully";
                    $_SESSION['user'] = $Account['UserName'];
                    $_SESSION['userid'] = $Account['UserID'];

                    echo ("<script>window.location.href='./index.php';</script>");
                } else {
                    $message = "Login fail";
                    $err = true;
                }
            }
        }
        ?>
        <div class="container-auth">
            <div class="forms">
                <div class="form auth">
                    <span class="title">Login</span>
                    <form action="" method="POST">
                        <div class="input-field">
                            <input type="text" name="username" placeholder="Enter username" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" class="password" placeholder="Enter password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="message">
                            <?php
                            if ($message != "" && $err == false) {
                                ?>
                                <p class="messageSuccess"><?php echo $message; ?></p>
                                <?php
                            } elseif ($message != "" && $err == true) {
                                ?>
                                <p class="messageError"><?php echo $message; ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="Login">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Do not have an account?
                            <a href="./register.php" class="text signup-link">Register</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require('./layouts/footer.php');
        ?>
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
    </div>
</body>