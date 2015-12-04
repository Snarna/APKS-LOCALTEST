<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Foundation Style -->
<link rel="stylesheet" href="foundation-6/css/foundation.css" />
<script src="jquery/jquery-1.11.3.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Logout</title>

<style type="text/css">
body {
	background-image: url("pics/adminbk2.jpg");
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}
</style>

</head>


<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start ();

// Unset all of the session variables.
$_SESSION = array ();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get ( "session.use_cookies" )) {
	$params = session_get_cookie_params ();
	setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
}

// Finally, destroy the session.
session_destroy ();
?>

<body>
	<div class="top-bar" id="realEstateMenu">
		<div class="top-bar-left">
			<ul class="menu accordion-menu" data-responsive-menu="accordion"
				role="tablist" aria-multiselectable="true"
				data-accordionmenu="2xy504-accordionmenu"
				data-responsivemenu="ugo6pb-responsivemenu">
				<li class="menu-text" role="menuitem">Administrator</li>
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="medium-7 large-6 columns">
			<h1>You Have Successfuly Logged Out</h1>
			<p class="subheader">Click <a href="http://localhost/adminlogin.php">HERE</a> to login again</p>
		</div>
	</div>
</body>
</html>