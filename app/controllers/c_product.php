<?php 
	class c_product extends DController
	{
	    public function __construct(){
			parent:: __construct();
		}

		public function product(){
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

			$table = 'san_pham';
			$model = $this -> load -> model('c_productmodel');
			$data['product'] = $model -> product($table);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/list', $data);
			$this -> load -> view('cpanel/footer');
		}
		public function show($id){
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

			$danhmuc = 'loai_san_pham';
			$table = 'san_pham';
			$cond = "$table.masp = $id";
			$model = $this -> load -> model('c_productmodel');
			$data['product'] = $model -> show($table, $cond);
			$data['category'] = $model -> category($danhmuc);
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/show', $data);
			$this -> load -> view('cpanel/footer');
		}


		public function edit($id){
			Session::init();

		    $malsp = filter_input(INPUT_POST, 'loaisp');
		    $masp = filter_input(INPUT_POST, 'masp');
			$tensp = filter_input(INPUT_POST, 'tensp');
			$giasp = filter_input(INPUT_POST, 'giasp');
			$soluong = filter_input(INPUT_POST, 'soluong');
			$giakm = filter_input(INPUT_POST, 'giakm');
			$size = $_POST['size'];
			$mieuta = filter_input(INPUT_POST, 'mieuta');
			$noidung = filter_input(INPUT_POST, 'noidung');
			$ngaybdkm =  filter_input(INPUT_POST, 'nbdkm');
			$ngayktkm =  filter_input(INPUT_POST, 'nktkm');
			$hot = filter_input(INPUT_POST, 'tinhtrang');

			$image = $_FILES['image_staff']['name'];
	 		$tmp_image = $_FILES['image_staff']['tmp_name'];
	 		$div = explode('.', $image);
	 		$file_ext = strtolower(end($div));
	 		$unique_image = $div[0].time().'.'.$file_ext;
	 		$path_uploads ="public/uploads/product/".$unique_image;
			
	 		$sanpham = "san_pham";
			$cond = "$sanpham.masp = $id";
			$km = $giasp * (100 - $giakm) / 100; 
			if($soluong > 0){
				$tinhtrang = 0;
			}else{
				$tinhtrang = 1;
			}
			$model = $this -> load -> model('c_productmodel');
	 		if ($image) {

				$data['byid'] = $model -> byid($sanpham,$cond);
				foreach ($data['byid'] as $key => $value) {
					unlink("public/uploads/product/".$value['anhsp']);
				
				}
				
				$data = array(
	 			'masp' => $masp,
	 			'malsp' => $malsp,
	 			'tensp' => $tensp,
	 			'anhsp' => $unique_image,
	 			'giasp' => $giasp,
	 			'kichco' => $size,
	 			'soluong' => $soluong,
	 			'mieuta' => $mieuta,
	 			'noidung' => $noidung,
	 			'giakm' => $km,
	 			'ngaybd' => $ngaybdkm,
	 			'ngaykt' => $ngayktkm,
	 			'tinhtrang' => $tinhtrang,
	 			'hot' => $hot
	 			
	 			);
				$path_uploads ="public/uploads/product/".$unique_image;
	 			move_uploaded_file($tmp_image, $path_uploads);
			}else{
	 			$data = array(
	 			'masp' => $masp,
	 			'malsp' => $malsp,
	 			'tensp' => $tensp,
	 			'giasp' => $giasp,
	 			'kichco' => $size,
	 			'soluong' => $soluong,
	 			'mieuta' => $mieuta,
	 			'noidung' => $noidung,
	 			'giakm' => $km,
	 			'ngaybd' => $ngaybdkm,
	 			'ngaykt' => $ngayktkm,
	 			'tinhtrang' => $tinhtrang,
	 			'hot' => $hot
	 			);
			}

			$result = $model -> edit($sanpham , $data, $cond);

	 		if ($result == 1) {
	 			$message['msg'] = "Cập nhật thông tin thành công";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Cập nhật thông tin thất bại!";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
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

			$table = 'loai_san_pham';
			$model = $this -> load -> model('c_productmodel');
			$data['category'] = $model -> category($table);

			$this -> load -> view('cpanel/header',$data);
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/c_product/add_product',$data);
			$this -> load -> view('cpanel/footer');

		}

		public function insert(){
			Session::init();

		    $malsp = filter_input(INPUT_POST, 'loaisp');
		    $masp = filter_input(INPUT_POST, 'masp');
			$tensp = filter_input(INPUT_POST, 'tensp');
			$giasp = filter_input(INPUT_POST, 'giasp');
			$soluong = filter_input(INPUT_POST, 'soluong');
			$giakm = filter_input(INPUT_POST, 'giakm');
			$size = $_POST['size'];
			$mieuta = filter_input(INPUT_POST, 'mieuta');
			$noidung = filter_input(INPUT_POST, 'noidung');
			$ngaybdkm =  filter_input(INPUT_POST, 'nbdkm');
			$ngayktkm =  filter_input(INPUT_POST, 'nktkm');

			$hot = filter_input(INPUT_POST, 'tinhtrang');

			if($soluong > 0){
				$tinhtrang = 0;
			}else{
				$tinhtrang = 1;
			}
			$image = $_FILES['image_staff']['name'];
	 		$tmp_image = $_FILES['image_staff']['tmp_name'];
	 		$div = explode('.', $image);
	 		$file_ext = strtolower(end($div));
	 		$unique_image = $div[0].time().'.'.$file_ext;
	 		$path_uploads ="public/uploads/product/".$unique_image;
			
	 		$sanpham = "san_pham";
			$km = $giasp * (100 - $giakm) / 100;
			$model = $this -> load -> model('c_productmodel');
	 		
				$data = array(
	 			'masp' => $masp,
	 			'malsp' => $malsp,
	 			'tensp' => $tensp,
	 			'anhsp' => $unique_image,
	 			'giasp' => $giasp,
	 			'kichco' => $size,
	 			'soluong' => $soluong,
	 			'mieuta' => $mieuta,
	 			'noidung' => $noidung,
	 			'giakm' => $km,
	 			'ngaybd' => $ngaybdkm,
	 			'ngaykt' => $ngayktkm,
	 			'tinhtrang' => $tinhtrang,
	 			'hot' => $hot
	 			
	 			);
	 			$path_uploads ="public/uploads/product/".$unique_image;
	 			move_uploaded_file($tmp_image, $path_uploads);

			$result = $model -> add($sanpham , $data);

	 		if ($result == 1) {
	 			$message['msg'] = "Thêm thông tin thành công";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Thêm thông tin thất bại!";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
	 		}
		}
		public function delete($id){
			Session::init();
			$table = 'san_pham';
			$cond = "$table.masp = $id";
			$model = $this -> load -> model('c_productmodel');
			
			$data['byid'] = $model -> byid($table,$cond);
			foreach ($data['byid'] as $key => $value) {
				unlink("public/uploads/product/".$value['anhsp']);
			}
			$result = $model -> delete($table, $cond);
			if ($result == 1) {

	 			$message['msg'] = "Đã xóa thông tin";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Xóa thất bại!";
	 			header('location:'.BASE_URL."c_product/product?msg=".urlencode(serialize($message)));
	 		}
		}

		public function chitietsanpham($id){
			Session::init();
			
			$table = "san_pham";
			$table_cate = "loai_san_pham";
			$cond = "$table.malsp = $table_cate.malsp AND $table.masp = $id";

			$model = $this -> load -> model('k_productmodel');
			$data['category'] = $model -> cate($table_cate);
			$data['product'] = $model -> ctiet($table,$table_cate, $cond);
			foreach ($data['product'] as $key => $pro) {
				$idsp = $pro['malsp'];
			}

			$cond_re = "$table.malsp = $table_cate.malsp AND $table_cate.malsp = '$idsp' AND $table.masp NOT IN ('$id') ";
			$data['related'] = $model -> splienquan($table, $table_cate, $cond_re);
			$this -> load -> view('header');
			$this -> load -> view('menu');
			$this -> load -> view('slider');
			$this -> load -> view('details_product',$data);
			$this -> load -> view('footer',$data);
		}
	}
 ?>