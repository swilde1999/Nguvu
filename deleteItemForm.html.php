<?php
session_start();
$author      = "Jeff O'Connor";
$dateWritten = "05/05/2020";
$description = "Step 1 of Inventory Delete";
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu";
// check for SESSION
if (!isset($_SESSION['username']))
    {
    require ("htmlHeadNoSEO.inc");   
    echo "<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href='firstLogin.html'>Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();   
    }// end !ISSET SESSION
?>
<!doctype html> <!-- Author:	  Jeff O'Connor           -->
<html lang="en"><!-- Date:	  05/05/2020          -->
<head>          <!-- Description: Step 1 of Inventory Update -->
 <title>The Nguvu: Inventory Delete (Lookup)</title>
 <meta charset="utf-8" />
 <link rel="stylesheet" href="nguvu.css" />
</head>
<body>
<div class="wrapper">
<header>
 <h1>The Nguvu: Inventory Delete</h1>
</header>
<article>
    <h2>Select a department .<h2>
        <form action="deleteItem1.php" method="post"> 
        <select name="department">
            <option value="accessories">Accessories</option>
            <option value="clothing">Clothing</option>
            <option value="jewelry">Jewelry</option>
            </select>    
            <input type="submit" name="submit" value="Submit" />
        </form>

    </article> 

</div>
</body>
</html>