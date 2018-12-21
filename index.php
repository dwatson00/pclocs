<!DOCTYPE html>
<html>
<head>
<!-- loads the jQuery library for JavaScript when the page loads, the library provides AJAX functionality  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
	function ajaxOpenAll () {
		// following line doesn't do anything in this function, keeping to remind about something later
		var values = $(this).serialize();
		$.ajax({
			url:"functions.php",
			type: "post",
			data: {option: "openall"},
			// success and error might not actually do anything in this context... leaving in for now
			success: function (response) {
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	function ajaxOpenSpecificCab1 () {
		var cab1_locker_id = document.getElementById("cab1locker_id").value;
		console.log(cab1_locker_id);
		// $.ajax is a method providfed by jQuery
		$.ajax({
			url:"functions.php",
			type: "post",
			data: {option: "cab1", cab1_id: cab1_locker_id},
			// success and error might not actually do anything in this context... leaving in for now
			success: function (response) {
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	function ajaxOpenSpecificCab2 () {
		var cab2_locker_id = document.getElementById("cab2locker_id").value;
		console.log(cab2_locker_id);
		// $.ajax is a method providfed by jQuery
		$.ajax({
			url:"functions.php",
			type: "post",
			data: {option: "cab2", cab2_id: cab2_locker_id},
			// success and error might not actually do anything in this context... leaving in for now
			success: function (response) {
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
</script>
</head>
<body>
<? php require 'functions.php'
	<h1> temp </h1>
	<form action="javascript:ajaxOpenAll()" method="post" name="openall">
		<input type="submit" value="Open all doors">
	</form><br>
	<form action="javascript:ajaxOpenSpecificCab1()" method="post" name="openspecific_cab1">
		Locker to open: <input type="text" name="cab1locker_id" id="cab1locker_id"><br>
		<input type="checkbox" name="cab1locker_id" id="cab1locker_id" value="1">1
		<input type="submit" value="Submit Cab1 locker">
	</form>
	<form action="javascript:ajaxOpenSpecificCab2()" method="post" name="openspecific_cab2">
		Locker to open: <input type="text" name="cab2locker_id" id="cab2locker_id"><br>
		<input type="submit" value="Submit Cab2 locker">
	</form>
<!-- the following tag seems to show because Apache is parsing this doc as html instead of php, try use the following in vhost: 'AddType application/x-httpd-php .html .htm'  -->
?>
</body>
</html>
