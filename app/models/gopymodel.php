<?php 
	
	class gopymodel extends DModel{

		public function __construct(){
			parent:: __construct();
		}

		public function danhsach($table_kh, $table_gop_y, $table_sp,$table_nd, $cond){
			$sql = "SELECT * FROM $table_kh, $table_gop_y, $table_sp,$table_nd WHERE $cond ORDER BY $table_gop_y.magy DESC";
			return $this -> db ->select($sql);
		}

		public function list($table_kh, $table_nd, $table_gop_y, $cond){
			$sql = "SELECT * FROM $table_kh, $table_nd, $table_gop_y WHERE $cond ";
			return $this -> db ->select($sql);
		}

		public function gopymail($table, $data, $cond){
			return $this -> db -> update($table, $data, $cond);
		}
	}

 ?>
