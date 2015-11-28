<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Foundation Style -->
<link rel="stylesheet" href="foundation-6/css/foundation.css" />
<script src="jquery/jquery-1.11.3.min.js"></script>

<!-- Upload File Ajax -->
<script>
function uploadFile(){
	var myFile = document.getElementById("file").files[0];
	var formData = new FormData();
	formData.append('file',myFile);
	$.ajax({
		url: "class/upload.class.php",
		type: "post",
		data: formData,
		processData: false,
		contentType: false,
		success:function(data){
			document.getElementById("resultArea").innerHTML = data;
			document.getElementById("submitButton").disabled = true;
		},
		error: function(){
			document.getElementById("resultArea").innerHTML = "Something Went Really Wrong..Please Contact System Administrator";
		}
	});
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Upload Page</title>

</head>
<body>
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="menu">
				<li class="menu-text">Administrator</li>
				<li><a href="#">Update Record</a></li>
				<li><a href="#">Upload</a></li>
			</ul>
		</div>
	</div>
	<div class="medium-7 large-6 columns">
		<h1>Upload The File</h1>
		<form id="uploadForm" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Choose File:</td>
					<td><input type="file" id="file" name="file" accept=".xlsx"></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" id="submitButton" name="submitButton" class="small button" onclick="uploadFile();">Upload</button></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="medium-5large-5columns">
		<br> <br>
		<p>Result here</p>
		<div id="resultArea"></div>
	</div>
</body>

</html>