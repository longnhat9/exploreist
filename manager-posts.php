<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/auth.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid var(--blue);
            text-align: left;
            padding: 8px;
        }

        .category {
            width: 100%;
        }

        .search {
            display: flex;
        }

        .form-search .form-input {
            display: flex;
            align-items: center;
            height: 36px;
        }

        .form-search .form-input input {
            flex-grow: 1;
            padding: 0 16px;
            height: 100%;
            border: none;
            background: var(--grey);
            border-radius: 36px 0 0 36px;
            outline: none;
            width: 100%;
            color: var(--dark);
        }

        .form-search .form-input button {
            width: 36px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--blue);
            color: var(--light);
            font-size: 18px;
            border: none;
            outline: none;
            border-radius: 0 36px 36px 0;
            cursor: pointer;
        }

        td {
            width: 1000px;
        }

        .head {
            display: flex;
            justify-content: space-between;
        }

        .update-link {
            display: inline-block;
            background-color: var(--blue);
            padding: 10px 10px;
            border-radius: 10px;
            color: var(--light);
        }

        .deleteBtn {
            background-color: var(--red);
            border-radius: 10px;
            color: var(--light);
            padding: 10px 10px;
            border-color: transparent;
        }

        .update-link:hover,
        .deleteBtn:hover {
            background-color: #2571bd;
        }
    </style>
</head>

<body>
    <div class="app">
        <?php
        require('./layouts/header.php');
        if (!(isset($_SESSION['user']) && $_SESSION['user'])) {
            echo "<script>alert('You are not logged into the system')</script>";
            header("refresh: 0.05; url=./login.php");
        }
        ?>
        <div class="category" style="margin-top: 120px;">
            <!-- CONTENT -->
            <section id="content">
                <!-- MAIN -->
                <main>
                    <div class="head-title">
                        <div class="left">
                            <h1>News list</h1>
                            <ul class="breadcrumb">
                                <li>
                                    <a class="active" href="./index.php">Overview</a>
                                </li>
                                <li><i class='bx bx-chevron-right'></i></li>
                                <li>
                                    <a class="active">News list</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    $rs = null;
                    $message = "";
                    $err = true;

                    $limit = 2;
                    $page = 1;

                    if (isset($_REQUEST['p']) && (int)$_REQUEST['p'] >= 1) {
                        $page = (int) $_REQUEST['p'];
                    }

                    // function getAllByname() {
                    //     $dataSearch = $_GET['searchNews'];
                    //     global $conn;
                    //     $sqlSelect = "SELECT * FROM news WHERE content LIKE '%$dataSearch%'";
                    //     $rs = mysqli_query($conn, $sqlSelect);
                    //     $numRows = mysqli_num_rows($rs);
                    //     return $numRows;
                    // }

                    if (GetAllPostsByUserID($_SESSION['userid']) == null) {
                    ?>
                        <div class="empty">
                            <p class="content-empty">No information available</p>
                            <button class="btn btn-add">
                                <a href="./create-post.php" class="btn-add-link">Thêm bài viết</a>
                            </button>
                        </div>
                        <?php
                        return;
                    }

                    $numRows = mysqli_num_rows(GetAllPostsByUserID($_SESSION['userid']));
                    $offset = ($page - 1) * $limit;
                    $totalPage = ceil($numRows / $limit) ?? 0;

                    if (isset($_GET['search'])) {
                        $rs = SearchPostsByParam($_GET['search']);
                    } else {
                        $sqlSelect = "SELECT * FROM post LIMIT $offset, $limit";
                        $rs = mysqli_query($conn, $sqlSelect);
                        $numRows = mysqli_num_rows($rs);
                        if ($numRows == 0) {
                        ?>
                            <div class="empty">
                                <p class="content-empty">Không có tin tức nào</p>
                                <button class="btn btn-add">
                                    <a href="./add-post.php" class="btn-add-link">Thêm bài viết</a>
                                </button>
                            </div>
                    <?php
                            return;
                        }
                    }


                    if (isset($_GET['action']) && !empty($_GET['id'])) {
                        if ($_GET['action'] == 'delete') {
                            $id = $_GET['id'];

                            $sqlDelete = "DELETE FROM post WHERE PostID = '$id'";
                            $rs = mysqli_query($conn, $sqlDelete);

                            if ($rs) {
                                $message = "Xóa bài viết thành công";
                                $err = false;
                            } else {
                                $message = "Xóa bài viết thất bại" . mysqli_error($conn);
                            }
                        }
                    }

                    ?>
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
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <div class="btn btn-add">
                                    <a href="./create-post.php" class="btn-link">
                                        <span><i class='bx bx-plus'></i></span>
                                        Thêm bài viết
                                    </a>
                                </div>
                                <div class="search">
                                    <form action="" class="form-search">
                                        <div class="form-input">
                                            <input name="search" type="search" placeholder="Tìm kiếm ...">
                                            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                                        </div>
                                    </form>
                                    <div class="reload">
                                        <a href="./manager-posts.php" class="reload-link">
                                            <i class='bx bx-refresh'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Post date</th>
                                        <th>User</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($post = mysqli_fetch_assoc($rs)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $post['PostID']; ?></td>
                                            <td><?php echo $post['Title']; ?></td>
                                            <td>
                                                <textarea>
                                                    <?php echo $post['Content']; ?>
                                                </textarea>
                                            </td>
                                            <td>
                                                <img style="width: 200px;" src="./public/images/<?php echo $post['Image']; ?>" alt="<?php echo $post['Image']; ?>">
                                            </td>
                                            <td>
                                                <?php
                                                echo $post['PostDate'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo GetNameCategoryByID($post['CategoriesID']);
                                                ?>
                                            </td>
                                            <td>
                                                <a href="./update-post.php?id=<?php echo $post['PostID']; ?>" class="update-link">
                                                    <i class='bx bx-edit-alt'></i>
                                                    Update
                                                </a>
                                                <button type="button" class="deleteBtn" id="deleteBtn" onclick="confirmDelete(<?php echo $post['PostID']; ?>)">
                                                    <i class='bx bx-trash-alt'></i>
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php

                    ?>

                </main>
                <!-- MAIN -->
            </section>
            <!-- CONTENT -->
        </div>

        <?php
        ?>
    </div>
    <script>
        const deleteBtnElement = document.getElementById('deleteBtn');

        function confirmDelete(id) {
            if (confirm("Do you want to delete this post??")) {
                window.location.href = `./manager-posts.php?action=delete&id=${id}`;
            }
        }
    </script>
</body>

</html>