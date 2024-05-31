<?php 
   if (!empty($_GET['msg'])) {
      $msg = unserialize(urldecode($_GET['msg']));
      foreach ($msg as $key => $value) {
         echo "<script>
   alert('$value');
</script>";
      }
   }
 ?>
<div class="right_col" role="main">
<div class="">
<div class="page-title">
   <div class="title_left">
      <h3>Admin <small></small></h3>
   </div>
   <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
       
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <?php 
            foreach ($staff_details as $st) {
            
          ?>
   <div class="x_panel">
      <div class="x_title">
         <h2>Chi tiết tài khoản <small><?php echo $st['ten'] ?></small></h2>
         <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1 (chưa hoàn thiện) </a>
                  </li>
                  <li><a href="#">Settings 2 (chưa hoàn thiện) </a>
                  </li>
               </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
         </ul>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
         <p class="text-muted font-13 m-b-30">
            Tài khoản nhân viên
         </p>
         
         <form action="<?php echo BASE_URL ?>admin/up_staff/<?php echo $st['mand'] ?>" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hình ảnh <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                <center> <img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo $st['hinhanh'] ?>" width="113.386" height="115.181"></center>
                
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $st['ten'] ?>" name="ten">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Số điện thoại <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="sdt" required="required" class="form-control col-md-7 col-xs-12" pattern="[0-9]{10}" title="Số điện thoại gồm từ 0 - 9 và 10 chữ số" value="<?php echo $st['dienthoai'] ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Địa chỉ <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="diachi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $st['diachi'] ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $st['email'] ?>">
               </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hình ảnh mới <span class="required"> " yêu cầu hình ảnh 3x4 "</span>
               </label>
                <input  type="file" value="" name="image_staff" class="form-control col-md-7 col-xs-12">
              </div>
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?php echo BASE_URL ?>admin/list_staff" title=""><button class="btn btn-primary" type="button">Hủy bỏ</button></a>
                  <button class="btn btn-primary" type="reset">Làm mới</button>
                  <button type="submit" class="btn btn-success">Cập nhật</button>
               </div>
            </div>
            <input type="hidden" name="idnv" value="<?php echo $st['manv'] ?>">
         </form>
         <?php 
          }
          ?>
      </div>
   </div>
</div>
