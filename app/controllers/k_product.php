<?php 
	class k_product extends DController
	{
	    public function __construct(){
			parent:: __construct();
		}

		public function sanpham(){
			Session::init();

			$Limit = 9;
			$Offset = 0;
			$table = 'san_pham';
			$table_cate = 'loai_san_pham';
			$cond = "$table.malsp = $table_cate.malsp";
			$model = $this -> load -> model('k_productmodel');

			$data['sanpham'] = $model -> list_pro($table,$table_cate, $cond, $Limit, $Offset);
			$data['count'] = $model -> list_number($table,$table_cate, $cond);
			$data['loaisp'] = $model -> danhmuc($table_cate);
			$this -> load -> view('header');
			$this -> load -> view('menu');
			$this -> load -> view('slide_product');
			$this -> load -> view('list_product', $data);
			$this -> load -> view('footer');
		}

		public function sanphamPage($id){
			Session::init();
			$id_tr = $id - 1 ;
			$Limit = 9;
			$Offset = 9 * $id_tr;
			$table = 'san_pham';
			$table_cate = 'loai_san_pham';
			$cond = "$table.malsp = $table_cate.malsp";
			$model = $this -> load -> model('k_productmodel');

			$data['sanpham'] = $model -> list_pro($table,$table_cate, $cond, $Limit, $Offset);
			$data['count'] = $model -> list_number($table,$table_cate, $cond);
			$data['loaisp'] = $model -> danhmuc($table_cate);

 			$this -> load -> view('header');
			$this -> load -> view('menu');
			$this -> load -> view('slide_product');
			$this -> load -> view('list_product', $data);
			$this -> load -> view('footer');
		}

		public function timkiem(){
			$loai = trim($_POST['loai']);
			$kichco = trim($_POST['kichco']);
			$gia = trim($_POST['gia']);

			$Limit = 9;
			$Offset = 0;
			$table = 'san_pham';
			$table_cate = 'loai_san_pham';
			$cond = "$table.malsp = $table_cate.malsp";
			$model = $this -> load -> model('k_productmodel');

			if($loai == "Chọn loại sản phẩm" ){
				$loaisp = "";
			}else{
				$loaisp = "AND $table_cate.tenlsp = N'$loai'";
			}
			if($kichco == "Chọn kích cỡ"){
				$kichcosp = "";
			}else{
				$kichcosp = "AND $table.kichco = $kichco";
			}
			if($gia == "Chọn giá tiền"){
				$dieukien = "AND $table.giakm > 0";
			}

			if($gia == 0){
				$dieukien = "AND 0 < $table.giakm < 100000";
			}
			if($gia == "A"){
				$dieukien = "AND 100000 < $table.giakm < 500000";
			}
			if($gia == "B"){
				$dieukien = "AND 500000 < $table.giakm < 1000000";
			}

			$data['sanpham'] = $model -> list_search($table,$table_cate, $cond, $Limit, $Offset, $loaisp, $kichcosp, $dieukien);
			$data['count'] = $model -> list_number_search($table,$table_cate, $cond, $loaisp, $kichcosp, $dieukien);
			$data['loaisp'] = $model -> danhmuc($table_cate);

			$this -> load -> view('header');
			$this -> load -> view('menu');
			$this -> load -> view('slide_product');
			$this -> load -> view('list_product', $data);
			$this -> load -> view('footer');
		}
	}
?>