<?php
$pagename = "Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
//display random text
echo ("<form action = 'login_process.php' method = 'post'>");
echo ("<table style = 'border : 0; margin : auto; background-color : white;'>");
echo ("<tr>");
echo ("<td style = 'border : 0;'>Email</td>");
echo ("<td style = 'border : 0;'><input type = 'text' name = 'email' /></td>");
echo ("</tr>");
echo ("<tr>");
echo ("<td style = 'border : 0;'>password</td>");
echo ("<td style = 'border : 0;'><input type = 'password' name = 'password' /></td>");
echo ("</tr>");
echo ("<tr>");
echo ("<td style = 'border : 0;'><button type = 'reset'>Clear form</button></td>");
echo ("<td style = 'border : 0;'><button type = 'submit'>Login</button></td>");
echo ("</tr>");
echo ("</table>");
echo ("</form>");
include("footfile.html"); //include head layout
echo "</body>";
