<link rel="stylesheet" href="mystylesheet.css">
<?php
include("headfile.html");
include("db.php");
$pagename = "A smart buy for a smart home";
echo "<h4>" . $pagename . "<h4>";
$prod_id = $_GET["u_prod_id"];
echo "<h3 style='margin-left:10px'>" . "Selected product id: " . $prod_id . "</h3>";
mysqli_select_db($conn, "home_tec");
$SQL = "select * from product where prodId = " . $prod_id;
$exeSQL = mysqli_query($conn, $SQL) or die("<p>error " . mysqli_error($conn) . "</p>");
echo ("<table style = 'border : 1px'>");
while ($arrayp = mysqli_fetch_assoc($exeSQL)) {
    echo ("<tr>");
    echo ("<td style = 'border : 0px'>><img src = 'images/" . $arrayp["prodPicNameSmall"] . "' alt = 'image' width = 400 height = 400/></td>");
    echo ("<td style = 'border : 0px'><h2>" . $arrayp["prodName"] . "</h2><p>" . $arrayp["prodDescripLong"] . "</p><br><p>$" . $arrayp["prodPrice"] . "</p><br><p>Left in Stock : " . $arrayp["prodQuantity"] . "</p>");
    echo ("<br><p>number of products to be purchased</p>");
    echo ("<form action = 'basket.php' method = 'post'>");
    echo ("<input type = 'hidden' name = 'id' value = '" . $prod_id . "'>");
    echo ("<select name = ' p_quantity'>");
    for ($i = 1; $i <= $arrayp["prodQuantity"]; $i++) {
        echo ("<option value = '" . $i . "'>"  . $i . "</option>");
    }
    echo ("</select>");
    echo ("&nbsp;&nbsp;");
    echo ("<input type = 'submit' name = 'submit' value = 'Submit'/>");
    echo ("</tr>");
}
echo ("</table>");
include("footfile.html");
