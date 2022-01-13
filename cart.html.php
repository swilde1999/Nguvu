<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset = "utf-8">

		<?PHP
		$dbName      = "Nguvu"; 
		$pageID      = "Cart";
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
			  <div class="logo"><p>Nguvu</p></div>
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

	    <!--added in by bradley bentley on 4/24/20-->
		<!--paypal button-->
		<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="LJVLRLHUUKW2U">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<!--paypal button end-->
	</div>
	<footer>
       Copyright&copy; Nuguvu  <br>  
    </footer>
</body>
</html>