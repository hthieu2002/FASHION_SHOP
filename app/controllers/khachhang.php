<?php 
   include "PHPMailer/PHPMailer/src/PHPMailer.php";
   include "PHPMailer/PHPMailer/src/Exception.php";
   include "PHPMailer/PHPMailer/src/OAuth.php";
   include "PHPMailer/PHPMailer/src/POP3.php";
   include "PHPMailer/PHPMailer/src/SMTP.php";
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   class khachhang extends DController{ // kế thừa 
   	
   	public function __construct(){
   		$data = array();
   		parent:: __construct();
   	}
   	public function index(){
   
   	    $this -> khachhang();
   	}
   
   	public function lichsudonhang(){
   		
   	}
   	public function dangxuat(){	
   		Session::init();
   		Session::destroy();
   		header('location:'.BASE_URL."khachhang/dangnhap");
   	}
   
   	public function insert_dangky(){
   		$name = $_POST['name'];
    		$email = $_POST['email'];
    		$phone = $_POST['phone'];
    		$address = $_POST['address'];
    		$password = $_POST['password'];
    		
   
    		$table_customer = "tbl_costomers";
    		$data = array(
    			'costomer_name' => $name,
    			'costomer_email' => $email,
    			'costomer_phone' => $phone,
    			'costomer_address' => $address,
    			'costomer_password' => md5($password)
    			
    		);
   
    		$customermodel = $this -> load -> model('customermodel');
   
    		$result = $customermodel -> insertcustomer($table_customer , $data);
   
    		if ($result == 1) {
    			$message['msg'] = "Đăng ký thành công";
    			header('location:'.BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
    		}else{
    			$message['msg'] = "Đăng ký thất bại!";
    			header('location:'.BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
    		}
   	}
   	
   	public function dangnhap(){
   
   		$this -> load -> view('login');
   		
   	}
   
   	public function dangky(){
   		$this -> load -> view('register');
   	}
   	public function authentication(){
   		 $username = $_POST['name'];
   		 $password = md5($_POST['password']);
   		 $table_kh = 'khach_hang';
   		 
   		 $nguoidung = "nguoi_dung";
   		 $cond = "$table_kh.makh = $nguoidung.makh";
   		
   		 $loginmodel = $this -> load -> model('loginmodel');
   		 
   		 $count = $loginmodel-> login_kh($table_kh, $username,$password);
   		 
   		 if($count==0){
   
   		 	$message['msg'] = "username or password false! ";
   		 	header("location:".BASE_URL."khachhang/dangnhap");
   		 } else{
   		 		$reuslt = $loginmodel-> getlogin_kh($table_kh,$nguoidung,$cond,$username,$password);
   		 	Session::init();
   		 	Session::set('login_user', true);
   		 	Session::set('name_user', $reuslt[0]['ten']);
   		 	Session::set('image_user', $reuslt[0]['hinhanh']);
   		 	Session::set('address_user', $reuslt[0]['diachi']);
   		 	Session::set('email_user', $reuslt[0]['email']);
   		 	Session::set('phone_user', $reuslt[0]['dienthoai']);
   		 	Session::set('taikhoan_user', $reuslt[0]['tai_khoan_kh']);
   		 	Session::set('id_user', $reuslt[0]['makh']);
   		 	header("location:".BASE_URL."index");
   		 	
   		 	}	
   		}
   
   		public function logout(){
   		Session::init();
   		//Session::destroy();
   		unset($_SESSION['login_user']);
   		header("location:".BASE_URL);
   		}
   
   		public function capnhat($id){
   			Session::init();
   	
   
   	    $name = filter_input(INPUT_POST, 'name');
   	    $email = filter_input(INPUT_POST, 'email');
   		$phone = filter_input(INPUT_POST, 'phone');
   		$address = filter_input(INPUT_POST, 'address');
   
   		$image = $_FILES['image_staff']['name'];
    		$tmp_image = $_FILES['image_staff']['tmp_name'];
    		$div = explode('.', $image);
    		$file_ext = strtolower(end($div));
    		$unique_image = $div[0].time().'.'.$file_ext;
    		$path_uploads ="public/uploads/admin/".$unique_image;
   		
    		$khachhang = "khach_hang";
    		$nguoidung = "nguoi_dung";
   		$cond = "$khachhang.makh = $nguoidung.makh AND $khachhang.makh = $id";
   		$cond_nd = "$nguoidung.makh = $id";
   		$cond1 = "$khachhang.makh = $id";
   		$matkhau = trim($_POST['matkhau']);
   
   		$model = $this -> load -> model('loginmodel');
   		if(isset($_POST['doithongtin'])){
   			if ($image) {
   
   			$data['byid'] = $model -> byid($khachhang,$nguoidung,$cond);
   			foreach ($data['byid'] as $key => $value) {
   				unlink("public/uploads/admin/".$value['anhsp']);
   			
   			}
   			
   			$data = array(
    			'ten' => $name,
    			'hinhanh' => $unique_image,
    			'diachi' => $address,
    			'email' => $email,
    			'dienthoai' => $phone
    			
    			);
   			$path_uploads ="public/uploads/admin/".$unique_image;
    			move_uploaded_file($tmp_image, $path_uploads);
   		}else{
    			$data = array(
    			'ten' => $name,
    			'diachi' => $address,
    			'email' => $email,
    			'dienthoai' => $phone
    			);
   		}
   
   		$result = $model -> edit($nguoidung, $data, $cond_nd);
   
    		if ($result == 1) {
    			$message['msg'] = "Cập nhật thông tin thành công";
    			header('location:'.BASE_URL."giohang/thongtin/$id?msg=".urlencode(serialize($message)));
    		}else{
    			$message['msg'] = "Cập nhật thông tin thất bại!";
    			header('location:'.BASE_URL."giohang/thongtin/$id?msg=".urlencode(serialize($message)));
    		}
    	}else{
    		if($matkhau == ""){
    			$message['mes'] = "Đổi không thành công";
   	 		header('location:'.BASE_URL."giohang/thongtin/$id?mes=".urlencode(serialize($message)));
    		}else{
    			$data = array(
   			'mat_khau' => md5($matkhau)
   		);
   
   		$result = $model -> edit($khachhang, $data, $cond1);
   
   		if($result){
   			$message['mes'] = "Đã đổi mật khẩu";
   	 		header('location:'.BASE_URL."giohang/thongtin/$id?mes=".urlencode(serialize($message)));
    		}else{
    			$message['mes'] = "lỗi! ";
   	 		header('location:'.BASE_URL."giohang/thongtin/$id?mes=".urlencode(serialize($message)));
    		}
    		}
    	}
   	}
   
   	public function taotaikhoan(){
   		$name = trim(filter_input(INPUT_POST, 'name'));
   		$taikhoan = trim(filter_input(INPUT_POST, 'taikhoan'));
   		$password = filter_input(INPUT_POST, 'confirm-password');
   		$makh = rand(1000,9999);
   		$mand = rand(1000,9999);
   
   		$table1= "khach_hang";
   		$table2 = "nguoi_dung";
   
   		$model = $this -> load -> model('loginmodel');
   		$data_1 = array(
   			'makh' => $makh,
   			'tai_khoan_kh' => $taikhoan,
   			'mat_khau' => md5($password)
   		);
   		$result1 = $model -> dangky($table1, $data_1);
   
   		$data2 = array(
   			'mand' => $mand,
   			'ten' => $name,
   			'hinhanh' => "macdinh.jpg",
   			'diachi' => "Chưa cập nhật",
   			'email' => "a@gmail.com",
   			'dienthoai' => "0",
   			'makh' => $makh
   		);
   
   		$result2 = $model -> dangky($table2, $data2);
   
   		if ($result2 == 1) {
    			$message['msg'] = "Đăng ký thành công";
    			header('location:'.BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
    		}else{
    			$message['msg'] = "Đăng ký thất bại!";
    			header('location:'.BASE_URL."khachhang/dangky?msg=".urlencode(serialize($message)));
    		}
   	}
   
   	public function img($id){
   		Session::init();
   
   		$image = $_FILES['image_staff']['name'];
    		$tmp_image = $_FILES['image_staff']['tmp_name'];
    		$div = explode('.', $image);
    		$file_ext = strtolower(end($div));
    		$unique_image = $div[0].time().'.'.$file_ext;
    		$path_uploads ="public/uploads/admin/".$unique_image;
   
    		$khachhang = "khach_hang";
    		$nguoidung = "nguoi_dung";
   		$cond = "$khachhang.makh = $nguoidung.makh AND $khachhang.makh = $id";
   		$cond_nd = "$nguoidung.makh = $id";
   
   		$data['byid'] = $model -> byid($khachhang,$nguoidung,$cond);
   		foreach ($data['byid'] as $key => $value) {
   			unlink("public/uploads/admin/".$value['anhsp']);
   		}
   		$data = array(
   			'hinhanh' => $unique_image
   		);
   
   		$path_uploads ="public/uploads/admin/".$unique_image;
    			move_uploaded_file($tmp_image, $path_uploads);
   
    		$result = $model -> edit($nguoidung, $data, $cond_nd);
   
    		if ($result == 1) {
    			$message['msg'] = "Thay đổi ảnh đại diện thành công";
    			header('location:'.BASE_URL."giohang/thongtin/$id?msg=".urlencode(serialize($message)));
    		}else{
    			$message['msg'] = "Thay đổi ảnh đại diện thất bại!";
    			header('location:'.BASE_URL."giohang/thongtin/$id?msg=".urlencode(serialize($message)));
    		}
   	}
   
   	public function phanhoi(){
   		Session::init();
   
   		$table = "gop_y";
   		$model = $this -> load -> model('adminmodel');
   
   		$masp = $_POST['masp'];
   		$makh = $_POST['makh'];
   		$noidung = $_POST['text'];
   		
   		$magy = rand(1000,99999);
   		
   		date_default_timezone_set('asia/ho_chi_minh');
   		$date = date("Y-m-d");
   		$hour = date("H:m:s");
   		$thoigian = $date.$hour;
   
   		$data = array(
   			'magy' => $magy,
   			'masp' => $masp,
   			'makh' => $makh,
   			'ngay' => $date.' '.$hour,
   			'noidunggy' => $noidung,
   			'quatrinh' => 0
   		);
   		$result = $model -> gop_y($table,$data);
   
   		if($result){
   			$message['mess'] = "Cảm ơn bạn đã đóng góp ý kiến ";
   	 		header('location:'.BASE_URL."?mess=".urlencode(serialize($message)));
    		}else{
    			$message['mess'] = "lỗi! ";
   	 		header('location:'.BASE_URL."?mess=".urlencode(serialize($message)));
    			}
    		
   	}
   
   	public function duyetdon($id){
   		Session::init();
   
   		$table = "hoa_don";
   		$cond = "$table.mahd = $id";
   		$makh = $_POST['idkh'];
   		$model = $this -> load -> model('ordermodel');
   
   		$data = array(
   			'tinhtrang' => 2
   		);
   
   		$result = $model -> duyetdon($table,$data,$cond);
   		if($result){
   			$message['mess'] = "Cảm ơn bạn đã mua hàng";
   	 		header('location:'.BASE_URL."giohang/thongtin/$makh?mess=".urlencode(serialize($message)));
    		}else{
    			$message['mess'] = "lỗi! ";
   	 		header('location:'.BASE_URL."giohang/thongtin/$makh?mess=".urlencode(serialize($message)));
    		}
   	}
   	 public function quenmatkhau(){
   
   		$this -> load -> view('Forgot_password');
   		
   	}
   	public function guima(){
   		$name = "Không tên";
		$mail1 = $_POST['email'];
		$nameMail = "Mã xác nhận";
		$ma = rand(100000,999999);
		$content = "Mã xác nhận email của bạn là: <b>".$ma."</b>";
		 $mail = new PHPMailer(true);    
   try {
       //Server settings
       $mail->SMTPDebug = 0;
                                    // Enable verbose debug output
       $mail->isSMTP(); 
       $mail->CharSet  = "utf-8";                                     // Set mailer to use SMTP
       $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
       $mail->Username = 'htrunghieu2002@gmail.com';                 // SMTP username
       $mail->Password = 'wcaqmuelmqdbmhkn';                           // SMTP password
       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
       $mail->Port = 587;                                    // TCP port to connect to
    
       //Recipients
       $mail->setFrom('htrunghieu2002@gmail.com', $nameMail);
   
       $mail->addAddress($mail1 , $name);     // Add a recipient
 
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = 'Mã xác nhận';
       $mail->Body = $content;
      
       $mail->send();
       $table_nd = "nguoi_dung";
       $table_kh = "khach_hang";
       $cond = "$table_nd.makh = $table_kh.makh AND $table_nd.email = '$mail1'";
       $model = $this -> load -> model('loginmodel');
       $data['makh'] = $model -> byid($table_nd, $table_kh, $cond);
       $data['data'] = $ma;

   		$this -> load -> view('confirm',$data);
   		} catch (Exception $e) {
        
   		}   
   	}
   	public function doimatkhau(){
   		$makh = $_POST['makh'];
   		$data['data'] = $makh;
   		$this -> load -> view('change_Password',$data);
   	}

   	public function datlaimatkhau(){
   		$makh = $_POST['makh'];
   		$matkhau = trim($_POST['mk']);
   		$table = "khach_hang";
   		$cond = "$table.makh = $makh";
   		$model = $this -> load -> model('loginmodel');
   		$data = array(
   			'mat_khau' =>  md5($matkhau)
   		);

   		$result = $model -> edit($table, $data, $cond);

   	 	header('location:'.BASE_URL."khachhang/dangnhap/");
   	}
}
?>
