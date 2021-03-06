<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset = "utf-8">

		<?PHP
		$dbName      = "Nguvu"; 
		$pageID      = "Jewelry";
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
		  </div> 
		  <div class="right">
			<ul>
			  <li><a href="index.html.php">Home</a></li>
            
			  <li><form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                  <input type="hidden" name="cmd" value="_s-xclick">
                  <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></li>
			</ul>
		  </div>
		</div>
		<div class="bottom_nav">
		  <ul>
			<li><a href="jewelry.html.php">Jewelry</a></li>
			<li><a href="clothing.html.php">Clothing</a></li>
			<li><a href="accessories.html.php">Accessories</a></li>
			<li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
		  </ul>
	  </div>
	       <?php
            
            $author         = "Samuel Wilde";
            $dateWritten    = "05/05/2020";
            $dbName         ="Nguvu";
            require ("connecti2db.inc.php");//sets $connection
            $query="SELECT itemName,itemDescription,itemPrice,itemImage,itemButton
            FROM jewelry
            ORDER BY itemID";
            $result = mysqli_query($connection,$query) or
                die("<b>Query Failed.</b><br /><br />" . mysqli_error($connection));

            //build a table from the SQLinquiry
            $numRecords = mysqli_num_rows($result);
            while ($row = mysqli_fetch_row($result)){
                $itemName=stripslashes($row[0]);
                $itemDescription=stripslashes($row[1]);
                $itemPrice=stripslashes($row[2]);
                $itemImage=stripslashes($row[3]);
                $button=stripslashes($row[4]);
                echo <<<HEREDOC
				<div class="grid-container">
					<div class="grid-wrapper">
						<div class="grid-wrapper">
							<h2 class="grid-wrapper">$itemName</h2>
							<p class="grid-wrapper">$itemDescription</p>
							<p class="itemPrice">$itemPrice</p>
							<img id="itemImg" src = "$itemImage" height=100 alt ="Picture of item">
						</div>
					</div>
				</div>
                <br>
                <br>
                <div class="btn-container">
HEREDOC;
            include($button);
			echo "</div>\n";
            }
                mysqli_close($connection);
        ?>
	  
	</div>
	<footer>
       Copyright&copy; Nuguvu  <br>  
    </footer>
</body>
</html>