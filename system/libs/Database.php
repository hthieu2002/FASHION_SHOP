<?php 
	
class Database extends PDO{

	public function __construct($connect , $user,$pass){
		// kế thừa từ PDO 
		parent:: __construct($connect , $user,$pass); 
		// <=> $db = new PDO($,$,$);
	}

	public function select($sql, $data = array(), $fetchStyde = PDO::FETCH_ASSOC){
		$statement = $this -> prepare($sql);

		foreach($data as $key => $value){
			$statement -> bindParam($key, $value);
		}
		$statement -> execute();
		return $statement -> fetchAll($fetchStyde);
	}


	 public function insert($table,$data){

	 	// lấy key từ controllers/category , key_data dữ liệu từ cột sql
		$keys =implode(",", array_keys($data)); 
	
		$values =":".implode(", :", array_keys($data)); 

		// implome thêm 1 kí tự vào 1 đâu đó 
		$sql = "INSERT INTO $table($keys) VALUES($values)";

		$statement = $this -> prepare($sql);

		foreach ($data as $key => $values) {
			$statement -> bindValue(":$key",$values);
		}
		return $statement-> execute();
	 }

	 public function update($table,$data,$cond){
	 	$updateKeys = NULL;
	 	
	 	foreach ($data as $key => $value) {
			$updateKeys .= "$key = :$key,";
		}
		$updateKeys = rtrim($updateKeys,",");
		// cắt kí tự cuối hàng

	 	$sql = "UPDATE $table SET $updateKeys WHERE $cond" ;
	 	$statement = $this -> prepare($sql);
	 	foreach ($data as $key => $value) {
			$statement -> bindValue(":$key",$value);
		}
	 	return $statement->execute();
	}
	 public function delete($table ,$cond, $limit = 1){
	 	$sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
	 	return $this -> exec($sql);
	 }

	 public function affectedRows($sql , $username, $password){
	 	$statement = $this -> prepare($sql);
	 	$statement -> execute(array($username, $password));
	 	return $statement-> rowCount();
	 }

	 public function selectUser($sql, $username, $password){
	 	$statement = $this -> prepare($sql);
	 	$statement -> execute(array($username, $password));
	 	return $statement -> fetchAll(PDO::FETCH_ASSOC);
	 }
}

 ?>