<?php 
	class login extends DController{ // kế thừa 
		
		public function __construct(){
			$data = array();
			$message = array();
			
			parent:: __construct();
		}
		public function index(){
		    $this -> login();
		}

		public function login(){
			 Session::init();
			if (Session::get("login_admin") == true) {
				header("location:".BASE_URL."login/dashboard1");
			}
			$this -> load -> view('cpanel/login');
		}
		public function login1(){
			 Session::init();
			if (Session::get("login_staff") == true) {
				header("location:".BASE_URL."login/dashboard2");
			}
			$this -> load -> view('cpanel/login');
		}
		public function dashboard1(){

			Session::checkSession1();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$table_sp = "san_pham";
			$table_hd = "hoa_don";//
			$table_ct = "chi_tiet_hoa_don";
			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			$cond3 = "$table_sp.masp = $table_ct.masp";
			$data['nguoidung'] = $model -> demnguoidung($table_kh);
			$data['sanpham'] = $model -> demsanpham($table_sp);
			$data['donhang'] = $model -> demdonhang($table_hd);
			$data['doanhthu'] = $model -> tongdoanhthu($table_hd);
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);
			$data['thongke'] = $model -> thongke($table_sp, $table_ct, $cond3);
			
			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/dashboard', $data);
			$this -> load -> view('cpanel/footerDashboard');
		}
		public function dashboard2(){

			Session::checkSession2();
			$table_kh = "khach_hang";
			$table_nd = "nguoi_dung";
			$table_gy = "gop_y";
			$table_sp = "san_pham";
			$table_ct = "chi_tiet_hoa_don";

			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gy.makh AND $table_gy.quatrinh = 0";
			$model = $this -> load -> model('loginmodel');

			$table_hd = "hoa_don";//
			$cond1 = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_hd.makh AND $table_hd.tinhtrang = 1";
			$cond3 = "$table_sp.masp = $table_ct.masp";
			$data['nguoidung'] = $model -> demnguoidung($table_kh);
			$data['sanpham'] = $model -> demsanpham($table_sp);
			$data['donhang'] = $model -> demdonhang($table_hd);
			$data['doanhthu'] = $model -> tongdoanhthu($table_hd);
			$data['thongke'] = $model -> thongke($table_sp, $table_ct, $cond3);
			
			$data['demhoadon'] = $model -> demhoadon($table_nd, $table_kh, $table_hd, $cond1);

			$data['dulieu'] = $model -> dulieu($table_nd, $table_kh, $table_gy, $cond);
			$data['dem'] = $model -> dem($table_nd, $table_kh, $table_gy, $cond);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu',$data);
			$this -> load -> view('cpanel/dashboard',$data);
			$this -> load -> view('cpanel/footerDashboard');
		}
		public function authentication(){
			 $username = $_POST['username'];
			 $password = md5($_POST['password']);
			 $table_admin = 'admin';
			 $table_staff = 'nhan_vien';
			 $nguoidung = "nguoi_dung";
			 $cond = "$table_admin.idadmin = $nguoidung.idadmin";
			 $cond_st = "$table_staff.manv = $nguoidung.manv";
			 $loginmodel = $this -> load -> model('loginmodel');
			 if(isset($_POST['admin'])){
			 $count = $loginmodel-> login($table_admin, $username,$password);
			 }else{
				$count = $loginmodel-> login_st($table_staff, $username,$password);
			 }
			 if($count==0){

			 	$message['msg'] = "username or password false! ";
			 	header("location:".BASE_URL."login");
			 } else{
			 	if(isset($_POST['admin'])){
			 		$reuslt = $loginmodel-> getlogin($table_admin,$nguoidung,$cond,$username,$password);
			 	Session::init();
			 	Session::set('login_admin', true);
			 	Session::set('name', $reuslt[0]['ten']);
			 	Session::set('image', $reuslt[0]['hinhanh']);
			 	Session::set('address', $reuslt[0]['diachi']);
			 	Session::set('email', $reuslt[0]['email']);
			 	Session::set('phone', $reuslt[0]['dienthoai']);
			 	Session::set('id', $reuslt[0]['idadmin']);
			 	header("location:".BASE_URL."login/dashboard1");
			 	}else{
			 		$reuslt = $loginmodel-> getlogin_st($table_staff,$nguoidung,$cond_st,$username,$password);
			 	Session::init();
			 	Session::set('login_staff', true);
			 	Session::set('name', $reuslt[0]['ten']);
			 	Session::set('image', $reuslt[0]['hinhanh']);
			 	Session::set('address', $reuslt[0]['diachi']);
			 	Session::set('email', $reuslt[0]['email']);
			 	Session::set('phone', $reuslt[0]['dienthoai']);
			 	Session::set('id', $reuslt[0]['manv']);
			 	header("location:".BASE_URL."login/dashboard2");
			 	}
			 	
			 	
			 }
		}
		public function logout(){
			Session::init();
			//Session::destroy();
			unset($_SESSION['login_admin']);
			header("location:".BASE_URL."login");
		}
		public function logout1(){
			Session::init();
			//Session::destroy();
			unset($_SESSION['login_staff']);
			header("location:".BASE_URL."login/login1");
		}
	}
 ?>