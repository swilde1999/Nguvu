<?php
/*	Author: 	Jeff O'Connor
	Date Written:	04/23/2020
	Description:	Include file for The Nguvu
			automatically uses the correct chapter style sheet
*/

echo "<!doctype html>\t\t<!-- Author:       $author -->\n";
echo "<html lang=\"en\">\t<!-- Date Written: $dateWritten -->\n";
echo "<head>\t\t\t\t<!-- Description:  $description -->\n";
echo "\t<title>The Nguvu: $title</title>\n";
echo "\t<meta charset=\"utf-8\" />\n";
echo "\t<meta name = \"viewport\" content=\"width=device-width,initial-scale=1.0\">\n"; 
echo "\t<link rel=\"stylesheet\" href=\"$stylesheet.css\" />\n";
echo "</head>\n";
echo "<body>\n";
echo "<div class=\"wrapper\">\n";
?>
