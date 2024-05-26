<?php
$serverName = 'localhost';
$user = 'root';
$password = '';
$dbName = 'exploreist';

$conn = mysqli_connect($serverName, $user, $password, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>