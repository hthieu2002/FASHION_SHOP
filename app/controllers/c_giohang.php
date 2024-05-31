<?php 

	class c_giohang extends DController
	{
		public function __construct(){
			parent:: __construct();
		}

		public function tatcadonhang(){
			Session::init();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$nguoidung = "nguoi_dung";
			$khachhang = "khach_hang";
			$table_hd = 'hoa_don';
			
			$modell = $this -> load -> model('ordermodel');
			$data['order'] = $modell -> list_order($nguoidung, $khachhang, $table_hd);
			
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/order/order', $data);
			$this -> load -> view('cpanel/footer');
		}

		public function xacnhan($id){
			$manv = $_POST['manv'];

			$table = "hoa_don";
			$cond = "$table.mahd = $id";
			$data = array(
				'manv' => $manv	,
				'tinhtrang' => 1
			);
			$model = $this -> load -> model('ordermodel');
			$result = $model -> xacnhan($table, $data, $cond);

			if ($result == 1) {
	 			$message['msg'] = "Đã xác nhận";
	 			header('location:'.BASE_URL."c_giohang/tatcadonhang?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa xác nhận!";
	 			header('location:'.BASE_URL."c_giohang/tatcadonhang?msg=".urlencode(serialize($message)));
	 		}
		}

		public function chitietdonhang($id){
			Session::init();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$table_hd = "hoa_don";

			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";

			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

			$table_khachhang = "khach_hang";
			$table_nguoidung = "nguoi_dung";
			$table_nhanvien = "nhan_vien";
			$table_donhang = "hoa_don";
			$table_ctdonhang = "chi_tiet_hoa_don";
			$table_sanpham = "san_pham";
			$mahd = $id;

			$cond1 = "$table_nguoidung.makh = $table_khachhang.makh AND $table_khachhang.makh = $table_donhang.makh AND $table_donhang.mahd = $mahd";
			$cond2 = "$table_sanpham.masp = $table_ctdonhang.masp AND $table_ctdonhang.mahd = $mahd";
			$cond3 = "$table_nguoidung.manv = $table_nhanvien.manv AND $table_nhanvien.manv = $table_donhang.manv AND $table_donhang.mahd = $mahd";

			$model = $this -> load -> model('ordermodel');

			$data['khachhang'] = $model -> khachhang($table_nguoidung, $table_khachhang, $table_donhang, $cond1);
			$data['sanpham'] = $model -> sanpham($table_sanpham, $table_ctdonhang, $cond2);
			$data['nhanvien'] = $model -> nhanvien($table_nguoidung, $table_nhanvien,$table_donhang, $cond3);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/order/order_details', $data);
			$this -> load -> view('cpanel/footer');
		}

		public function in($id){
			$manv = $_POST['manv'];
			$tonggia = $_POST['gia'];
			$table = "hoa_don";
			$cond = "$table.mahd = $id";

			$data = array(
				'manv' => $manv	,
				'tonggia' => $tonggia,
				'tinhtrang' => 1
			);
			$model = $this -> load -> model('ordermodel');
			$result = $model -> xacnhan($table, $data, $cond);

			if ($result == 1) {
	 			$message['msg'] = "Đã xác nhận";
	 			header('location:'.BASE_URL."c_giohang/chitietdonhang/$id?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa xác nhận!";
	 			header('location:'.BASE_URL."c_giohang/chitietdonhang/$id?msg=".urlencode(serialize($message)));
	 		}
		}

		public function xoa($id){
			$table = "hoa_don";
			$cond = "$table.mahd = $id";
			$model = $this -> load -> model('ordermodel');

			$result = $model -> xoa($table, $cond);


			if ($result == 1) {
	 			$message['msg'] = "Đã xóa";
	 			header('location:'.BASE_URL."c_giohang/tatcadonhang?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa Xóa!";
	 			header('location:'.BASE_URL."c_giohang/tatcadonhang?msg=".urlencode(serialize($message)));
	 		}

		}

		public function xoact($id){
			$table = "chi_tiet_hoa_don";
			$cond = "$table.macthd = $id";
			$mahd = $_POST['mahd'];
			$model = $this -> load -> model('ordermodel');

			$result = $model -> xoa($table, $cond);
			
			if ($result == 1) {
	 			$message['msg'] = "Đã xóa";
	 			header('location:'.BASE_URL."c_giohang/chitietdonhang/$mahd?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa Xóa!";
	 			header('location:'.BASE_URL."c_giohang/chitietdonhang/$mahd?msg=".urlencode(serialize($message)));
	 		}

		}
		public function hoadon(){
			Session::init();

			$table_kh = "khach_hang";//
			$table_nd = "nguoi_dung";//
			$table_hd = "hoa_don";//

			$table_gy = "gop_y";
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";

			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);
			$data['hoadon'] = $model -> hoadon($table_nd, $table_kh, $table_hd, $cond1);
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/order/hoadon',$data);
			$this -> load -> view('cpanel/footer');
		}


	}

 ?>