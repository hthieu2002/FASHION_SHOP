<?php 
	class order extends DController{

		public function __construct(){
			Session::checkSession();
			parent:: __construct();
		}
		public function index(){
			$this -> order();
		}
		public function order(){
			$table_order = 'tbl_order';
			$ordermodel = $this -> load -> model('ordermodel');
			$data['order'] = $ordermodel -> list_order($table_order);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu');
			$this -> load -> view('cpanel/order/order',$data);
			$this -> load -> view('cpanel/footer');
		}

		public function order_details($order_code){
			$table_order_details = 'tbl_order_details';	
			$table_product = 'tbl_product';
			$cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
			$cond_info = "$table_order_details.order_code = '$order_code'";

			$ordermodel = $this -> load -> model('ordermodel');
			$data['order_details'] = $ordermodel -> list_order_details($table_product,$table_order_details, $cond);
			$data['order_info'] = $ordermodel -> list_info($table_order_details, $cond_info);

			$this -> load -> view('cpanel/header');
			$this -> load -> view('cpanel/menu');
			$this -> load -> view('cpanel/order/order_details',$data);
			$this -> load -> view('cpanel/footer');
		}
		public function order_confirm($order_code){
			$table_order = 'tbl_order';
			$ordermodel = $this -> load -> model('ordermodel');
			$cond = "$table_order.order_code = $order_code";
			$data = array(
				'order_status' => 1
				);
			$result = $ordermodel -> order_confirm($table_order, $data , $cond);
			if ($result == 1) {
	 			$message['msg'] = "Đơn hàng đã xử lý thành công";
	 			header('location:'.BASE_URL."order?msg=".urlencode(serialize($message)));
	 		}else{
	 			$message['msg'] = "Đơn hàng đã xử lý thất bại!";
	 			header('location:'.BASE_URL."order?msg=".urlencode(serialize($message)));
	 		}
		}
	}

 ?>