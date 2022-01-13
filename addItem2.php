<?php
session_start();
if (!isset($_SESSION['username']))
    {
    require("htmlHead.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='maintenanceLogin.html'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
    }// end !ISSET SESSION
$author      = "Jeff O'Connor";
$dateWritten = "05/07/2020";
$description = "Add Inventory";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu";   // use YOUR alexamara database
require ("connecti2db.inc.php"); // sets $connection
require ("htmlHead.inc");

echo "<h1>$title</h1>\n"; 


// protect extracted POST data from SQL injections
// $itemID             = mysqli_real_escape_string($connection,stripslashes($_POST['itemID']));
$itemName           = mysqli_real_escape_string($connection,stripslashes($_POST['itemName']));
$itemDescription    = mysqli_real_escape_string($connection,stripslashes($_POST['itemDescription']));
$itemPrice          = mysqli_real_escape_string($connection,stripslashes($_POST['itemPrice']));
$itemImage          = mysqli_real_escape_string($connection,stripslashes($_POST['itemImage']));
$department         = mysqli_real_escape_string($connection,stripslashes($_POST['department']));
$postItemImage          = "images/$itemImage";

       

if (empty($_POST)) // stop the script if user tries to execute without the form
{
    echo "<p>Please start with the form <a href=addItem1.html>Add Inventory</a>.</p>\n";
    require("htmlFoot.inc");
    die();
}



// insert this record into the database table using complete insert
$query  =   "INSERT INTO $department
            (itemName,itemDescription,itemPrice,itemImage)
            VALUES
            ('$itemName','$itemDescription','$itemPrice','$postItemImage')";

// single quotes above also help prevent SQL injection attacks

// Query the database table to show the record has been added
$result = mysqli_query($connection,$query)
or
die ("<b>Query Failed.</b<br />" . mysqli_error($connection));

$query  = "SELECT itemID, itemName,itemDescription,itemPrice,itemImage
            FROM $department
            ORDER BY LENGTH(itemID), itemID";

$result =   mysqli_query($connection,$query)
or
die ("<b>Query Failed.</b><br />" . mysqli_error($connection));



// Build a table from the SQL query
echo "<p>The record for $itemName has been added.</p>\n";
echo "<table class=collapse>\n"; // begin table and print header row
echo "<tr>\n\t<th>ID</th>\n\t<th>Name</th>\n";
echo "\t<th>Price</th>\n\t<th>Image</th>\n\t<th>Description</th></tr>\n";


$numRecords =   mysqli_num_rows($result); // capture number of records

while   ($row   =   mysqli_fetch_row($result))
{
    $itemID             =   $row[0];
    $itemName           =   $row[1];
    $itemDescription    =   $row[2];
    $itemPrice          =   $row[3];
    $itemImage          =   $row[4];

    echo "<tr>\n";
    echo "\t<td class=centered>$itemID</td>\n\t<td>$itemName</td>\n";
    echo "\t<td class=lpad>$itemPrice</td>\n\t<td class=lpad>$itemImage</td>\n\t<td>$itemDescription</td>\n";
    echo "</tr>\n";
}
echo "</table>\n"; // end the table
echo "<aside>\n\t<p>($numRecords) records retrieved.<p>\n";
echo "\t<p><a href=maintenance.php>Maintenance Menu</a></p>\n";
echo "</aside>\n";
require ("htmlFoot.inc");
mysqli_close($connection);
?>
