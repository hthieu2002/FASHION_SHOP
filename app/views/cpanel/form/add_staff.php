
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
   <div class="x_panel">
      <div class="x_title">
         <h2>Đăng kí tài khoản <small></small></h2>
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
            Tài khoản khách hàng
         </p>
         <form action="<?php echo BASE_URL ?>admin/add_staff/?>" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Nhập họ" name="ho">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Nhập tên" name="ten">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản đăng nhập<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" required="required" class="form-control" placeholder="Nhập thông tin" name="taikhoan" >
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" required="required" class="form-control" placeholder="Nhập mật khẩu" name="matkhau">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="email" id="autocomplete-custom-append" required="required" title="Email để lấy lại mật khẩu của bạn" placeholder="a@" class="form-control col-md-10" name="email"/>
                        </div>
                      </div>
                      <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Số điện thoại <span class="required">*</span>
                       </label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="last-name" name="sdt" required="required" class="form-control col-md-7 col-xs-12" pattern="[0-9]{10}" title="Số điện thoại gồm từ 0 - 9 và 10 chữ số" placeholder="+84/0" value="" name="sdt">
                       </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="diachi">
                        </div>
                      </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hình ảnh <span class="required"> " yêu cầu hình ảnh 3x4 "</span>
                       </label>
                        <input  type="file" value="" name="image_staff" class="form-control col-md-6 col-sm-6 col-xs-12">
                      </div>
                      <input type="hidden" name="manv" value="<?php echo rand(1000, 9999) ?>">
                      <input type="hidden" name="mand" value="<?php echo rand(1000, 9999) ?>">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <a href="<?php echo BASE_URL ?>admin/list_staff" title=""><button type="button" class="btn btn-danger">Hủy bỏ</button></a>
                          <button type="reset" class="btn btn-primary">Làm mới thông tin</button>
                          <button type="submit" class="btn btn-success">Đăng kí tài khoản</button>
                        </div>
                      </div>

                    </form>
         
      </div>
   </div>
</div>
