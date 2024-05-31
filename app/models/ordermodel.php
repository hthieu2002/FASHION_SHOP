<?php 
	
	class ordermodel extends DModel{

		public function __construct(){
			parent:: __construct();
		}

		public function insert_order($table_order,$data_order){
			return $this -> db -> insert($table_order,$data_order);
		}

		public function insert_order_details($table_order_details,$data_details){
			return $this -> db -> insert($table_order_details,$data_details);
		}
		public function list_order($table1, $table2, $table3){
			$sql = "SELECT * FROM $table1 t1 INNER JOIN $table2 t2 ON t1.makh = t2.makh INNER JOIN $table3 t3 ON t3.makh = t2.makh";
			return $this -> db ->select($sql);
		}
		public function list_order_details($table_product,$table_order_details, $cond){
			$sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond ";
			return $this -> db ->select($sql);
		}
		public function list_info($table_order_details, $cond_info){
			$sql = "SELECT * FROM $table_order_details WHERE $cond_info LIMIT 1 ";
			return $this -> db ->select($sql);
		}
		public function order_confirm($table_order, $data , $cond){
			return $this -> db -> update($table_order, $data , $cond);
		}

		public function xacnhan($table, $data, $cond){
			return $this -> db -> update($table, $data , $cond);
		}

		public function khachhang($table_nguoidung, $table_khachhang, $table_donhang,$cond1){
			$sql = "SELECT * FROM $table_nguoidung, $table_khachhang, $table_donhang WHERE $cond1";
			return $this -> db ->select($sql);
		}
		public function sanpham($table_sanpham, $table_ctdonhang,$cond2){
			$sql = "SELECT * FROM $table_sanpham, $table_ctdonhang WHERE $cond2";
			return $this -> db ->select($sql);
		}

		public function nhanvien($table_nguoidung, $table_nhanvien,$table_donhang, $cond3){
			$sql = "SELECT * FROM $table_nguoidung, $table_nhanvien ,$table_donhang WHERE $cond3";
			return $this -> db ->select($sql);
		}

		public function xoa($table,$cond){
			return $this -> db -> delete($table, $cond);
		}
		public function thongtin($table, $tablend, $cond){
			$sql = "SELECT * FROM $table, $tablend WHERE $cond ";
			return $this -> db ->select($sql);
		}

		public function lichsu1($table_hd,$table_ct, $table_sp, $cond1){
			$sql = "SELECT $table_sp.anhsp 'anhsp', $table_hd.ngaylap 'ngaylap', $table_hd.noinhan 'noinhan',$table_ct.dongia 'tonggia', $table_hd.tinhtrang 'tinhtrang' , $table_hd.mahd 'mahd', $table_hd.makh 'makh', $table_sp.masp 'masp',$table_ct.soluongmua 'soluongmua', $table_ct.dongia 'dongia' FROM $table_hd,$table_ct, $table_sp WHERE $cond1 ";
			return $this -> db ->select($sql);
		}

		public function duyetdon($table,$data,$cond){
			return $this -> db -> update($table,$data,$cond);
		}
	}

 ?>