<?php
include("db.php");
mysqli_select_db($conn, "home_tec");
$pagename = "Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
include("detectlogin.php");
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
if (isset($_POST["del_item"])) {
    unset($_SESSION["basket"][$_POST["del_item"]]);
    //unset($_SESSION['basket'][$_POST["del_item"]]);
    echo ("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" . "1 item deleted from the basket" . "</b><br><br>");
}
if (isset($_POST["id"])) {
    $newprodid = $_POST["id"];
    $reququantity = $_POST["p_quantity"];
    $_SESSION["basket"][$newprodid] = $reququantity;
    echo ("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" . "1 item added" . "</b><br>");
} else {
    echo ("<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Basket unchanged</b></p>");
}
if (isset($_SESSION["basket"])) {
    $total = 0;
    echo ("<br><table style = 'margin-left : 38px'><tr><th>Product name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>");
    foreach ($_SESSION["basket"] as $index => $value) {
        $SQL = "SELECT * FROM product WHERE prodId = '" . $index . "'";
        $exeSQL = mysqli_query($conn, $SQL) or die("error " . mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);
        echo ("<tr>");
        echo ("<td>" . $arrayp[1] . "</td>");
        echo ("<td>" . $arrayp[6] . "</td>");
        echo ("<td>" . $value . "</td>");
        echo ("<td>$" . $arrayp[6] * $arrayp[7] . "</td>");
        echo ("<td><form action = \"basket.php\" method = 'post'><input type = 'submit' value = 'Remove' /><input type = 'hidden' name = 'del_item' value = '" . $index . "' /></form></td>");
        echo ("</tr>");
        $total = $total + $arrayp[6] * $arrayp[7];
    }
    echo ("<tr><td colspan = '3'>" . "TOTAL</td><td>" . $total . "</td></tr>");
    echo ("</table>");
} else {
    echo ("<br><p style = 'margin-left : 39px'>Smart basket is empty</p>");
}
echo ("<br><a href = 'clearbasket.php' style = 'margin-left : 39px' >CLEAR BASKET</a>");
if (isset($_SESSION["login_details"]["id"])) {
    if (count($_SESSION["basket"]) > 0) {
        echo ("<p style = 'margin-left : 39px'><br>To finalize your order : <a href = '#'>Checkout</a></p>");
    }
} else {
    echo ("<p style = 'margin-left : 39px'><br>New hometeq customers : <a href = 'signup.php'>Sign Up</a></p>");
    echo ("<p style = 'margin-left : 39px'><br>Returning hometeq customers : <a href = 'login.php'>Log In</a></p>");
}
include("footfile.html"); //include foot layout
echo "</body>";
