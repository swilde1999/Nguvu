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
$dateWritten = "05/05/2020";
$description = "Step 3 of Inventory Update";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": Update Confirmation";
$dbName      = "Nguvu"; // replace with your username
$sessionName    ="login";

require("functions.inc");

checkSession($sessionName);

require ("connecti2db.inc.php");
require ("htmlHead.inc");
echo "<h1>$title</h1>\n";

if (empty($_POST)) // Stop the script if user tries to execute without the form
{ echo "<p>Please start with the form <a href=updateItem1.html>Lookup Page</a>.</p>\n";
  require("htmlFoot.inc");
  die();
}

$itemID             = mysqli_real_escape_string($connection,stripslashes($_POST['itemID']));
$itemName           = mysqli_real_escape_string($connection,stripslashes($_POST['itemName']));
$itemDescription    = mysqli_real_escape_string($connection,stripslashes($_POST['itemDescription']));
$itemPrice          = mysqli_real_escape_string($connection,stripslashes($_POST['itemPrice']));
$itemImage          = mysqli_real_escape_string($connection,stripslashes($_POST['itemImage']));
$deleted            = mysqli_real_escape_string($connection,stripslashes($_POST['deleted']));
$department         = mysqli_real_escape_string($connection,stripslashes($_POST['department']));

// update this record in the database table
$query = "UPDATE `$department`
	  SET 	`itemName`    = '$itemName',
        `itemDescription` = '$itemDescription',
		`itemPrice`	    = '$itemPrice',
		`itemImage`	    = '$itemImage',
		`deleted`	       = '$deleted'
	  WHERE	itemID = '$itemID'";

$result = mysqli_query($connection,$query) or
die("<b>Query Failed.</b></br>" . mysqli_error($connection));

// Query the database table to show the record has been updated
$query = "SELECT itemID,itemName,itemDescription,itemPrice,itemImage,deleted
          FROM $department
	  ORDER BY itemID"; 
$result = mysqli_query($connection,$query) or
die("<b>Query Failed.</b><br />$query<br />" . mysqli_error($connection));

// Build a table from the SQL query
echo "<p>The record for Item ID $itemID has been updated.</p><br />\n";
echo "<table class=collapse>\n"; // begin table and print header row
echo "<tr>\n\t<th>Item ID</th>\n\t<th>Item Name</th>\n";
echo "\t<th>Item Price</th>\n\t<th>Item Image</th>\n\t<th>Deleted</th>\n\t<th>Description</td>\n";

$numRecords = mysqli_num_rows($result); // capture number of records
while ($row = mysqli_fetch_row($result))
{
  $itemID             =   $row[0];
  $itemName           =   $row[1];
  $itemDescription    =   $row[2];
  $itemPrice          =   $row[3];
  $itemImage          =   $row[4];
  $deleted      	    =   $row[5];
  $deletedX      = ($deleted   == 1) ? "<b>Yes</b>" : "No";
  
  echo "<tr>\n";
  echo "\t<td class=centered>$itemID</td>\n\t<td>$itemName</td>\n";
  echo "\t<td class=lpad>$itemPrice</td>\n\t<td class=lpad>$itemImage</td>\n";
  echo "\t<td class=lpad>$deletedX</td>\n\t<td class=lpad>$itemDescription</td>\n";
  echo "</tr>\n";

}
echo "</table>\n"; // end the table
echo "<aside>\n\t<p>($numRecords) records retrieved.<p>\n";
echo "\t<p><a href=\"maintenance.php\">Maintenance Menu</a></p>\n";
echo "</aside>\n";

require ("htmlFoot.inc");
mysqli_close($connection);
?>
