<?php 
	class c_category extends DController
	{
	   public function __construct(){
			parent:: __construct();
		}

		public function category(){
			Session::init();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$table = 'loai_san_pham';
			$model = $this -> load -> model('c_productmodel');
			$data['category'] = $model -> category($table);
			
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/product', $data);
			$this -> load -> view('cpanel/footer');
		}
		public function delete($id){
			Session::init();
			$table = 'loai_san_pham';
			$cond = "$table.malsp = $id";
			$model = $this -> load -> model('c_productmodel');
			$result = $model -> delete($table, $cond);

			if ($result == 1) {
	 			$message['msg'] = "Đã xóa thông tin";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Xóa thất bại!";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}
		}

		public function add(){
			Session::init();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";

			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);
			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/add_category');
			$this -> load -> view('cpanel/footer');
		}
		public function add_category(){
			Session::init();

			$lsp = filter_input(INPUT_POST, 'lsp');
			$malsp = filter_input(INPUT_POST, 'malsp');

			$table = 'loai_san_pham';
			$model = $this -> load -> model('c_productmodel');

			$data = array(
				'malsp' => $malsp,
				'tenlsp' => $lsp
			);

			$result = $model -> add($table , $data);

			if ($result == 1) {
	 			$message['msg'] = "Đã thêm thông tin mới";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Thêm thất bại!";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}
		}
		public function edit($id){
			Session::init();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";

			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);
			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$table = "loai_san_pham";
			$cond = "$table.malsp = $id";
			$model = $this -> load -> model('c_productmodel');
			$data['category'] = $model -> show($table, $cond);
			//Session::checkSession();
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/edit_category', $data);
			$this -> load -> view('cpanel/footer');
		}

		public function edit_category($id){
			Session::init();
			
			$lsp = filter_input(INPUT_POST, 'lsp');

			$table = 'loai_san_pham';
			$cond = "$table.malsp = $id";
			$model = $this -> load -> model('c_productmodel');

			$data = array(
				'tenlsp' => $lsp
			);

			$result = $model -> edit($table , $data, $cond);

			if ($result == 1) {
	 			$message['msg'] = "Cập nhật thành công";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Cập nhật thất bại!";
	 			header('location:'.BASE_URL."c_category/category?msg=".urlencode(serialize($message)));
	 		}
		}
	}
 ?>