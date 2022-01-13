<?php 
$author      = "Jeff O'Connor";
$dateWritten = "05/05/2020";
$description = "Step 1 of Inventory Delete";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": Inventory Lookup (Delete)";
$dbName      = "Nguvu; // name of Database

require ("connecti2db.inc.php");
require ("htmlHead.inc");
echo "<h1>$title</h1>\n";

$query = "SELECT itemID,itemName,itemDescription,itemPrice,itemImage
          FROM Nguvu
	  WHERE deleted
      ORDER BY LENGTH(itemID), itemID";
      
$result = mysqli_query($connection,$query) or
die("<b>Query Failed.</b><br /><br />" . mysqli_error($connection));

echo "<form action=deleteItem2.php method=post>\n";
echo "<fieldset>\n";// Build a table from the SQL query
echo "<legend>Mark the record(s) to delete:</legend>\n";
echo "<table class=collapse>\n"; // begin table and print header row
echo "<tr>\n\t<th>Delete</th>\n\t<th>Item ID</th>\n\t<th>Item Name</th>\n";
echo "\t<th>Item Description</th>\n\t<th>Item Price</th>\n\t<th>Item Image</th>\n";


$numRecords = mysqli_num_rows($result); // capture number of records
while   ($row   =   mysqli_fetch_row($result))
{
    $itemID             =   $row[0];
    $itemName           =   $row[1];
    $itemDescription    =   $row[2];
    $itemPrice          =   $row[3];
    $itemImage          =   $row[4];
    $deleted            = ($deleted   == 1) ? "<b>Yes</b>" : "No";

  echo "<tr>\n";
  echo "\t<td class=lpad><input type=checkbox name=removeMe[] value=$itemID /></td>\n";
  echo "\t<td>$itemID</td>\n\t<td>$itemName</td>\n";
  echo "\t<td class=lpad>$itemDescription</td>\n\t<td class=rpad>$itemPrice</td>\n\t<td class=rpad>$itemImage</td>\n";
  echo "</tr>\n";
} // end WHILE

echo "</table>\n"; // end the table
echo "</fieldset>\n";
echo "<fieldset>\n";
echo "\t<input type=reset  name=reset  value=Clear  />\n";
echo "\t<input type=submit name=submit value=Delete />\n";
echo "</fieldset>\n";
echo "</form>\n<aside>\n\t<p>($numRecords) records are currently flagged for deletion.<p>\n";
echo "</aside>\n";

require ("htmlFoot.inc");
mysqli_close($connection);
?>
