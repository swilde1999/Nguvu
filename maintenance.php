<?php
session_start();
print_r($_SESSION);
$author         ="Samuel Wilde";
$dateWritten    ="04/25/2020";
$description    = "script to check if user is allowed to login";
$stylesheet     ="nguvu";
$title          = ucfirst($stylesheet) . "Maintenance";
$dbName         ="Nguvu";
if (!isset($_SESSION['username']))
{
    require("htmlHead.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.php'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
}// end !ISSET SESSION
require("htmlHead.inc");

echo <<<FORMDOC

            <article>
                <h1>Maintenance</h1>
                <h2>Database Alterations</h2>
                <ul>
                    <li><a href="viewAccessoriesTable.php">View Accessories</a></li>
                    <li><a href="viewJewelryTable.php">View Jelwelry</a></li>
                    <li><a href="viewClothingTable.php">View Clothing</a></li>
                    <li><a href="addItemForm.html.php">Add Item</a></li>
                    <li><a href="updateItemForm.html.php">Update Item</a></li>
                    <li><a href="deleteItemForm.html.php">Delete Item</a></li>
                    <li><a href="uploadPhoto.php">Upload Photo</a></li>
                </ul>
            </article>
            
FORMDOC;
require("htmlFoot.inc");
?>