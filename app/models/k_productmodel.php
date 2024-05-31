<?php 
	class k_productmodel extends DModel
	{
	    public function __construct()
	    {
	        parent:: __construct();
	    }

	    public function list($table){
	    	$sql = "SELECT * FROM $table WHERE $table.hot = 1 ORDER BY $table.masp DESC LIMIT 4";
			return $this -> db ->select($sql);
	    }
	    public function cate($table){
	    	$sql = "SELECT * FROM $table ORDER BY $table.malsp DESC";
			return $this -> db ->select($sql);
	    }
	    public function ctiet($table,$table1,$cond){
		$sql = "SELECT * FROM $table1,$table WHERE $cond";
		return $this -> db -> select($sql);
		}
	    public function splienquan($table,$table_product,$cond_related){
		$sql = "SELECT * FROM $table,$table_product WHERE $cond_related ORDER BY $table.masp DESC LIMIT 4";
		return $this -> db -> select($sql);
		}
		public function list_pro($table, $table_cate, $cond , $Limit, $Offset){
			$sql = "SELECT * FROM $table, $table_cate WHERE $cond LIMIT $Limit OFFSET $Offset ";
			return $this -> db ->select($sql);
		}
		public function list_number($table, $table_cate, $cond){
			$sql = "SELECT *, COUNT(tensp) 'number' FROM $table, $table_cate WHERE $cond AND 1 ";
			return $this -> db ->select($sql);
		}

		public function danhmuc($table){
			$sql = "SELECT * FROM $table ORDER BY malsp DESC";
			return $this -> db ->select($sql);
		}

		public function list_search($table, $table_cate, $cond , $Limit, $Offset, $loai, $kichco, $dieukien){
			$sql = "SELECT * FROM $table, $table_cate WHERE $cond $loai $kichco $dieukien ORDER BY $table.masp ASC LIMIT $Limit OFFSET $Offset ";
			return $this -> db ->select($sql);
		}
		public function list_number_search($table, $table_cate, $cond, $loai, $kichco, $dieukien){
			$sql = "SELECT *, COUNT(tensp) 'number' FROM $table, $table_cate WHERE $cond $loai $kichco $dieukien AND 1 ";
			return $this -> db ->select($sql);
		}
	}
 ?>