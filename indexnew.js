let Cab1OS= init(1);
let Cab2OS= init(2);
Cab1OS.addEventListener("click",Cab1OpenGroup);
//Cab2OS.addEventListener("click",checkboxhandler(2));
	function init(id){
		let cabid=null;
		if (id=1){
			cabid= document.getElementById('Cab1Spes');
			return cabid;
		} else if(id=2){
			cabid= document.getElementById('Cab2Spes');
			return cabid;
		}else {
			return null;
	}
}

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
	function ajaxOpenSpecificCab1 (tobeopened) {
		var cab1_locker_id = tobeopened;
		console.log(cab1_locker_id);
		// $.ajax is a method providfed by jQuery
		$.ajax({
			url:"functions.php",
			type: "post",
			data: {option: "cab1", cab1_id: cab1_locker_id},
			// success and error might not actually do anything in this context... leaving in for now
			success: function () {
			console.log('sent cab1 open request');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	function ajaxOpenSpecificCab2 (tobeopened) {
		var cab2_locker_id =tobeopened;
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
	function Cab1OpenGroup(){
		let lockers = (function() {
			let a = [];
			$(".cab1:checked").each(function(){
				a.push(this.value);
			});
		return a;
		})()
	//	alert(lockers);
		let JSON_lockers = JSON.stringify(lockers); 
		alert (JSON_lockers);
		$.ajax({
			url:"functions.php",
			type:"post",
		//	dataType :"application/json",
			data: {option: "cab1group",cab1_id:JSON_lockers},
			success: function(){
				console.log(lockers);
			},
			error: function(jqXHR, Status, exception) {
			console.debug(jqXHR);
			console.debug(Status);
			console.debug(exception);
			},
		});
		}


	function sleep(milliseconds){
		let start= new Date
		start.getTime();
		for (var i=0;i<1e7; i++){
			if ((new (Date) - start) > milliseconds){
				break;
			}
		}
}

	function ajaxOpenGroupCab1 (tobeopened) {
		let cab1_locker_id = tobeopened;
		console.log(cab1_locker_id);
		// $.ajax is a method providfed by jQuery
		$.ajax({
			url:"functions.php",
			type: "post",
			data: {option: "cab1group", cab1_id: cab1_locker_id},
			// success and error might not actually do anything in this context... leaving in for now
			success: function () {
			console.log('sent cab1 open request');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});

}
