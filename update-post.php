<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/base.css">
    <style>
        .form-add {
            border-radius: 20px;
            background: var(--light);
            padding: 24px;
            overflow-x: auto;
            width: 100%;

        }

        .form-group {
            margin-bottom: 20px;
        }

        .title {
            margin-bottom: 5px;
        }

        .form__input {
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
            outline: none;
            width: 100%;
        }

        .form__input:focus {
            border-color: var(--blue);
        }

        .form__action {
            display: flex;
            justify-content: center;
        }

        .btn-submit {
            background-color: var(--blue);
            color: var(--light);
            padding: 10px;
            margin-right: 20px;
        }

        .selectStatus {
            padding: 10px;
            width: 140px;
            height: 35px;
            padding: 4px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            outline: none;
            display: inline-block;
            cursor: pointer;
        }

        .optionStatus {
            font-size: 16px;
        }

        .btnReload {
            background-color: var(--light);
            color: var(--blue);
            border: 1px solid var(--blue);
            padding: 10px;
            border-radius: 15px;
        }

        .btnReload:hover {
            background-color: #e7e7eb;
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="app">
        <?php
        require('./layouts/header.php');
        ?>
        <div class="category">
            <!-- CONTENT -->
            <section id="content">
                <!-- MAIN -->
                <main>
                    <div class="head-title">
                        <div class="left">
                            <h1>Update post</h1>
                            <ul class="breadcrumb">
                                <li>
                                    <a class="active" href="./index.php">Overview</a>
                                </li>
                                <li><i class='bx bx-chevron-right'></i></li>
                                <li>
                                    <a class="active" href="./manager-posts.php">Danh sách tin tức</a>
                                </li>
                                <li><i class='bx bx-chevron-right'></i></li>
                                <li>
                                    <a class="active">Update post</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if (!isset($_GET['id'])) {
                    ?>
                        <h3>Không có tham số id của bài viết</h3>
                    <?php
                        return;
                    }
                    $id = $_GET['id'];
                    $err = true;
                    $message = "";

                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        if (isset($_POST['Title']) || isset($_POST['Content']) || isset($_POST['PostDate']) || isset($_POST['CategoriesID']) || isset($_SESSION['userid'])) {
                            $post['PostID'] = $_GET['id'];
                            $post['Title'] = $_POST['Title'];
                            $post['Content'] = $_POST['Content'];
                            $post['PostDate'] = $_POST['PostDate'];
                            $post['UserID'] = $_SESSION['userid'];
                            $post['CategoriesID'] = $_POST['CategoriesID'];

                            $uploadDir = './public/images/';
                            $image = "";
                            if (!empty($_FILES['Image']['name'])) {
                                $file = $_FILES['Image'];
                                $newname =  $file['name'];
                                $uploadPath = $uploadDir . $newname;

                                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                                    $image = $newname;
                                }
                            } else {
                                $image = $_POST['old_image'];
                            }
                            
                            $post['Image'] = $image;
    
                            if (UpdatePost($post)) {
                                $message = "Update post successfully";
                                $err = false;
                            } else {
                                $message = "Update post fail" . mysqli_error($conn);
                            }
                        }
                    }

                    $rsPost = GetPostById($id);
                    if (!$rsPost) {
                    ?>
                        <h3>No data found for this post</h3>
                    <?php
                        return;
                    }
                    $post = mysqli_fetch_assoc($rsPost);

                    $sqlSelectCategories = "SELECT * FROM categories";
                    $rsSelectCategories = mysqli_query($conn, $sqlSelectCategories);

                    ?>
                    <div class="add-news">
                        <div class="showMessage">
                            <?php
                            if ($err == false && $message != "") {
                            ?>
                                <div class="messageSuccess">
                                    <?php
                                    echo $message;
                                    echo "<script>window.location.href = './manager-posts.php'</script>";
                                    ?>
                                </div>
                            <?php
                            } else if ($err == true && $message != "") {
                            ?>
                                <div class="messageError">
                                    <?php
                                    echo $message;
                                    echo "<script>window.location.href = './manager-posts.php'</script>";
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <form action="" class="form-add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $post['PostID']; ?>">
                            <div class="form-group">
                                <p class="title">Title</p>
                                <input name="Title" type="text" value="<?php echo $post['Title']; ?>" placeholder="Title" class="form__input" required>
                            </div>
                            <div class="form-group">
                                <p class="title">Image</p>
                                <img src="./public/images/<?php echo $post['Image']; ?>" style="width: 200px" alt="Image" class="form__input">
                                <input value="<?php echo $post['Image'] ?>" class="form__input" type="hidden" name="old_image" id="old_image">
                                <input value="<?php echo $post['Image'] ?>" class="form__input" type="file" name="Image" id="image">
                            </div>
                            <div class="form-group">
                                <p class="title">Content</p>
                                <textarea name="Content" id="content" cols="30" rows="10" class="form__input" required><?php echo $post['Content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <p class="title">Post date</p>
                                <input name="PostDate" type="datetime-local" value="<?php echo $post['PostDate'] ?>" placeholder="Post date" class="form__input" required>
                            </div>
                            <div class="form-group">
                                <p class="title">Category</p>
                                <div class="form-input">
                                <select name="CategoriesID" id="CategoriesID" style="width: 100px;padding: 5px 10px;border-radius: 10px;">
                                        <?php
                                        while ($category = mysqli_fetch_array($rsSelectCategories)) {
                                        ?>
                                            <option style="width: 100px" value="<?php echo $category['CategoriesID'] ?>" <?php if ($post['CategoriesID'] == $category['CategoriesID']) echo 'selected'; ?>><?php echo $category['Name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form__action">
                                <button type="submit" class="btn">
                                    <i class='bx bx-save'></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </section>
        </div>
    </div>
</body>

</html>