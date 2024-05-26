<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/auth.css">
    <link rel="stylesheet" href="./public/css/layouts/header.css">
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
            header("refresh: 0.1; url=./index.php");
        }
        $message = "";
        $err = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['UserName']) || isset($_POST['Password']) || isset($_POST['RePassword']) || isset($_POST['FullName']) || isset($_POST['Email']) || isset($_POST['DOB'])) {
                $Account['UserName'] = $_POST['UserName'];
                $Account['Password'] = $_POST['Password'];
                $Account['FullName'] = $_POST['FullName'];
                $Account['Email'] = $_POST['Email'];
                $Account['DOB'] = $_POST['DOB'];
                
                if ($Account['Password'] !== $_POST['RePassword']) {
                    $message = "Password must have match RePassword";
                    $err = true;
                } else {
                    $Account['Password'] = md5($Account['Password']);
                    if (CheckAccountExist($Account)) {
                        $message = "Account already exists on the system";
                        $err = true;
                    } else {
                        if (CreateAccount($Account)) {
                            $message = "Create account successfully";
                            $err = false;
                            echo ("<script>window.location.href='./login.php';</script>");
                        } else {
                            $message = "Create account fail: ".mysqli_error($conn);
                            $err = true;
                        }
                    }
                }
            }
        }
        ?>
        <div class="container-auth">
            <div class="forms">
                <div class="form auth">
                    <span class="title">Register</span>
                    <form action="" method="POST">
                        <div class="input-field">
                            <input type="text" name="UserName" placeholder="Enter username" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="datetime" name="DOB" placeholder="Input DOB" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" name="Email" placeholder="Enter email" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="FullName" placeholder="Enter fullname" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="Password" class="password" placeholder="Enter password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="RePassword" class="password" placeholder="Re enter password" required>
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
                            <input type="submit" value="Register">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Do you already have an account?
                            <a href="./login.php" class="text signup-link">Login</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php require('./layouts/footer.php'); ?>
    </div>
</body>