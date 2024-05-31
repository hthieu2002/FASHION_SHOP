<?php 
	class index extends DController{ // kế thừa 
		
		public function __construct(){
			$data = array();
			parent:: __construct();
		}
		public function index(){

		    $this -> homepage();
		}

		public function homepage(){
			Session:: init();
			$table = "san_pham";
			$table_cate = "loai_san_pham";

			$model = $this -> load -> model('k_productmodel');
	
			$data['category'] = $model -> cate($table_cate);
			$data['product'] = $model -> list($table);
	


			$this -> load -> view('header/headerHome');
			$this -> load -> view('menu');
			$this -> load -> view('slider');
			$this -> load -> view('home', $data);
			$this -> load -> view('footer',$data);
		}
		public function notfound(){
			
			$this -> load -> view('404');
			
		}
		public function lienhe(){
			Session:: init();
			$table = "tbl_category_product";
			$table_post = "tbl_category_post";

			$categorymodel = $this -> load -> model('categorymodel');
			$data['category'] = $categorymodel -> category_home($table);
			$data['category_post'] = $categorymodel -> categorypost_home($table_post);

			$this -> load -> view('header',$data);
			$this -> load -> view('contact');
			$this -> load -> view('footer');
		}

	}
 ?>