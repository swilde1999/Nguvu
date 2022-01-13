<?php
session_start();
$author      = "Jeff O'Connor";
$dateWritten = "05/05/2020";
$description = "Step 3 of Inventory Delete";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu"; 
// check for SESSION
if (!isset($_SESSION['username']))
    {
      require ("htmlHeadNoSEO.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.php'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
    }// end !ISSET SESSION


require ("connecti2db.inc.php");
require ("htmlHeadNoSEO.inc");
$department = $_POST['department'];

echo "<h1>$title</h1>\n";

if (empty($_POST)) // Stop the script if user tries to execute without the form
{ echo "<p>Please start with the form <a href=deleteItemForm.html.php>Delete Item</a>.</p>\n";
  require("htmlFoot.inc");
  die();
}

// if no checkboxes checked, set $itemsToRemove to null
$itemsToRemove = empty($_POST['removeMe']) ? null : $_POST['removeMe'];

if (count($itemsToRemove) <= 0)
{ 
  echo "<p>No records selected to delete.</p>\n"; 
  $numRecords = 0;
}
else
{
// delete these records from the database table
  echo "<ul>\n";
  foreach ($itemsToRemove as $itemID)
  {
    $query = "DELETE FROM $department
	      WHERE itemID = '$itemID'";

    $result = mysqli_query($connection,$query) or
    die("<b>Query Failed.</b></br>" . mysqli_error($connection));

    echo "\t<li class=deleted>The record for Item ID $itemID has been deleted.</li>\n";
  } // end FOREACH LOOP
  // Query the database table to show the record has been deleted
  $query = "SELECT itemID,itemName,itemDescription,itemPrice,itemImage,deleted
            FROM $department
  	    ORDER BY itemID"; 
  $result = mysqli_query($connection,$query) or
  die("<b>Query Failed.</b><br />$query<br />" . mysqli_error($connection));
  echo "</ul>\n";
// Build a table from the result set
echo "<table>\n"; // begin table and print header row
echo "<tr>\n\t<th>Item ID</th>\n\t<th>Item Name</th>\n";
echo "\t<th>Item Price</th>\n\t<th>Item Image</th>\n";
echo "\t<th>Deleted</th>\n\t<th>Description</td>\n";
echo "</tr>\n";

$numRecords =   mysqli_num_rows($result); // capture number of records

while   ($row   =   mysqli_fetch_row($result))
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
}// end IF SKIPBLOCK
echo "<aside>\n\t<p>($numRecords) records retrieved.<p>\n";
echo "\t<p><a href=maintenance.php>Maintenance Menu</a></p>\n";
echo "</aside>\n";

require ("htmlFoot.inc");
mysqli_close($connection);
?>
