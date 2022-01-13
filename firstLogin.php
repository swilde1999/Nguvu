<?php
session_start();
$author	=	"Samuel Wilde";
$dateWritten=	"05/12/2020";
$description = 	"This script checks to see if the user is allow to access the database alterations";
$title          = ucfirst($stylesheet) . "Maintenance";
$stylesheet = "nguvu";
$thisScript	=htmlspecialchars($_SERVER['PHP_SELF']); //rdens the script against XSS attacks 
$dbName         ="Nguvu";

require ("htmlHead.inc");
require("connecti2db.inc.php");
if (!isset($_POST['submit'])){ //this creates the form
   print <<<HEREDOC
     <h1>Maintenance Login</h1>
  <form action="$thisScript" method ="post">
   <fieldset>
     <legend>Login</legend>
     <p><label class="loginBox">Username</label>
        <input type="text" name="username" maxlength="15" placeholder="username" />
     </p>
     <p><label class="LoginBox">Password</label>
        <input type="password" name="password" id="pw1" />
     </p>
   </fieldset>
   <fieldset>
     <input type="reset"  name="reset"  value="Clear" />
     <input type="submit" name="submit" value="Login" />
   </fieldset>
  </form>
HEREDOC;
}
else{
function invalidLogin($message)
{
    //Input:        Expects a string as an argument
    //Processing:   non
    //output:       displays error message
    echo"<h1>You are not authorized to access this page</h1>";
    echo "<p>$message ";
    echo"<a href=\"firstLogin.php\">Try Again</a></p>\n";
    require("htmlFoot.inc");
    die();
}// end FUNCTION invalidLogin

require("connecti2db.inc.php");

if(empty($_POST)){
    invalidLogin("You dont have acesss ya goober.");
}
$usernameEntered= mysqli_real_escape_string($connection,stripslashes($_POST['username']));
$passwordEntered=mysqli_real_escape_string($connection,stripslashes($_POST['password']));

$query = "SELECT password
            FROM login
            WHERE username = '$usernameEntered'";
$result = mysqli_query($connection,$query)
or die("<b> Query Failed.<b><br />" . mysqli_error($connection));
$found = mysqli_num_rows($result);

if(!$found){
    invalidLogin("Username and password combo is incorrect");
}// end if not found
$row = mysqli_fetch_row($result);
$passwordDb = $row[0];
$salt = "[]-=";
$pepper = ",./";
$passwordMd5 = md5($salt . $passwordEntered . $pepper);

if($passwordMd5 != $passwordDb){
    invalidLogin("The username and password combo is incorrect");
}
else{
    $_SESSION['username']=$usernameEntered;
    print_r($_SESSION);
}
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
                    <li><a href="uploadPhoto.php">Upload Photo</a><li>
                </ul>
            </article>
            
FORMDOC;
require("htmlFoot.inc");
}
?>