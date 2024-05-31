<?php 

	class admin extends DController
	{

	    public function __construct()
	    {
	        parent:: __construct();
	    }

	    public function staff(){
	    	Session:: init();
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
			$this -> load -> view('cpanel/form/add_staff');
			$this -> load -> view('cpanel/footer');
	    }
	    public function add_staff(){
	    	//Session:: init();
	    	$nguoidung = "nguoi_dung";
	    	$nhanvien = "nhan_vien";

	    	$manv = $_POST['manv'];
	    	$mand = $_POST['mand'];
			$model = $this -> load -> model('adminmodel');
			$ho = filter_input(INPUT_POST, 'ho');
			$ten = filter_input(INPUT_POST, 'ten');
			$diachi = filter_input(INPUT_POST, 'diachi');
		    $email = filter_input(INPUT_POST, 'email');
			$dienthoai = filter_input(INPUT_POST, 'sdt');
			$taikhoan = filter_input(INPUT_POST, 'taikhoan');
			$matkhau = filter_input(INPUT_POST, 'matkhau');

	 		$image = $_FILES['image_staff']['name'];
	 		$tmp_image = $_FILES['image_staff']['tmp_name'];
	 		$div = explode('.', $image);
	 		$file_ext = strtolower(end($div));
	 		$unique_image = $div[0].time().'.'.$file_ext;
	 		$path_uploads ="public/uploads/admin/".$unique_image;

	 		$name = $ho.$ten;
			if($diachi == null){
				$diachi = 'Chưa cập nhật';
			}
			if($name == null){
				$name = 'Chưa cập nhật';
			}
				$data1 = array(
	 			'manv' => $manv,
	 			'tai_khoan_nv' => $taikhoan,
	 			'mat_khau' => md5($matkhau)	
	 			);
	 		$result1 = $model -> dangki1($nhanvien , $data1);
	 		if($result1 == 1){
	 			$data2 = array(
	 			'mand' => $mand,
	 			'ten' => $name,
	 			'hinhanh' => $unique_image,
	 			'diachi' => $diachi,
	 			'email' => $email,
	 			'dienthoai' => $dienthoai,
	 			'manv' => $manv	
	 			);
	 		$result2 = $model -> dangki2($nguoidung , $data2);

	 		}
	 			
	 		if ($result2 == 1) {

	 			move_uploaded_file($tmp_image, $path_uploads);
	 			$message['msg'] = "Đã đăng kí";
	 			header('location:'.BASE_URL."admin/list_staff?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa thể đăng kí!";
	 			header('location:'.BASE_URL."admin/list_staff?msg=".urlencode(serialize($message)));
	 		}
		}
	    public function list_staff(){
	    	Session:: init();
	    	$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$nhanvien = "nhan_vien";
			$nguoidung = "nguoi_dung";
			$cond = "$nhanvien.manv = $nguoidung.manv";
			$admin = $this -> load -> model('adminmodel');
			$data['staff'] = $admin -> List_staff($nhanvien, $nguoidung, $cond);
			
			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";

			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

	    	$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/staff', $data);
			$this -> load -> view('cpanel/footer');
	    }

	    public function staff_details($id){
	    	Session:: init();
	    	$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

	    	$nhanvien = "nhan_vien";
			$nguoidung = "nguoi_dung";
			$cond = "$nhanvien.manv = $nguoidung.manv and $nhanvien.manv = '$id'";
			$admin = $this -> load -> model('adminmodel');
			$data['staff_details'] = $admin -> staff_details($nhanvien, $nguoidung, $cond);
			//Session::checkSession();
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/form/staff', $data);
			$this -> load -> view('cpanel/footer');
		}
		public function up_staff($id){
			Session:: init();
			$nguoidung = "nguoi_dung";
			$cond = "$nguoidung.mand = $id";
			$id_nv = $_POST['idnv'];
			$model = $this -> load -> model('adminmodel');

			$ten = filter_input(INPUT_POST, 'ten');
			$diachi = filter_input(INPUT_POST, 'diachi');
			$email = filter_input(INPUT_POST, 'email');
			$dienthoai = filter_input(INPUT_POST, 'sdt');

	 		$image = $_FILES['image_staff']['name'];
	 		$tmp_image = $_FILES['image_staff']['tmp_name'];
	 		$div = explode('.', $image);
	 		$file_ext = strtolower(end($div));
	 		$unique_image = $div[0].time().'.'.$file_ext;
	 		
			if ($image) {

				$data['byid'] = $model -> byid($nguoidung,$cond);
				foreach ($data['byid'] as $key => $value) {
					unlink("public/uploads/admin/".$value['hinhanh']);
				
				}
				
				$data = array(
	 			'ten' => $ten,
	 			'hinhanh' => $unique_image,
	 			'diachi' => $diachi,
	 			'email' => $email,
	 			'dienthoai' => $dienthoai
	 			
	 			);
				$path_uploads ="public/uploads/admin/".$unique_image;
	 			move_uploaded_file($tmp_image, $path_uploads);
			}else{
	 			$data = array(
	 			'ten' => $ten,
	 			'diachi' => $diachi,
	 			'email' => $email,
	 			'dienthoai' => $dienthoai
	 			);
			}

	 		$result = $model -> up_staff($nguoidung , $data, $cond);

	 		if ($result == 1) {
	 			$message['msg'] = "Cập nhật thông tin thành công";
	 			header('location:'.BASE_URL."admin/staff_details/$id_nv?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Cập nhật thông tin thất bại!";
	 			header('location:'.BASE_URL."admin/staff_details/$id_nv?msg=".urlencode(serialize($message)));
	 		}
		}
		public function delete_staff($id){
			$table = "nhan_vien";
			$cond = "$table.manv = $id";
			$model = $this -> load -> model('adminmodel');
			$table_nd = "nguoi_dung";
			$cond_nd = "$table_nd.manv = $id";
			$data['byid'] = $model -> byid($table_nd,$cond_nd);
				foreach ($data['byid'] as $key => $value) {
					unlink("public/uploads/admin/".$value['hinhanh']);
				
				}
			$result = $model -> delete($table,$cond);
			if ($result == 1) {
	 			$message['msg'] = "Xóa thông tin thành công";
	 			header('location:'.BASE_URL."admin/list_staff?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Xóa thông tin thất bại!";
	 			header('location:'.BASE_URL."admin/list_staff?msg=".urlencode(serialize($message)));
	 		}
		}
		 public function list_custom(){
	    	Session:: init();
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

			$khachhang = "khach_hang";
			$nguoidung = "nguoi_dung";
			$cond = "$khachhang.makh = $nguoidung.makh";
			$admin = $this -> load -> model('adminmodel');
			$data['custom'] = $admin -> List_custom($khachhang, $nguoidung, $cond);

	    	$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/custom', $data);
			$this -> load -> view('cpanel/footer');
	    }

	     public function custom_details($id){
	    	Session:: init();
	    	$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";

			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";

			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

	    	$khachhang = "khach_hang";
			$nguoidung = "nguoi_dung";
			$cond = "$khachhang.makh = $nguoidung.makh and $khachhang.makh = '$id'";
			$admin = $this -> load -> model('adminmodel');
			$data['custom_details'] = $admin -> custom_details($khachhang, $nguoidung, $cond);
			//Session::checkSession();
			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/form/custom', $data);
			$this -> load -> view('cpanel/footer');
		}
		public function up_custom($id){
			Session:: init();
			$nguoidung = "nguoi_dung";
			$cond = "$nguoidung.mand = $id";
			$id_nv = $_POST['idnv'];
			$model = $this -> load -> model('adminmodel');

			$ten = filter_input(INPUT_POST, 'ten');
			$diachi = filter_input(INPUT_POST, 'diachi');
			$email = filter_input(INPUT_POST, 'email');
			$dienthoai = filter_input(INPUT_POST, 'sdt');

	 		$image = $_FILES['image_staff']['name'];
	 		$tmp_image = $_FILES['image_staff']['tmp_name'];
	 		$div = explode('.', $image);
	 		$file_ext = strtolower(end($div));
	 		$unique_image = $div[0].time().'.'.$file_ext;
	 		
			if ($image) {

				$data['byid'] = $model -> byid($nguoidung,$cond);
				foreach ($data['byid'] as $key => $value) {
					unlink("public/uploads/admin/".$value['hinhanh']);
				
				}
				
				$data = array(
	 			'ten' => $ten,
	 			'hinhanh' => $unique_image,
	 			'diachi' => $diachi,
	 			'email' => $email,
	 			'dienthoai' => $dienthoai
	 			
	 			);
				$path_uploads ="public/uploads/admin/".$unique_image;
	 			move_uploaded_file($tmp_image, $path_uploads);
			}else{
	 			$data = array(
	 			'ten' => $ten,
	 			'diachi' => $diachi,
	 			'email' => $email,
	 			'dienthoai' => $dienthoai
	 			);
			}

	 		$result = $model -> up_staff($nguoidung , $data, $cond);

	 		if ($result == 1) {
	 			$message['msg'] = "Cập nhật thông tin thành công";
	 			header('location:'.BASE_URL."admin/custom_details/$id_nv?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Cập nhật thông tin thất bại!";
	 			header('location:'.BASE_URL."admin/custom_details/$id_nv?msg=".urlencode(serialize($message)));
	 		}
		}
		public function delete_custom($id){
			$table = "khach_hang";
			$cond = "$table.makh = $id";
			$model = $this -> load -> model('adminmodel');
			$table_nd = "nguoi_dung";
			$cond_nd = "$table_nd.makh = $id";
			$data['byid'] = $model -> byid($table_nd,$cond_nd);
				foreach ($data['byid'] as $key => $value) {
					unlink("public/uploads/product/".$value['hinhanh']);
				
				}
			$result = $model -> delete($table,$cond);
			if ($result == 1) {
	 			$message['msg'] = "Xóa thông tin thành công";
	 			header('location:'.BASE_URL."admin/list_custom?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Xóa thông tin thất bại!";
	 			header('location:'.BASE_URL."admin/list_custom?msg=".urlencode(serialize($message)));
	 		}
		}
	}

 ?>