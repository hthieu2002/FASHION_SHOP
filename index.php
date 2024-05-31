<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='shortcut icon' href="./public/uploads/login/logo.ico" />
	<title>Website thời trang Nam</title>
</head>
<body>
			<?php 
		spl_autoload_register(function($class){
			include_once 'system/libs/'.$class.'.php';
		});	
		include_once 'app/config/config.php';	

		$main = new Main();

	    ?>
</body>
</html>