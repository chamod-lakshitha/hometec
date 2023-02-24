<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$db = "home_tec";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
} else {
    mysqli_select_db($conn, $db);
}
