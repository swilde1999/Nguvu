<?php
session_start();
$author      = "Jeff O'Connor";
$dateWritten = "05/05/2020";
$description = "Step 2 of Inventory Update";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu";
// Check for SESSION
if (!isset($_SESSION['username']))
    {
    require ("htmlHeadNoSEO.inc");
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.html'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
    }// end !ISSET SESSION


require("functions.inc");

checkSession($sessionName);
require ("connecti2db.inc.php");
require ("htmlHeadNoSEO.inc");


if (empty($_POST))
{ echo "<p>Please start with the form <a href=\"updateItemForm.html.php\">Update Item</a>.</p>\n";
  require("htmlFoot.inc");
  die();
}
// EXTRACT THE PART NUMBER FROM THE POSTED FORM DATA
$itemID     = $_POST['itemID'];
$department = $_POST['department'];

// LOOK FOR THE REQUESTED RECORD
$query = "SELECT itemID,itemName,itemDescription,itemPrice,itemImage,deleted
          FROM $department
          WHERE itemID = '$itemID'";

$result = mysqli_query($connection,$query)
  or
die ("<b>Query Failed</b><br />$query<br />" . mysqli_error($connection));

if (mysqli_num_rows($result) > 1)
{
   echo "<p>$itemID did not produce a unique result.\n";
   echo "<a href=\"updateItem1.html\">Try again</a>.</p>\n";
   require("htmlFoot.inc");
   die ();
}
elseif (mysqli_num_rows($result) < 1)
{
   echo "<p>Item ID $itemID was not found. <a href=\"updateItem1.html\">Try again</a>.</p>\n";
   require("htmlFoot.inc");
   die ();
}
// next step is to populate the form with data from the query above.
 $row 		        = mysqli_fetch_row($result);
 $itemID    	    =                 $row[0];
 $itemName   	    = stripslashes($row[1]);
 $itemDescription  	= stripslashes($row[2]);
 $itemPrice        	= stripslashes($row[3]);
 $itemImage        	= stripslashes($row[4]);
 $deleted       	= stripslashes($row[5]);
 
 echo <<<FORMDOC
  <header>
    <h2>The Nguvu</h2>
  </header>
    <form id="form1" method="post" action="updateItem2.php">
    <fieldset>
    <legend>Step 2: Update</legend>
      <p><label class="oneForty">Item ID</label>
      <input name="itemID" type="text" readonly="readonly" 
             title="This field is READONLY" value="$itemID" /></p>
      <p><label class="oneForty">Item Name</label>
      <input name="itemName" type="text" size="25" 
	     maxlength="25" value="$itemName" /></p>
      <p><label class="oneForty">Item Description</label>
      <textarea name="itemDescription" value="$itemDescription" rows="4" cols="50">$itemDescription</textarea></p>
      <p><label class="oneForty">Retail Price (MSRP)</label>
          <input name="itemPrice" type="number" min=0.00 max=9999.99 placeholder="0.00" step=0.01 value="$itemPrice" /></p>
        <p><label class="oneForty">Item Image</label>
        <input name="itemImage" type="text" value="$itemImage" /></p><br>
        <input type="hidden" name="department" value="$department">
        
FORMDOC;
echo "\n";

if ($deleted == 0)
 {  $deleted0checked = "checked=\"checked\""; 
    $deleted1checked = ""; // not needed, so make it blank
 }
else
 {  $deleted1checked = "checked=\"checked\""; 
    $deleted0checked = ""; // not needed, so make it blank
 }

echo <<<HEREDOC
          <p>  <input type="radio" name="deleted" id="deleted0" value="0" $deleted0checked />
          <label class="eighty" for="deleted0">No</label>
            <input type="radio" name="deleted" id="deleted1" value="1" $deleted1checked />
          <label class="eighty" for="deleted1">Yes</label>
          </p>
HEREDOC;

echo <<<ENDDOC
    </fieldset>
	<fieldset>
          <input name="reset" type="reset" value="Clear" />
          <input type="submit" name="submit" value="Update" />
	</fieldset>
    </form>\n
ENDDOC;
require ("htmlFoot.inc");
mysqli_close($connection);
?>
