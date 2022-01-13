<?php
session_start();
$author      = "Jeff O'Connor";
$dateWritten = "05/05/2020";
$description = "Step 2 of Inventory Update";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu"; // replace with your username
$sessionName    ="login";
if (!isset($_SESSION['username']))
    {
    require ("htmlHeadNoSEO.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.php'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
    }// end !ISSET SESSION
$author      = "Jeff O'Connor";
$dateWritten = "04/16/2020";
$description = "Step 1 of Inventory Delete";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": Inventory Delete (Lookup)";
$dbName      = "Nguvu"; // replace with your username

require ("connecti2db.inc.php");
require ("htmlHeadNoSEO.inc");
echo "<h1>$title</h1>\n";

if (empty($_POST)) // Stop the script if user tries to execute without the form
{ echo "<p>Please start with the form <a href=deleteItemForm.html.php>Delete Item</a>.</p>\n";
  require("htmlFoot.inc");
  die();
}

$department = $_POST['department'];  

$query = "SELECT itemID,itemName,itemDescription,itemPrice,itemImage,deleted
          FROM $department
	  WHERE deleted
	  ORDER BY itemID";
$result = mysqli_query($connection,$query) or
die("<b>Query Failed.</b><br />$query<br />" . mysqli_error($connection));

echo "<form action=deleteItem2.php method=post>\n";
echo "<fieldset>\n";// Build a table from the SQL query
echo "<legend>Mark the record(s) to delete:</legend>\n";
echo "<table>\n"; // begin table and print header row
echo "<tr>\n\t<th>Delete</th>\n\t<th>Item ID</th>\n\t<th>Item Name</th>\n";
echo "\t<th>Item Price</th>\n\t<th>Item Image</th>\n";


$numRecords = mysqli_num_rows($result); // capture number of records
while ($row = mysqli_fetch_row($result))
{
  $itemID       	= stripslashes($row[0]);
  $itemName 	    = stripslashes($row[1]);
  $itemDescription	= stripslashes($row[2]);
  $itemPrice        = stripslashes($row[3]);
  $itemImage		= stripslashes($row[4]);
  $deleted      	= stripslashes($row[5]);
  $deleted      = ($deleted   == 1) ? "<b>Yes</b>" : "No";
  echo "<tr>\n";
  echo "\t<td class=lpad><input type=checkbox name=removeMe[] value=$itemID /></td>\n";
  echo "\t<td>$itemID</td>\n\t<td>$itemName</td>\n";
  echo "\t<td class=lpad>$itemPrice</td>\n\t<td class=rpad>$itemImage</td>\n";
  echo "</tr>\n";
} // end WHILE
echo "</table>\n"; // end the table
echo "</fieldset>\n";
echo "<fieldset>\n";
echo "\t<input type=reset  name=reset  value=Clear  />\n";
echo "\t<input type=submit name=submit value=Delete />\n";
echo "\t<input type=\"hidden\" name=\"department\" value=\"$department\">\n";
echo "</fieldset>\n";
echo "</form>\n<aside>\n\t<p>($numRecords) records are currently flagged for deletion.<p>\n";
echo "\t<p><a href=maintenance.php>Mainenance Menu</a></p>\n";
echo "</aside>\n";

require ("htmlFoot.inc");
mysqli_close($connection);
?>
