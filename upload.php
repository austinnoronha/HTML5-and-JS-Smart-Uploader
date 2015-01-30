<?php
error_reporting(0);
$uploads_dir = './uploads/';
if($_FILES["upldfile"]["error"]  == UPLOAD_ERR_OK){
	$name = $_FILES["upldfile"]["name"];
	$name = strtolower($name);
	
	
	$tmp_file_info = pathinfo($name);
	$tmp_new_name = $tmp_file_info["filename"];
	$tmp_new_name = preg_replace("#[^a-z0-9\.]#i","_",$tmp_new_name);
	$name = $tmp_new_name . "_" . time() . "." . $tmp_file_info["extension"];
	
	$tmp_name = $_FILES["upldfile"]["tmp_name"];
	
	if( move_uploaded_file($tmp_name, $uploads_dir . $name ) ){
		die("File uploaded successfully");
	}else{
		die("File could not be uploaded now, please try later");
	}
}
die("File is invalid: ".$_FILES["upldfile"]["error"]);
?>