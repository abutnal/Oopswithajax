<?php
require_once('database.php');
class CurdOperation extends Database{
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
					<input type="text" name="user_id" id="user_id" value="'.$row['user_id'].'">
					<a href="" id="update" class="btn btn-primary btn-xs">Edit</a>
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
}
$obj = new CurdOperation;
