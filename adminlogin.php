<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Foundation Style -->
<link rel="stylesheet" href="foundation-6/css/foundation.css" />
<script src="jquery/jquery-1.11.3.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Login</title>

<style type="text/css">
body{
	background-image: url("pics/adminbk2.jpg");
	background-repeat:no-repeat;
    background-size:100% 100%;
    background-attachment: fixed;
}
</style>

<script type="text/javascript">
var globalNum = 3;

function adminLogin(){
	var userName = document.getElementById("username");
	var password = document.getElementById("password");
	var submitButton = document.getElementById("submitbutton");
	var otherErrorSpan = document.getElementById("othererrorspan");
	var emptyError = document.getElementById("emptyerror");
	var errorError = document.getElementById("errorerror");
	var otherError = document.getElementById("othererror");

	//Disabled Submit Button
	submitButton.disabled = "true";
	
	//Clear Previous Error Message.
	emptyError.style.display = "none";
	errorError.style.display = "none";
	otherError.style.display = "none";
	
	if(userName != "" && password != ""){
		$.ajax({
			url: "class/adminlogin.class.php",
			type: "post",
			data: {username: userName.value, password: password.value},
			success:function(data){
				if(data == "pass"){
					userName.disabled = true;
					password.disabled = true;
					submitButton.disabled = true;
					otherError.style.display = "block";
					setInterval(function(){
						otherErrorSpan.innerHTML = "Success! Page Will Redirect In " + globalNum + " Seconds. <br> You can also click <a href=\"http://localhost/uploadpage.php\">here";
						globalNum--;
						if(globalNum == 0){
							//Send Redirect
							window.location.replace("http://localhost/uploadpage.php");
						}
					}, 1000);
				}
				else{
					otherErrorSpan.innerHTML = data;
					otherError.style.display = "block";
					submitButton.disabled = false;
				}
			},
			error:function(){
				errorError.style.display = "block";
				submitButton.disabled = false;
			}
		});
	}
	else{
		emptyError.style.display = "block";
		submitButton.disabled = false;
	}
}
</script>
</head>

<body>
	<div class="top-bar" id="realEstateMenu">
		<div class="top-bar-left">
			<ul class="menu accordion-menu" data-responsive-menu="accordion"
				role="tablist" aria-multiselectable="true"
				data-accordionmenu="2xy504-accordionmenu"
				data-responsivemenu="ugo6pb-responsivemenu">
				<li class="menu-text" role="menuitem">Administrator</li>
				<li role="menuitem"><a href="http://localhost/editpage.php">Edit Record</a></li>
				<li role="menuitem"><a href="http://localhost/uploadpage.php">Upload</a></li>
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="medium-7 large-6 columns">
			<h1>APKS Administrator Login</h1>
			<p class="subheader">Use Foundation 6 as css template. This page is
				for administrator login. Nothing special</p>
		</div>
		<div class="medium-5 large-5 columns">
			<div class="callout secondary">
				<div class="row">
					<div id="emptyerror" class="small-12 columns" style="display: none">
						<span style="color: blue">Please Enter Both Username And Password</span>
					</div>
					<div id="errorerror" class="small-12 columns" style="display: none">
						<span style="color: yellow">Something Went Really Wrong! Please Contact System Administrator</span>
					</div>
					<div id="othererror" class="small-12 columns" style="displat: none">
						<span id="othererrorspan" style="color: red"></span>
					</div>
					<div class="small-12 columns">
						<label>User Name <input id="username" type="text" placeholder="User Name" maxlength="20"></label>
					</div>
					<div class="small-12 columns">
						<label>Password: <input id="password" type="password" placeholder="Password" maxlength="20"></label>	
						<button id="submitbutton" class="button" onclick="adminLogin();">Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>