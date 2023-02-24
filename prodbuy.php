<link rel="stylesheet" href="mystylesheet.css">
<?php
include("headfile.html");
include("db.php");
$pagename = "A smart buy for a smart home";
echo "<h4>" . $pagename . "<h4>";
$prodId = $_GET["u_prod_id"];
echo "<h3 style='margin-left:10px'>" . "Selected product id: " . $prodId . "</h3>";
$SQL = "SELECT * FROM Product WHERE prodId = " . $prodId;
$exeSQL = mysqli_query($conn, $SQL) or die("error occured" . mysqli_error($conn));
$assocResultArray = mysqli_fetch_assoc($exeSQL);
echo "<table style='border: 0px'>";
echo "<tr>";
echo "<td style='border: 0px'><img height = 400 width = 400 src = 'images/" . $assocResultArray["prodPicNameLarge"] . "' alt = 'image'></td>";
echo "<td style = 'border : 0px'><p style = 'color : blue'>" . $assocResultArray["prodName"] .
    "</p><br><p>" . $assocResultArray["prodDescripLong"] . "</p><br><p>$" . $assocResultArray["prodPrice"] .
    "</p><br><p>Left in stock -> " . $assocResultArray["prodQuantity"] . "</p></td>";
echo "</tr>";
echo "</table>";
echo "<div>Number to be purchased: ";
echo "<form action=basket.php method=post>";
echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
echo "<input type=hidden name=h_prodid value=" . $prodId . ">";
echo "</form>";
echo "</div>";
include("footfile.html");
