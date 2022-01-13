<?php
# Author:       Jeff O'Connor
# Date:         05/02/2020
# Description   Contains SQL queries to populate the htmlHead.inc with meta description for page.

// Build query string for description query
$query = "SELECT description
            FROM metaDescriptions
            WHERE pageID = '$pageID'";

// execute description query
$result = mysqli_query($connection,$query)
or
die ("<b>Query Failed.</b>" . mysqli_error($connection));

$row = mysqli_fetch_row($result); // only one row, no loop needed
$metaDescriptions = $row[0]; // assign description to variable

?>