<?php 
   include "PHPMailer/PHPMailer/src/PHPMailer.php";
   include "PHPMailer/PHPMailer/src/Exception.php";
   include "PHPMailer/PHPMailer/src/OAuth.php";
   include "PHPMailer/PHPMailer/src/POP3.php";
   include "PHPMailer/PHPMailer/src/SMTP.php";
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   	class c_gop_y extends DController
   	{
   	   public function __construct(){
   			parent:: __construct();
   		}
   
   		public function gop_y(){
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
   
   			$table_kh = "khach_hang";
   			$table_gop_y = "gop_y";
   			$table_sp = "san_pham";
   			$table_nd = "nguoi_dung";
   
   			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gop_y.makh AND $table_gop_y.masp = $table_sp.masp";
   			$model = $this -> load -> model('gopymodel');
   
   			$data['gopy'] = $model -> danhsach($table_kh, $table_gop_y, $table_sp,$table_nd, $cond);
   
   			$this -> load -> view('cpanel/header');
   			$this -> load -> view('cpanel/menu',$data);
   			$this -> load -> view('cpanel/gop_y/gop_y', $data);
   			$this -> load -> view('cpanel/footer');
   		}
   
   		public function traloi($id){
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
   
   			$table_gop_y = "gop_y";
   			$cond = "$table_nd.makh = $table_kh.makh AND $table_kh.makh = $table_gop_y.makh AND $table_gop_y.magy = $id";
   			$model = $this -> load -> model('gopymodel');
   
   			$data['text'] = $model -> list($table_kh, $table_nd, $table_gop_y, $cond);
   
   			$this -> load -> view('cpanel/header');
   			$this -> load -> view('cpanel/menu',$data);
   			$this -> load -> view('cpanel/gop_y/traloi', $data);
   			$this -> load -> view('cpanel/footer');
   
   		}
   
   		public function traloimail(){
   
   			$name = $_POST['ten']; // tên
       		$mail1 = $_POST['email']; // địa chỉ mail muốn gửi
       		$nameMail = "Mail trả lời bình luận"; // tiêu đề mail
       		$content = $_POST['text']; // nội dung
       		$magy = $_POST['magy'];
   
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
       $mail->Password = 'fpaehjwroqbegeim';                           // SMTP password
       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
       $mail->Port = 587;                                    // TCP port to connect to
    
       //Recipients
       $mail->setFrom('htrunghieu2002@gmail.com', $nameMail);
   
       $mail->addAddress($mail1 , $name);     // Add a recipient
                      // Name is optional
    
       //Content
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = 'Mail Phản Hồi';
       $mail->Body = $content;
       //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
       $mail->send();
   
       $table = "gop_y";
       $cond = "$table.magy = $magy";
       $model = $this -> load -> model('gopymodel');
       $data = array(
       	'quatrinh' => 1
       );
       $result = $model -> gopymail($table, $data, $cond);
   
       $message['mess'] = "Đã gửi! ";
       header('location:'.BASE_URL."c_gop_y/gop_y?mess=".urlencode(serialize($message)));
   			} catch (Exception $e) {
        
   			}   
   		}

   		public function guihoadon(){
   			$name = $_POST['name'];
			$mail1 = $_POST['email'];
			$nameMail = "Hóa đơn từ HTSHOP";
			$content = "Cảm ơn bạn đã tin tưởng mua hàng tại shop chúng tôi. Chúc bạn một ngày tốt lành";
			$mahd = $_POST['mahd'];

	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $div = explode('.', $file_name);
      $file_ext=strtolower(end($div));
      $unique_image = $div[0].time().'.'.$file_ext;

      $expensions= array("jpeg","jpg","png","pdf","doc","docx");
      	
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
      }
      
      if($file_size > 104857600) {
         $errors[]='File size must be excately 1 GB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"public/uploads/hoadon/".$unique_image); //The folder where you would like your file to be saved
         
      }else{
         print_r($errors);
      }     
   }
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
    $mail->Password = 'iehhfqwdrxoafrin';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('htrunghieu2002@gmail.com', $nameMail);

    $mail->addAddress($mail1 , $name);     // Add a recipient
                   // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    //Attachments
    $mail->addAttachment("public/uploads/hoadon/".$unique_image);        // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hóa đơn';
    $mail->Body = $content;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
   		$table = "hoa_don";
       $cond = "$table.mahd = $mahd";
       $model = $this -> load -> model('gopymodel');
       $data = array(
       	'tinhtrang' => 4
       );
       $result = $model -> gopymail($table, $data, $cond);
   
       $message['mess'] = "Đã gửi! ";
       header('location:'.BASE_URL."c_giohang/hoadon?mess=".urlencode(serialize($message)));
   			
} catch (Exception $e) {
   
}
   		}

   		public function xoagy($id){
   			$table = "gop_y";
			$cond = "$table.magy = $id";
			$model = $this -> load -> model('ordermodel');

			$result = $model -> xoa($table, $cond);


			if ($result == 1) {
	 			$message['msg'] = "Đã xóa";
	 			header('location:'.BASE_URL."c_gop_y/gop_y?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Chưa Xóa!";
	 			header('location:'.BASE_URL."c_gop_y/gop_y?msg=".urlencode(serialize($message)));
	 		}


   		}
   	}
   	
    ?>
