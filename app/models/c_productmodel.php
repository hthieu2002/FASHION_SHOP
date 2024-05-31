<?php 
	class c_productmodel extends DModel
	{
	   public function __construct(){
		parent:: __construct();
		}

		public function category($table){
			$sql = "SELECT * FROM $table ORDER BY $table.malsp ";
			return $this -> db ->select($sql);
		}
		public function product($table){
			$sql = "SELECT * FROM $table ORDER BY $table.masp ";
			return $this -> db ->select($sql);
		}

		public function delete($table , $cond){
			return $this -> db -> delete($table, $cond);
		}
		public function add($table , $data){
			return $this -> db -> insert($table, $data);
		}
		public function show($table, $cond){
			$sql = "SELECT * FROM $table WHERE $cond";
			return $this -> db ->select($sql);
		}
		public function edit($table, $data, $cond){
			return $this -> db -> update($table, $data, $cond);
		}
		public function byid($table,$cond){
		$sql = "SELECT * FROM $table WHERE $cond";
		return $this -> db -> select($sql);
		}
	}
 ?>