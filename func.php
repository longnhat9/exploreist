<?php
function GetAllCategories() {
    global $conn;
    $sql = "SELECT * FROM categories";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetCategoryById($CategoriesID) {
    global $conn;
    $sql = "SELECT * FROM categories WHERE CategoriesID = '$CategoriesID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetNameCategoryByID($CategoriesID) {
    global $conn;
    $sql = "SELECT Name FROM categories WHERE CategoriesID = '$CategoriesID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return mysqli_fetch_assoc($rs)['Name'];
    }
    return null;
}

function GetAllPosts() {
    global $conn;
    $sql = "SELECT * FROM post";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetAllPostsLastest() {
    global $conn;
    $sql = "SELECT * FROM post ORDER BY PostDate DESC";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetAllPostsByCategoryID($CategoriesID) {
    global $conn;
    $sql = "SELECT * FROM post WHERE CategoriesID = '$CategoriesID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetAllPostsByUserID($UserID) {
    global $conn;
    $sql = "SELECT * FROM post WHERE UserID = '$UserID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetPostById($PostID) {
    global $conn;
    $sql = "SELECT * FROM post WHERE PostID = '$PostID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetNameByUseID($UserID) {
    global $conn;
    $sql = "SELECT UserID, FullName FROM users WHERE UserID = '$UserID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function GetFullNameByUserID($UserID) {
    global $conn;
    $sql = "SELECT FullName FROM users WHERE UserID = '$UserID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return mysqli_fetch_assoc($rs)['FullName'];
    }
    return null;
}

function GetUserByID($UserID) {
    global $conn;
    $sql = "SELECT * FROM users WHERE UserID = '$UserID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function CheckAccountExist($Account) {
    global $conn;
    $sql = "SELECT * FROM users WHERE UserName = '{$Account["UserName"]}' AND Password = '{$Account["Password"]}'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function CreateAccount($Account) {
    global $conn;
    $sql = "INSERT INTO users (UserName, DOB, Email, FullName, Password) VALUES ('{$Account["UserName"]}', '{$Account["DOB"]}', '{$Account["Email"]}', '{$Account["FullName"]}', '{$Account["Password"]}')";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        return $rs;
    }
    return null;
}

function CreatePost($Post) {
    global $conn;
    $sql = "INSERT INTO post (Title, Content, PostDate, UserID, CategoriesID, Image) VALUES ('{$Post["Title"]}', '{$Post["Content"]}', '{$Post["PostDate"]}', '{$Post["UserID"]}', '{$Post["CategoriesID"]}', '{$Post["Image"]}')";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        return $rs;
    }
    return null;
}

function UpdatePost($Post) {
    global $conn;
    $sql = "UPDATE post SET Title = '{$Post['Title']}', Content = '{$Post['Content']}', PostDate = '{$Post["PostDate"]}', UserID = '{$Post["UserID"]}', CategoriesID = '{$Post["CategoriesID"]}', Image = '{$Post["Image"]}' WHERE PostID = '{$Post["PostID"]}'";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        return $rs;
    }
    return null;
}

function AddComment($Comment) {
    global $conn;
    $sql = "INSERT INTO comment (Content, CommentDate, UserID, PostID) VALUES ('{$Comment["Content"]}', '{$Comment["CommentDate"]}', '{$Comment["UserID"]}', '{$Comment["PostID"]}')";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        return $rs;
    }
    return null;
}

function SearchPostsByParam($data) {
    global $conn;
    $sql = "SELECT * FROM post WHERE Title LIKE '%$data%' OR PostDate LIKE '%$data%'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return $rs;
    }
    return null;
}

function CountPostInCategory($CategoryID) {
    global $conn;
    $sql = "SELECT * FROM post WHERE CategoriesID = '$CategoryID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return mysqli_num_rows($rs);
    }
    return 0;
}

function GetNameOfUserInPost($UserID) {
    global $conn;
    $sql = "SELECT FullName FROM users WHERE UserID = '$UserID'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        return mysqli_fetch_assoc($rs);
    }
    return null;
}
?>