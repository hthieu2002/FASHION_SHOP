<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>

<script src="<?php echo BASE_URL ?>public/js/login/jquery.min.js"></script>
<!-- Custom Theme files -->

<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->

</head>
<style type="text/css">
	body{
	background: url(../public/uploads/login/banner1.jpg)no-repeat;
	background-attachment: fixed;
    background-position: center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	padding:0;
	margin:0; 
	font-family: 'Roboto Condensed', sans-serif;
	font-size: 100%;
	}  
	.form{
		width: 40%;
		height: 20%;
		background-color: #E6FFEA;
		display: block;
		text-align: center;
		margin: 0 auto;
		margin-top: 10%;
		box-shadow: 2px 2px #888888;
		border-radius: 4px;
	}
	.forminput input{
		 width: 70%;
  		padding: 5px 20px;
  		margin: 10px 0;
  		box-sizing: border-box;
  		border: none;
  		border-bottom: 2px solid purple;
  		border-radius: 4px;
	}
	.buton{
  		border: none;
  		padding: 10px 32px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 14px;
  		margin: 4px 2px;
 		cursor: pointer;
 		border-radius: 4px;

	}
	.buton:hover{
		background-color: #002C94;
		color: white;
		border: none;
  		padding: 10px 32px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 14px;
  		margin: 4px 2px;
 		cursor: pointer;
 		border-radius: 4px;


	}
</style>
<body>

<!--header start here-->
<div class="header">
	<div class="form">
		<div class="header-main">
			<br>
		       <h1>Quên mật khẩu</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="<?php echo BASE_URL ?>khachhang/guima" method="post">
					 	<form>
						<div class="forminput">
							Nhập email: <input type="email" name="email" >

							<br><br>
							<button class="buton">Gửi mã</button>
							<br><br>
						</div>
						</form>
						

					</form>		
				</div>
				</div>
			  </div>
			</div>
		</div>
</div>
</body>
</html>