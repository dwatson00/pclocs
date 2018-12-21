<?php
$option = '';
$id = '';
function OpenAll() {
	echo ('Opening all doors...');
	shell_exec("python /var/www/html/pclocs.gnlc.local/public_html/open_all_locker.py & python /var/www/html/pclocs.gnlc.local/public_html/open_all_locker2.py &");
}
function OpenSpecific_Cab1() {
	global $id;
	$locker_id = $id;
	$locker_id--;
	shell_exec("python /var/www/html/pclocs.gnlc.local/public_html/open_specific_cab1.py " . escapeshellarg(json_encode($locker_id)));
}
function OpenSpecific_Cab2() {
	global $id;
	$locker_id = $id;
	$locker_id--;
	shell_exec("python /var/www/html/pclocs.gnlc.local/public_html/open_specific_cab2.py " . escapeshellarg(json_encode($locker_id)));
}

function OpenGroup_Cab1(){
	global $id;
	$lockerid = $id;
	shell_exec("python /var/www/html/pclocs.gnlc.local/public_html/open_group_cab1.py " . escapeshellarg(json_encode($locker_id)));
}


$option = isset($_POST['option']) ? $_POST['option'] : "";
if($option == "openall"){
	OpenAll();
}elseif($option == "cab1"){
	$id = isset($_POST['cab1_id']) ? $_POST['cab1_id'] : "";
	OpenSpecific_Cab1();
}elseif($option == "cab2"){
	$id = isset($_POST['cab2_id']) ? $_POST['cab2_id'] : "";
	OpenSpecific_Cab2();
}elseif($option =="cab1group"){
	$id = isset($_POST['cab1_id']) ? $_POST['cab1_id']: "";
	OpenGroup_cab1();
}

/*
if(isset($_POST['option'])){
	$option = isset($_POST['option']) ? $_POST['option'] : "";
	OpenAll();
}elseif(isset($_POST['cab1'])){
	$option = isset($_POST['cab1']) ? $_POST['cab1'] : "";
	OpenSpecific_Cab1();
}elseif(isset($_POST['cab2])){
	$option = isset($_POST['cab2']) ? $_POST['cab2'] : "";
	OpenSpecific_Cab2();
}

----
if($option == "openall"){
	OpenAll();
}elseif(is_numeric($option)){
	OpenSpecific_Cab1();
}

$option = isset($_POST['cab1']) ? $_POST['cab1'] : "";
if(is_numeric($option)){
	OpenSpecific_Cab1();
}
*/
