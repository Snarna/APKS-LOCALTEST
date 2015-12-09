<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Jquery Style -->
<script src="jquery/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- Import Foundation 6 -->
<script src="foundation-6/js/foundation.js"></script>
<link rel="stylesheet" href="foundation-6/css/foundation.css" />


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Edit</title>

<script>

$(document).ready(function() {

	$(function() {
	    $( "#mydatepicker" ).datepicker();
	    $( "#mydatepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	});

	$("#filter").keyup(function(){
	    _this = this;
	    // Show only matching TR, hide rest of them
	    $.each($("#resulttable tbody").find("tr"), function() {
	        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
	           $(this).hide();
	        else
	             $(this).show();
	    });
	});
});

</script>

<script>
function searchData(){
	var mydate = document.getElementById("mydatepicker");
	var emptyError = document.getElementById("emptyerror");
	var errorError = document.getElementById("errorerror");
	var filterDiv = document.getElementById("filterdiv");
	var resultArea = document.getElementById("resultArea");
	emptyError.style.display = "none";
	errorError.style.display = "none";
	if(mydate.value != ""){
		$.ajax({
			url: "class/adminsearch.class.php",
			type: "get",
			data: {date: mydate.value},
			success:function(data){
				filterDiv.style.display = "block";
				resultArea.innerHTML = data;
			},
			error:function(){
				errorError.style.display = "block";
			},
		});
	}
	else{
		emptyError.style.display = "block";
	}
}

function editRecord(rawThis){
	var trNum = $(rawThis).closest("tr")[0].rowIndex;
	var table = document.getElementById("resulttable");
	var cells = table.rows[trNum].getElementsByTagName("td");
	//Change button
	cells[0].innerHTML = "<button class=\"button\" onclick=\"backRecord(this)\">Save</button>";
	//Change the rest
	for(i=1; i<cells.length; i++){
		cells[i].innerHTML =  "<input type=\"text\" style=\"resize:both;\" value=\"" + cells[i].innerHTML + "\">";
	}
}

function backRecord(rawThis){
	var trNum = $(rawThis).closest("tr")[0].rowIndex;
	var table = document.getElementById("resulttable");
	var cells = table.rows[trNum].getElementsByTagName("td");
	var cellsCount = 0;
	//Call Ajax Send Update
	<!-- Start here next time! -->
	//Change from input back to text
	$("#resulttable tr:eq('"+ trNum +"') :input").each(function(){
		if($(this).attr("class") == "button"){
			cells[cellsCount].innerHTML = "<button class=\"button\" onclick=\"editRecord(this);\">Edit</button>";
		}
		else{
			cells[cellsCount].innerHTML = $(this).val();
		}
		cellsCount++;
	});
}
</script>

<style>
body {
	background-image: url("pics/adminbk2.jpg");
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}
</style>

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
				<li><button class="button"
						onclick="javascript: window.location.href='http://localhost/adminlogout.php'">Logout</button></li>
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div id="emptyerror" style="display: none">
			<span style="color: red">Please Select A Date</span>
		</div>
		<div id="errorerror" style="display: none">
			<span style="color: red">Something Went Really Wrong...</span>
		</div>
		<input type="text" id="mydatepicker"
			placeholder="Click Here To Select A Date">
		<button type="button" class="expanded button" onclick="searchData();">Search</button>
	</div>
	<br>
	<div class="row" id="filterdiv" style="display: none;">
		<input type="text" name="filter" id="filter"
			placeholder="Filter Keywords">
	</div>
	<div class="row">
		<div name="resultArea" id="resultArea"></div>
	</div>
</body>
</html>
