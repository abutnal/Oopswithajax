<?php
require_once('model.php');
// Insert New Records
if (isset($_POST['fname'])) {
	$data = $_POST;
	if($obj->insert('user_tbl',$data)){
		echo "Record inserted successfuly";
	}
}
// End New Insert Records

if (isset($_POST['updateRecord'])) {
	$data = $_POST;
	unset($data['updateRecord']);
	unset($data['user_id']);
	$where = ['user_id'=>$_POST['user_id']];
	if($obj->update('user_tbl',$data,$where)){
		echo "Updated successfuly";
	}
}

// Select All Records
if (isset($_GET['records'])) {
	$data = $obj->select_all_records('user_tbl');
	print_r($data);	
}
// End Select All Records


// Start Update and Delete Action
if (isset($_POST['actionName'])) {
	if ($_POST['actionName']=='update') {
		$where = ['user_id'=>$_POST['user_id']];
		$data = $obj->select_where('user_tbl',$where);
		foreach ($data as $row) {
		echo '<form action="controller.php" method="post" id="updateData">
								<div class="col-md-12">
									<input type="hidden" name="updateRecord" value="'.$row['user_id'].'">
									<input type="hidden" name="user_id" value="'.$row['user_id'].'">
									<input type="text" name="fname" value="'.$row['fname'].'" id="fname" placeholder="First Name" class="form-control"> </div>
									<div class="col-md-12">
										<input type="text" name="lname" value="'.$row['lname'].'" id="lanme" placeholder="Last Name" class="form-control">
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="email" id="email" value="'.$row['email'].'" placeholder="Email" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
									<a class="btn btn-defualt pull-left" id="cancel">Cancel</a>
										<input type="submit" name="submit" value="Update" class="btn btn-warning pull-right">
									</div>
							</form>  ';
	}
	}
	if($_POST['actionName']=='delete'){
		$where = ['user_id'=>$_POST['user_id']];
		if($obj->delete('user_tbl',$where)){
			echo "delete";
		}
	}
}
// End Update and Delete Action