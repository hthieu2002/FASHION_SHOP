<?php 
	class giohang extends DController{ // kế thừa 
		
		public function __construct(){
			$data = array();
			parent:: __construct();
		}
		public function index(){
		    $this -> giohang();
		}

		public function giohang($id){
			 Session:: init();
			 $table = "khach_hang";
			 $tablend = "nguoi_dung";
			 $cond = "$table.makh = $tablend.makh AND $table.makh = $id";
			 $model = $this -> load -> model('ordermodel');

			 $data['khachhang'] = $model -> thongtin($table,$tablend, $cond);

			$this -> load -> view('header/headerCart');
			$this -> load -> view('menu');
			$this -> load -> view('slide_cart');
			$this -> load -> view('cart', $data);
			$this -> load -> view('footer');
		}
		public function muahang($id){
			Session:: init();
			//Session:: destroy();
			if(isset($_SESSION["shopping_cart"])){
				 $avaiable = 0;
				foreach ($_SESSION["shopping_cart"] as $key => $value) {
					if($_SESSION["shopping_cart"][$key]['masp'] == $_POST['masp']){
						 $avaiable++;
						 $_SESSION["shopping_cart"][$key]['soluong'] += $_POST['soluong'];
					}
				}

				 if($avaiable == 0){
				 	$item = array(
					'masp' => $_POST['masp'],
					'tensp' => $_POST['tensp'],
					'giakm' => $_POST['giakm'],
					'anhsp' => $_POST['anhsp'],
					'soluong' => $_POST['soluong']
					
				);
					$_SESSION["shopping_cart"][] = $item;
				 }
			}else{
				$item = array(
					'masp' => $_POST['masp'],
					'tensp' => $_POST['tensp'],
					'giakm' => $_POST['giakm'],
					'anhsp' => $_POST['anhsp'],
					'soluong' => $_POST['soluong']
					
				);
				$_SESSION["shopping_cart"][] = $item;
			}
			header("Location:".BASE_URL.'giohang/giohang/'.$id);
		}
		public function updategiohang($id){
			Session:: init();
			if (isset($_POST["delete_cart"])) {
				if(isset($_SESSION["shopping_cart"])){
				foreach ($_SESSION["shopping_cart"] as $key => $value) {

					if($_SESSION["shopping_cart"][$key]['masp'] == $_POST['delete_cart']){		
						unset($_SESSION["shopping_cart"][$key]);
					}
				}
					header("Location:".BASE_URL.'giohang/giohang/'.$id);
				}else{
					header("Location:".BASE_URL);
				}
			}else{

				foreach ($_POST['qty'] as $key => $qty) {
					 foreach ($_SESSION["shopping_cart"] as $session => $value) {
					 	if($value['masp'] == $key && $qty >= 1){
					 		$_SESSION["shopping_cart"][$session]['soluong'] = $qty;
					 	}elseif($value['masp'] == $key && $qty <= 0){
					 		unset($_SESSION["shopping_cart"][$key]);
					 	}

					 }
				}

				header("Location:".BASE_URL.'giohang/giohang/'.$id);
			}
			
		}

		public function dathang(){
			Session:: init();
			$tableHd = "hoa_don";
			$tableCtHd = "chi_tiet_hoa_don";

			$model = $this -> load -> model('ordermodel');

			$makh = $_POST['id'];
			$sodienthoai = $_POST['phone'];
			$noinhan = $_POST['address'];
			$ghichu = $_POST['ghichu'];
			$tongtien = $_POST['tongtien'];
			if($sodienthoai == "0"){
				$message['sdt'] = "Số điện thoại sai! ";
		 		header('location:'.BASE_URL."giohang?sdt=".urlencode(serialize($message)));
			}else{
			$mahd = rand(1000,99999);
			

			date_default_timezone_set('asia/ho_chi_minh');
			$date = date("Y-m-d");
			$hour = date("H:m:s");
			$thoigian = $date.$hour;

			$data_hd = array(
				'mahd' => $mahd,
				'makh' => $makh,
				'manv' => "0",
				'ngaylap' => $date.' '.$hour,
				'tonggia' => $tongtien,
				'noinhan' => $noinhan,
				'ghichu' => $ghichu,
				'tinhtrang' => 0

			);
			$result_order = $model -> insert_order($tableHd,$data_hd);

			if(Session::get("shopping_cart") ==  true){
				foreach (Session::get("shopping_cart") as $key => $value) {
					$data_cthd = array(
						
						'mahd' => $mahd,
						'masp' => $value['masp'],
						'soluongmua' => $value['soluong'],
						'dongia' => $value['giakm']
						
					);
					$result_order_details = $model -> insert_order_details($tableCtHd,$data_cthd);
				}
				unset($_SESSION["shopping_cart"]);
			}
			if($result_order_details){
				$message['msg'] = "Bạn đã đặt thành công đơn hàng ";
		 		header('location:'.BASE_URL."giohang/giohang/".Session::get('id_user')."?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Đơn hàng bị lỗi! ";
		 		header('location:'.BASE_URL."giohang/giohang/".Session::get('id_user')."?msg=".urlencode(serialize($message)));
	 			}
	 		}
		}

		public function thongtin($id){
			Session:: init();
			$table_hd = "hoa_don";
			$table_ct = "chi_tiet_hoa_don";
			$table_sp = "san_pham";
			$table = "khach_hang";
			$tablend = "nguoi_dung";

			$cond = "$table.makh = $tablend.makh AND $table.makh = $id";
			$cond1 = "$table_hd.mahd = $table_ct.mahd AND $table_ct.masp = $table_sp.masp AND $table_hd.makh = $id";

			$model = $this -> load -> model('ordermodel');

			$data['khachhang'] = $model -> thongtin($table,$tablend, $cond);
			$data['lichsu'] = $model -> lichsu1($table_hd,$table_ct, $table_sp, $cond1);

			$this -> load -> view('header/headerCart');
			$this -> load -> view('menu');
			$this -> load -> view('slide_product');
			$this -> load -> view('thongtin',$data);
			$this -> load -> view('footer');
		}
	}
 ?>