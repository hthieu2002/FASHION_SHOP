<?php 
class adminmodel extends DModel{
	public function __construct(){
		parent:: __construct();
	}

	public function List_staff($nhanvien, $nguoidung, $cond){
		$sql = "SELECT * FROM $nhanvien, $nguoidung WHERE $cond ORDER BY $nhanvien.manv DESC";
		return $this -> db ->select($sql);
	}
	public function List_custom($khachhang, $nguoidung, $cond){
		$sql = "SELECT * FROM $khachhang, $nguoidung WHERE $cond ORDER BY $khachhang.makh DESC";
		return $this -> db ->select($sql);
	}

	public function staff_details($nhanvien, $nguoidung, $cond){
		$sql = "SELECT * FROM $nhanvien, $nguoidung WHERE $cond ORDER BY $nhanvien.manv DESC";
		return $this -> db ->select($sql);
	}
	public function custom_details($khachhang, $nguoidung, $cond){
		$sql = "SELECT * FROM $khachhang, $nguoidung WHERE $cond ORDER BY $khachhang.makh DESC";
		return $this -> db ->select($sql);
	}
	public function byid($table,$cond){
		$sql = "SELECT * FROM $table WHERE $cond";
		return $this -> db -> select($sql);
	}
	public function up_staff($table, $data, $cond){
		return $this -> db -> update($table, $data, $cond);	
	}
	public function delete($table, $cond){
		return $this -> db -> delete($table, $cond);
	}
	public function dangki1($table, $data){
		return $this -> db -> insert($table, $data);
	}
	public function dangki2($table, $data){
		return $this -> db -> insert($table, $data);
	}
	public function gop_y($table, $data){
		return $this -> db -> insert($table, $data);
	}
}
?>