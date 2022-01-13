<?php
session_start();
$author         = "Samuel Wilde";
$dateWritten    = "05/04/2020";
$description    = "View Items in Accessories Table";
$stylesheet     = "nguvu";
$title          = ucfirst($stylesheet) . ": $description"; 
$dbName         ="Nguvu";
print_r($_SESSION);
if (!isset($_SESSION['username']))
{
    require("htmlHeadNoSEO.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.php'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
}// end !ISSET SESSION
require ("connecti2db.inc.php");//sets $connection
require("htmlHeadNoSEO.inc");
echo "<h1>$title</h1>\n";
$query="SELECT itemID,itemName,itemDescription,itemPrice,itemImage
FROM jewelry
ORDER BY itemID";
$result = mysqli_query($connection,$query) or
die("<b>Query Failed.</b><br /><br />" . mysqli_error($connection));

//build a table from the SQLinquiry
echo"<table class = collapse>\n";
echo"<tr>\n\t<th>Item ID</th>\n\t<th>Item Name</th>\n\t<th>Item Description</th>\n\t<th>Item Price</th>\n\t<th>Item Image</th>\n";
$numRecords = mysqli_num_rows($result);
while ($row = mysqli_fetch_row($result)){
    $itemID=stripslashes($row[0]);
    $itemName=stripslashes($row[1]);
    $itemDescription=stripslashes($row[2]);
    $itemPrice=stripslashes($row[3]);
    $itemImage=stripslashes($row[4]);
    echo "<tr>\n";
    echo "<td>$itemID</td>\n";
    echo "<td>$itemName</td>\n";
    echo "<td>$itemDescription</td>\n";
    echo "<td>$itemPrice</td>\n";
    echo "<td><img src=\"$itemImage\"height = \"100\" class=\"table\" alt=\"Image of meal\"></td>\n";
}
echo "</table>\n";
echo"<aside>\n\t<p>($numRecords) records retrieved.<p>\n";
echo"\t<p><a href=maintenance.php>Go back to main menu</a></p>\n";
echo "</aside>\n";
require("htmlFoot.inc");
mysqli_close($connection);

?>