 <!DOCTYPE html>
<html>
  <head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> <!-- loads the bootstrap lib  for prettyness-->
<link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>PC locs</title>

<!-- loads the jQuery library for JavaScript when the page loads, the library provides AJAX functionality  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
/*
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
	function checkboxhandler(){
		var tobeopened = 12;
		var inputElements = document.getElementsByClassName('cab1');
		for(var i=0; inputElements[i]; ++i){
			tobeopened = inputElements[1].value;
			break;
			}

	documentGetElementById('output').innertext = tobeopened;
}
*/

</script>

  </head>
  <body>
<? require 'functions.php'
<div class= "row">
<div class="col-md-offset-4 col-md-4">
   <h1>PC locs Control</h1>
	<form class="form-group" action="javascript:ajaxOpenAll()" method="post" name="openall">

   <button type= 'submit' value ="open all doors" title='Opens all lockers one by one.' >Open All</button>
	</form>
<form>
    <h2>Left Cabnet</h2>
	Select:<br>
	<ul style="list-style-type:none" id="cab1locker_id" name="cablocker_id">
     
     <li><input type="checkbox" value="0" class = "cab1">  1</li>
     <li><input type="checkbox" value="1" class = "cab1">  2</li>
     <li><input type="checkbox" value="2" class = "cab1">  3</li>
     <li><input type="checkbox" value="3" class = "cab1">  4</li>
     <li><input type="checkbox" value="4" class = "cab1">  5</li>
     <li><input type="checkbox" value="5" class = "cab1">  6</li>
     <li><input type="checkbox" value="6" class = "cab1">  7</li>
     <li><input type="checkbox" value="7" class = "cab1">  8</li>
</ul>
<ul style="list-style-type:none">

     <li><input type="checkbox" value="8" class = "cab1">  9</li>
     <li><input type="checkbox" value="9" class = "cab1">  10</li>
     <li><input type="checkbox" value="10" class = "cab1">  11</li>
     <li><input type="checkbox" value="11" class = "cab1">  12</li>
     <li><input type="checkbox" value="12" class = "cab1">  13</li>
     <li><input type="checkbox" value="13" class = "cab1">  14</li>
     <li><input type="checkbox" value="14" class = "cab1">  15</li>
     </ul>

<br>

     <button type= 'reset' title ='Clears all the checkboxes.' >Clear All</button>
     <input type=button name='Cab1Spes' id='Cab1Spes' value='Open selected' alt = 'Opens the checked lockers on the left.'title='Opens the checked lockers on the left.' >
     <button type= 'button' title='Opens the entire cabnet[not working yet].'> Open entire cabnet</button>
</form>
<br>
<form>
	<h2>Right Cabnet</h2>
	Select:<br>    
	<ul style="list-style-type:none">

          <li><input type="checkbox" value="0">  1</li>
     <li><input type="checkbox" value="1">  2</li>
     <li><input type="checkbox" value="2">  3</li>
     <li><input type="checkbox" value="3">  4</li>
     <li><input type="checkbox" value="4">  5</li>
     <li><input type="checkbox" value="5">  6</li>
     <li><input type="checkbox" value="6">  7</li>
     <li><input type="checkbox" value="7">  8</li>
</ul>
<ul style="list-style-type:none">

     <li><input type="checkbox" value="8">  9</li>
     <li><input type="checkbox" value="9">  10</li>
     <li><input type="checkbox" value="10">  11</li>
     <li><input type="checkbox" value="11">  12</li>
     <li><input type="checkbox" value="12">  13</li>
     <li><input type="checkbox" value="13">  14</li>
     <li><input type="checkbox" value="14">  15</li>
     </ul>
<br>  
     <button type = 'reset' title = 'Clears all the checkboxes.' > Clear All </button>
     <button type= 'button' title = 'Opens the checked lockers on the right cabnet.'> Open selected</button>
     <button type= 'button' title = 'Opens the entire cabnet.'> Open entire cabnet</button>
</form>

?>
</div>
</div>

   </form>
 <script src = "indexnew.js"></script>

 </body>
</html>
