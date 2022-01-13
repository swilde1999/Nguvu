<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset = "utf-8">

        <?PHP
		$dbName      = "Nguvu"; 
		$pageID      = "Login";
		require ("connecti2db.inc.php");
        require ("metaQueries.inc");
		echo "\t<title>The Nguvu: $pageID</title>\n";
		echo "\t<meta name=\"description\" content=\"$metaDescriptions\">\n";
		mysqli_close($connection);
		?>

		<meta name = "viewport" content="width=device-width,initial-scale=1.0">
		<link rel= "stylesheet" href="nguvu.css">
    </head>
	<body>
	
	<div class="wrapper">
		<div class="multi_color_border"></div>
		<div class="top_nav">
			<div class="left">
			  <div class="imgLogo"><img src="images/nguvu.jpg" height="100" width="100"></div>
			  <div class="search_bar">
				  <input type="text" placeholder="Search">
			  </div>
		  </div> 
		  <div class="right">
			<ul>
			  <li><a href="index.html.php">Home</a></li>
			  <li><a href="login.html.php">Login</a></li>
			  <li><a href="signup.html.php">Sign up</a></li>
			  <li><a href="cart.html.php">Cart</a></li>
			</ul>
		  </div>
		</div>
		<div class="bottom_nav">
		  <ul>
			<li><a href="jewelry.html.php">Jewelry</a></li>
			<li><a href="clothing.html.php">Clothing</a></li>
			<li><a href="accessories.html.php">Accessories</a></li>
			<li><a href="contactUs.php">Contact Us</a></li>
		  </ul>
	  </div>
	  
	</div>
	<!--added in by bradley bentley on 4/24/20-->
	<!--The login form-->
	<form action="action_page.php" method="post">

		<div class="container">
			<label for="lblUsername"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="lblUsername" required>

			<label for="lblPassword"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="lblPassword" required>

			<button type="submit">Login</button>
			<label>
				<input type="checkbox" checked="checked" name="chkRemember"> Remember me
			</label>
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<span class="lblPassword">Forgot <a href="#">password?</a></span>
		</div>
	</form>
	<!--End of login form-->

	  
	</div>
	<footer>
       Copyright&copy; Nuguvu  <br>  
    </footer>
</body>
</html>