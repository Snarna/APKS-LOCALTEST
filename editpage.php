<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Foundation Style -->
<link rel="stylesheet" href="foundation-6/css/foundation.css" />
<script src="jquery/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Edit</title>

<style type="text/css">
body {
	background-image: url("pics/adminbk2.jpg");
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
</style>

<script>
$(function(){
	$("#datepicker").datepicker();
	$("#datepicker").datepicker("option","dateFormat","yy-mm-dd");
});
</script>

</head>

<?php
// Check Session
session_start ();
if (! isset ( $_SESSION ['logstatus'] )) {
	header ( 'Location: http://localhost/adminlogin.php' );
}
?>

<body>
	<div class="top-bar" id="realEstateMenu">
		<div class="top-bar-left">
			<ul class="menu accordion-menu" data-responsive-menu="accordion"
				role="tablist" aria-multiselectable="true"
				data-accordionmenu="2xy504-accordionmenu"
				data-responsivemenu="ugo6pb-responsivemenu">
				<li class="menu-text" role="menuitem">Administrator</li>
				<li role="menuitem"><a href="http://localhost/editpage.php">Edit
						Record</a></li>
				<li role="menuitem"><a href="http://localhost/uploadpage.php">Upload</a></li>
			</ul>
		</div>
		<div class="top-bar-right">
			<ul class="menu">
				<li class="menu-text">Welcome. <?php echo $_SESSION['username']?></li>
				<li><button class="button" onclick="javascript: window.location.href='http://localhost/adminlogout.php'">Logout</button></li>
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<table>
			<tr>
				<td colspan="2"><h2></h2></td>
			</tr>
			<tr>
				<td><label>Date:</label><input type="text" id="datepicker"></td>
			</tr>
			<tr>
				<td><button class="button expanded">Search</button></td>
			</tr>
		</table>
	</div>
</body>
</html>