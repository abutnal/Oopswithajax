<?php
class Database{
	public $con;
	public function __construct(){
		$this->con = mysqli_connect("localhost","root","","practice");
		if (!$this->con) {
			die("failed to connect DB").mysqli_errors();
		}
	}
}
$obj = new Database;