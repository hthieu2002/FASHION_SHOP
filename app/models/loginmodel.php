<?php 
	
class loginmodel extends DModel{

	public function __construct(){
			parent:: __construct();
	}

	public function login($table_admin, $username,$password){
		$sql = "SELECT * FROM $table_admin WHERE tai_khoan_ad = ? AND mat_khau = ? ";
		return $this -> db ->affectedRows($sql, $username, $password);
	}
	public function getlogin($table_admin,$nguoidung,$cond, $username,$password){
		$sql = "SELECT * FROM $table_admin,$nguoidung WHERE $cond AND tai_khoan_ad = ? AND mat_khau = ? ";
		return $this -> db ->selectUser($sql, $username, $password);
	}
	public function login_st($table_nhanvien, $username,$password){
		$sql = "SELECT * FROM $table_nhanvien WHERE tai_khoan_nv = ? AND mat_khau = ? ";
		return $this -> db ->affectedRows($sql, $username, $password);
	}
	public function getlogin_st($table_nhanvien,$nhanvien,$cond, $username,$password){
		$sql = "SELECT * FROM $table_nhanvien,$nhanvien WHERE $cond AND tai_khoan_nv = ? AND mat_khau = ? ";
		return $this -> db ->selectUser($sql, $username, $password);
	}

	public function login_kh($table_admin, $username,$password){
		$sql = "SELECT * FROM $table_admin WHERE tai_khoan_kh = ? AND mat_khau = ? ";
		return $this -> db ->affectedRows($sql, $username, $password);
	}
	public function getlogin_kh($table_admin,$nguoidung,$cond, $username,$password){
		$sql = "SELECT * FROM $table_admin,$nguoidung WHERE $cond AND tai_khoan_kh = ? AND mat_khau = ? ";
		return $this -> db ->selectUser($sql, $username, $password);
	}

	public function byid($table,$table_nd,$cond){
		$sql = "SELECT * FROM $table, $table_nd WHERE $cond";
		return $this -> db -> select($sql);
	}
	public function edit($table, $data, $cond){
			return $this -> db -> update($table, $data, $cond);
	}
	public function dangky($table, $data){
		return $this -> db -> insert($table, $data);
	}
	public function dulieu($table_nd, $table_kh, $table_gy, $cond){
		$sql = "SELECT * FROM $table_nd, $table_kh, $table_gy WHERE $cond ";
		return $this -> db -> select($sql);
	}
	public function dem($table_nd, $table_kh, $table_gy, $cond){
		$sql = "SELECT *,COUNT('magy') 'dem' FROM $table_nd, $table_kh, $table_gy WHERE $cond ";
		return $this -> db -> select($sql);
	}

	public function hoadon($table_nd, $table_kh, $table_hd, $cond1){
		$sql = "SELECT * FROM $table_nd, $table_kh, $table_hd WHERE $cond1 ";
		return $this -> db -> select($sql);
	}


	public function demhoadon($table_nd, $table_kh, $table_hd, $cond1){
		$sql = "SELECT *,COUNT('mahd') 'mahd' FROM $table_nd, $table_kh, $table_hd WHERE $cond1 ";
		return $this -> db -> select($sql);
	}
	public function demnguoidung($table){
		$sql = "SELECT *,COUNT('makh') 'slmakh' FROM $table";
		return $this -> db -> select($sql);
	}
	public function demsanpham($table){
		$sql = "SELECT *,COUNT('masp') 'masp' FROM $table";
		return $this -> db -> select($sql);
	}
	public function demdonhang($table){
		$sql = "SELECT *,COUNT('mahd') 'mahd' FROM $table";
		return $this -> db -> select($sql);
	}
	public function tongdoanhthu($table){
		$sql = "SELECT SUM(tonggia) 'tonggia' FROM $table";
		return $this -> db -> select($sql);
	}
	public function thongke($table1, $table2, $cond){
		$sql = "SELECT $table1.masp 'tensp',$table1.tensp 'ten', $table1.soluong 'soluong', SUM($table2.soluongmua) 'soluongmua' FROM $table1, $table2 WHERE $cond GROUP BY $table1.tensp ORDER BY $table2.soluongmua DESC LIMIT 7";
		return $this -> db -> select($sql);
	}
	
}

 ?>

	