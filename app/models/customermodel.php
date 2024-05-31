<?php 
	
class customermodel extends DModel{

	public function __construct(){
			parent:: __construct();
	}
	public function insertcustomer($table_customer , $data){
		return $this -> db -> insert($table_customer , $data);
	}
	public function login($table_customer, $username,$password){
		$sql = "SELECT * FROM $table_customer WHERE costomer_email = ? AND costomer_password = ? ";
		return $this -> db ->affectedRows($sql, $username, $password);
	}
	public function getlogin($table_customer, $username,$password){
		$sql = "SELECT * FROM $table_customer WHERE costomer_email = ? AND costomer_password = ? ";
		return $this -> db ->selectUser($sql, $username, $password);
	}
}

 ?>

	