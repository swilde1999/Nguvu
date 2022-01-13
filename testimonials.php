<?php


$author      = "Samuel";
$dateWritten = "05/08/2020";
$description = "Contact Us";
$thisScript  = htmlspecialchars($_SERVER['PHP_SELF']);
$stylesheet  = "nguvu";
$title       = ucfirst($stylesheet) . ": $description";
$dbName      = "Nguvu"; 
$pageID      = "ContactUs";

require ("connecti2db.inc.php");
require ("metaQueries.inc");
require ("htmlHead.inc");

echo <<<HEREDOC
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
              <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIG1QYJKoZIhvcNAQcEoIIGxjCCBsICAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAImFKTc33xeIi0zqpoEWtSrZnHpvmSDPwYjKorI6NoF6sfZlT3Fs6NDYijTLbecMdkPvaAjrtTk8URnKWIKkJVL1dinggq+h81r2/fS48j0SqzTNQbLqzev0WYEBzTCSHBwfLvfkG/6+Rxsljs8etITeedUQ78SbfplEjwoRMnbDELMAkGBSsOAwIaBQAwUwYJKoZIhvcNAQcBMBQGCCqGSIb3DQMHBAjgZZmT2UpAOIAw5mMtNMTLFn0Rm3o87ZwM0ABA49/DQGE7UF1OeSD0Kt31t7ES++q+UvJv+l0MaEOWoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjAwNTA2MDM1MzE2WjAjBgkqhkiG9w0BCQQxFgQUB8d9szHffjGmFq5JJ4nkxsF1hdIwDQYJKoZIhvcNAQEBBQAEgYAtSBAMNLS8TN1OCwKKG5SJEpVo1ZJWMnh1l7rTrepI5FNslVmuv3JtnGqwnEis24FOc1gFUMLDD5IG9q9Xo5EuVJUNjJyn7TLfbwcVd/a+KHrOpdHSjRQuuF7SMFq93Hn3dyfjAPkWjB7M21g9+jd1BUFbNSFgqzkHOy3zU9b1/A==-----END PKCS7-----">
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
HEREDOC;

if (!isset($_POST['submit']))
{
echo <<<FORMDOC
<style>
.oneFifty	{	width: 150px;
   display: block;
   float: left;
}
<h1>This page is to send the company a review of a product.</h1>
</style>
<article>
<form action="$thisScript" method="post">
<fieldset>
<legend>Contact Form</legend>
<p><label class="oneFifty">First Name:</label>
   <input type="text" name="firstName" placeholder="First Name" required />
</p>

<p><label class="oneFifty">Last Name:</label>
   <input type="text" name="lastName" placeholder="Last Name" required />
</p>
<p><label class="oneFifty">Email Address:</label>
   <input type="email" name="email" placeholder="Email Address" required />
</p>
<p><label>Leave us a review here, please.</label><br />
   <textarea cols="50" rows="10" name="message" placeholder"-- Your message here -- "></textarea>
</p>
<input type="reset" name="reset" value="Clear" />
<input type="submit" name="submit" value="Submit" />
</fieldset>

</form><br />
</article><br />
FORMDOC;
}

else
{

$firstName  = $_POST['firstName'];
$lastName   = $_POST['lastName'];
$email      = $_POST['email'];
$message    = $_POST['message'];
$clientEmail = 'info@thenguvu.com';

echo <<<HEREDOC
<article>
<h1>Thank you $firstName $lastName!</h1><br /><br>
<p>We want to thank you, $firstName, for your interest in The Nguvu.<br /><br>
We appreciate your comments and feedback, and we want to hear from our valued customers.<br /><br>
</p>
<p>An Email has been sent to The Nguvu and we will respond to you at: $email as quickly as we are able.<br>
</p>
</article>
HEREDOC;

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $firstName $lastName: $email\r\n";
$headers .= "X-Priority: 1\r\n";
$headers .= "X-MSMAIL-Priority: High\r\n";
$subject  = "You have a new message from The Nguvu.";

$body  = "<h2>This message was sent from The Nguvu testimonial page.</h2>\n";
$body .= "<p>Name: $firstName $lastName<br>\n";
$body .= "Email: $email<br>\n";
$body .= "Message: $message<br /><br>\n";
$body .= "<br><h2>The valued customer is waiting for a response.</h2>\n";

  // send the email
mail($clientEmail,$subject,$body,$headers);
      }

require ("htmlFoot.inc");
?>
