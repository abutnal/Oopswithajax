<?php
require_once('database.php');

class CurdOperation extends Database{
	// Insert Method
		public function insert($table, $data){
			$sql = "";
			$sql .="INSERT INTO ".$table;
			$sql .=" (".implode(", ", array_keys($data)).") VALUES ";
			$sql .="('".implode("', '", array_values($data))."')";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

	//Update Method
		public function update($table, $data, $where){
			$sql="";
			$condition="";
			foreach ($data as $key => $value) {
				$sql .= $key.="='".$value."', ";
			}
				$sql = substr($sql, 0,-2);
			foreach ($where as $key => $value) {
			  	$condition .= $key."='".$value."' AND ";
			  }  
			  $condition = substr($condition, 0,-5);
			  $sql ="UPDATE ".$table." SET ".$sql." WHERE ".$condition;
			  $query = mysqli_query($this->con,$sql);
			  if ($query) {
			  	return true;
			  }
		} 

	// Select All records Method 
		public function select_all_records($table){
			$sql = "SELECT * FROM ".$table;
			$array = array();
			$query = mysqli_query($this->con,$sql);
			$html ="";
			$html .='<thead>';
			$html .='<th>SL</th>';
			$html .='<th>First Name</th>';
			$html .='<th>Last Name</th>';
			$html .='<th>Email</th>';
			$html .='<th>Action</th>';
			$html .='</thead>';
			if (mysqli_num_rows($query)>1) {
				while($row = mysqli_fetch_assoc($query)):
					$html .='<tr>';
					$html .='<td>'.$row['user_id'].'</td>';
					$html .='<td>'.$row['fname'].'</td>';
					$html .='<td>'.$row['lname'].'</td>';
					$html .='<td>'.$row['email'].'</td>';
					$html .='<td>
							<div id="action">	<a href="" data-id='.$row['user_id'].' id="update" class="btn btn-info btn-xs">Edit</a>
								<a href="" data-id='.$row['user_id'].' id="delete" class="btn btn-danger btn-xs">Delete</a>
								</div>
					</td>';
					$html .='</tr>';
				endwhile;
			 return json_encode(['status'=>'success', 'html'=>$html]);
			}
			else
			{
				$html .='<tr>';
				$html .='<td colspan="5">No record found</td>';
				$html .='</tr>';
			return json_encode(['status'=>'success', 'html'=>$html]);	
			}
		}

	// Select Where Method
		public function select_where($table,$where){
			$sql="";
			$condition="";
			$array = array();
			foreach ($where as $key => $value) {
				$condition .= $key."='".$value."' AND ";
			}
			$condition = substr($condition, 0,-5);
			$sql .="SELECT * FROM ".$table." WHERE ".$condition;
			$query = mysqli_query($this->con,$sql);
			while($row = mysqli_fetch_assoc($query)):
				$array[]=$row;
			endwhile;
			return $array;		
		}

	// Delete Method
		public function delete($table,$where){
			$sql="";
			$condition="";
			foreach ($where as $key => $value) {
				$condition .= $key."='".$value."' AND ";
			}
			$condition = substr($condition, 0,-5);
			$sql .= "DELETE FROM ".$table." WHERE ".$condition;
			$query = mysqli_query($this->con,$sql);
			if($query){
				return true;
			}
		}	
}
$obj = new CurdOperation;
