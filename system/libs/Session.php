<?php 
	class Session{

		public static function init(){
			session_start();
		}
	
		public static function set($key, $val){
			$_SESSION[$key] = $val;
		}
		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}else{
				return false;
			}
		}
		public static function checkSession1(){
			self:: init();
			if (self:: get('login_admin') == false) {	
				header("location:".BASE_URL."login");
				seft::destroy();
			}else{

			}
		}
		public static function checkSession2(){
			self:: init();
			if (self:: get('login_staff') == false) {	
				header("location:".BASE_URL."login/login1");
				seft::destroy();
			}else{

			}
		}
		public static function destroy(){
			session_destroy();
		}
		public static function unset($key){
			unset($_SESSION[$key]);
		}

	}

 ?>