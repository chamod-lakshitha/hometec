<?php
$pagename = "LogOut"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
include("detectlogin.php");
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
if (isset($_SESSION["login_details"])) {
    echo ("<p style = 'margin-left : 35px'>Thank you " . $_SESSION["login_details"]["fName"] . " " . $_SESSION["login_details"]["lName"] . "<p><br>");
}
echo ("<p style = 'margin-left : 35px'>you are now log out</p>");
session_destroy();
include("footfile.html"); //include head layout
echo "</body>";
