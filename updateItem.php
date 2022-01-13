<?php
session_start();
$author         ="Samuel Wilde";
$dateWritten    ="04/27/2020";
$description    ="";
$stylesheet     ="nuguvu";
$title          =ucfirst($stylesheet) . "Update Item";
$dbName         ="Nguvu";
$sessionName    ="login";
print_r($_SESSION['username']);
require("connecti2db.inc.php");
require("htmlHead.inc");


echo "<h1>$title</h1>\n";

if(empty($_POST))
{ 
    echo "<p>Please start with the form <a href=updateItemForm.html>Update Item Form</a></p>\n";
    require("htmlFoot.inc");
    die();
}
$productID =$_POST['productID'];

//LOOK FOR THE REQUESTED RECORD
$query = "SELECT productID, name, description, price, image
         FROM nuguvuAccessories
         WHERE productID = '$productID'";
$result = mysqli_query($connection,$query)
    or
die("<b> Query Failed</b><br />$query<br />" . mysqli_error($connection));

if(mysqli_num_rows($result)<1){
    echo "<p>$productID did not produce a unique result.\n";
    echo "<a href=\"updateItemForm.html\">Try again</a>/</p>\n";
    require("htmlFoot.inc");
    die ();
}
$row = mysqli_fetch_row($result);
$productID = $row[0];
$name = stripslashes($row[1]);
$description = stripslashes($row[2]);
$price = stripslashes($row[3]);
$image = stripslashes($row[4]);

echo <<<FORMDOC
    <header>
        <h2>Nuguvu Items</h2>
    </header>
    <form id="from1" method="post action="updateItemB.php">
    <fieldset>
    <legend>Step 2: Update $productID</legend>
        <p><label class ="entry">Product ID</label>
        <input name ="productID" type ="text" readonly="readonly title="This field is READONLY" value="$productID" /></p>
        <p><label class ="entry">Name</label>
        <input name ="name" type ="text" value="$name" /></p>
        <p><label class ="entry">Description</label>
        <input name ="description" type ="text" value="$description" /></p>
        <p><label class ="entry">Price</label>
        <input name ="price" type ="number" value="$price" /></p>
        <p><label class ="entry">Image</label>
        <input name ="name" type ="file" accept="image/*" value="$image" /></p>
FORMDOC;
require("htmlFoot.inc");
mysqli_close($connection);
        
        