<?php
include("db.php");
$pagename = "login_process"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
$email = $_POST["email"];
$password = $_POST["password"];
if (empty($email) | empty($password)) {
    echo ("<p style = 'margin-left : 35px'><b>Login failed</b><br><br>Login form incomplete<br><br>Make sure you provide all the details" . "<br><br>Go back to&nbsp;<a href = 'login.php'>Login</a></p>");
} else {
    $SQL = "SELECT * FROM users WHERE userEmail = '" . $email . "'";
    $exe_SQL = mysqli_query($conn, $SQL);
    if (mysqli_num_rows($exe_SQL) > 0) {
        $user_details_arr = mysqli_fetch_array($exe_SQL);
        if ($password != $user_details_arr['userPassword']) {
            echo ("<p style = 'margin-left : 35px'><b>Login failed</b><br><br>Password not valid" . "<br><br>Go back to&nbsp;<a href = 'login.php'>Login</a></p>");
        } else {
            $_SESSION["login_details"]["id"] = $user_details_arr["userId"];
            $_SESSION["login_details"]["fName"] = $user_details_arr["userFName"];
            $_SESSION["login_details"]["lName"] = $user_details_arr["userSName"];
            echo ("<p style = 'margin-left : 35px'><b>Login success</b><br><br>Welcome: " . $_SESSION["login_details"]["fName"] . " " . $_SESSION["login_details"]["lName"]  . "<br><br>Usertype: " . "Home_tec customer" . "<br><br>Continue shopping with&nbsp;<a href = 'index.php'>Home_tec</a><br>View your &nbsp;<a href = 'basket.php'>Smart basket</a></p>");
        }
    } else {
        echo ("<p style = 'margin-left : 35px'><b>Login failed</b><br><br>Email not recognized" . "<br><br>Go back to&nbsp;<a href = 'login.php'>Login</a></p>");
    }
}
include("footfile.html"); //include head layout
echo "</body>";
