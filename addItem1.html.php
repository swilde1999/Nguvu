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
?>
<!doctype html>	<!-- Author:       Jeff O'Connor   -->
<html lang="en"><!-- Date Written: 05/07/2020     -->
<head>		<!-- Description:  Add inventory for Nguvu -->
 <title>The Nguvu: Add Inventory</title>
 <meta charset="utf-8" />
 <link rel="stylesheet" href="nguvu.css" />
</head>
<body>
<div id="wrapper">
<h1>The Nguvu</h1>

<form action="addItem2.php" method="post">
<fieldset>
<legend>Add Inventory</legend>
<!-- Note how the elements in this form align without using tables for layout. -->
<!-- You should use this technique. NEVER use tables for layout in HTML        -->
<p><label>Select Department: </label><br />
<select name="department" class="oneForty">
        <option value="accessories">Accessories</option>
        <option value="clothing">Clothing</option>
        <option value="jewelry">Jewelry</option>
</select></p>
<!-- <p><label class="oneForty">Item ID (Leave blank for auto increment): </label><br />    
   <input type="number" name="itemID" /> -->
</p>
<p><label class="oneForty">Item Name: </label>
   <input type="text" name="itemName" maxlength="100" />
</p>
<p><label class="oneForty">Item Description: </label><br />
   <textarea name="itemDescription" rows="4" cols="80" ></textarea>
</p>
<p><label class="oneForty">Item Image (Enter the image file name): </label>
   <input type="text" name="itemImage" maxlength="100" />
</p>
<p><label class="oneForty">Item Price: </label><br />
    <input name="itemPrice" type="number" min=0.00 max=999.99 step=0.01 /></p>
</p>
</fieldset>
<fieldset>
<input type="reset"  name="reset"  value="Clear" />
<input type="submit" name="submit" value="Submit" />
</fieldset>
</form>
<p><a href=maintenance.php>Maintenance Menu</a></p>
</div>
</body>
</html>
