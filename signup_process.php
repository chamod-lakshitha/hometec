<?php
session_start();
include("db.php");
$pagename = "signup process results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
$fName = $_POST["r_firstname"];
$lName = $_POST["r_lastname"];
$address = $_POST["r_address"];
$code = $_POST["r_postcode"];
$telno = $_POST["r_telno"];
$email = $_POST["r_email"];
$password = $_POST["r_password1"];
if (empty($fName) | empty($lName) | empty($address) | empty($code) | empty($telno) | empty($email) | empty($password)) {
    echo ("<p style = 'margin-left : 35px'><b>Your sign-up failed</b><br><br>All mandatory fields need to be filled in " . "<br><br>Go back to&nbsp;<a href = 'signup.php'>Sign-Up</a></p>");
} else if ($password != $_POST["r_password2"]) {
    echo ("<p style = 'margin-left : 35px'><b>Your sign-up failed</b><br><br>The two passwords are not matching " . "<br><br>Go back to&nbsp;<a href = 'signup.php'>Sign-Up</a></p>");
} else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/", $email)) {
    echo ("<p style = 'margin-left : 35px'><b>Your sign-up failed</b><br><br>Please enter your email correctly " . "<br><br>Go back to&nbsp;<a href = 'signup.php'>Sign-Up</a></p>");
} else {
    $SQL = "INSERT INTO users(userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('$fName', '$lName', '$address', '$code', '$telno', '$email', '$password')";
    $query_results = mysqli_query($conn, $SQL);
    if (!$query_results) {
        if (mysqli_errno($conn) == 1062) {
            echo ("<p style = 'margin-left : 35px'><b>Your sign-up failed</b><br><br>Email is already registered " . "<br><br>Go back to&nbsp;<a href = 'signup.php'>Sign-Up</a></p>");
        }
    } else {
        echo ("<p style = 'margin-left : 35px'>Sign-Up completed " . "<br><br>Go to&nbsp;<a href = 'signup.php'>Login</a></p>");
    }
}
include("footfile.html"); //include head layout
echo "</body>";
