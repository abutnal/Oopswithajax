<?php
require_once('model.php');
if (isset($_POST['fname'])) {
	$data = $_POST;
	if($obj->insert('user_tbl',$data)){
		echo "Record inserted successfuly";
	}
}

if (isset($_GET['records'])) {
	$data = $obj->select_all_records('user_tbl');
	print_r($data);	
}

