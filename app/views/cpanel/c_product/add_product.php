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
         <h2>Thêm sản phẩm <small></small></h2>
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
         <form action="<?php echo BASE_URL ?>c_product/insert" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên sản phẩm <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập tên sản phẩm" name="tensp">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-6" for="last-name" >Giá sản phẩm <span class="required">*</span>
               </label>
               <div class="col-md-2 col-sm-2 col-xs-4">
                  <input type="number" id="last-name" name="giasp" required="required" class="form-control col-md-7 col-xs-12" min="1" placeholder="0">
               </div>
               <label class="control-label col-md-2 col-sm-2 col-xs-4" for="last-name">Số lượng <span class="required">*</span>
               </label>
               <div class="col-md-2 col-sm-2 col-xs-4">
                  <input type="number" id="last-name" name="soluong" required="required" class="form-control col-md-7 col-xs-12" min="0" placeholder="0">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-6" for="last-name" >Khuyến mãi <span class="required">*</span>
               </label>
               <div class="col-md-2 col-sm-2 col-xs-4">
                  <input type="number" id="last-name" name="giakm" required="required" class="form-control col-md-7 col-xs-12" min="0" placeholder="0 %">
               </div>
               <label class="control-label col-md-2 col-sm-2 col-xs-4" for="last-name">Size <span class="required">*</span>
               </label>
               <div class="col-md-2 col-sm-2 col-xs-4">
                  <select class="form-control" name="size">
                     <option value="0" >XL</option>
                     <option value="1" >L</option>
                     <option value="2" >M</option>
                     <option value="3" >S</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <h4>Miêu tả ngắn</h4>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea id="editor" name="mieuta" class="form-control" rows="5" style="resize: none"></textarea> 
               </div>
               <div class="ln_solid"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <h4>Nội dung</h4>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea id="editorr" name="noidung" class="form-control" rows="7" style="resize: none"></textarea> 
               </div>
               <div class="ln_solid"></div>
            </div>
            <div class="form-group">
               <div class='col-sm-3'>
                  Ngày bắt đầu khuyến mãi
                  <div class="form-group">
                     <div class='input-group date' id='datetimepicker6'>
                        <input type='text' name="nbdkm" class="form-control" placeholder="2021-12-12 00:00:00" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
               </div>
               <div class='col-sm-3'>
                  Ngày kết thúc khuyến mãi
                  <div class="form-group">
                     <div class='input-group date' id='datetimepicker7'>
                        <input type='text' name="nktkm" class="form-control" placeholder="2021-12-12 00:00:00" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-3">
                  Loại sản phẩm
                  <div class="form-group">
                     <select class="form-control" name="loaisp">
                      <?php foreach ($category as $cate) {
                      ?>
                        <option value="<?php echo $cate['malsp'] ?>"><?php echo $cate['tenlsp'] ?></option>
                      <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-3">
                  Sản phẩm mới nổi
                  <div class="form-group">
                     <select class="form-control" name="tinhtrang">
                        <option value="0" >Sản phẩm mới</option>
                        <option value="1" >Sản phẩm hót</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hình ảnh mới <span class="required"> " yêu cầu hình ảnh 3x4 "</span>
               </label>
               <input  type="file" value="Chưa có file nào" name="image_staff" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?php echo BASE_URL ?>admin/list_staff" title=""><button class="btn btn-primary" type="button">Hủy bỏ</button></a>
                  <button class="btn btn-primary" type="reset">Làm mới</button>
                  <button type="submit" class="btn btn-success">Thêm mới</button>
               </div>
            </div>
            <!-- <input type="hidden" name="idnv" value="<?php echo $st['manv'] ?>"> -->
            <input type="hidden" name="masp" value="<?php echo rand(1000, 9999) ?>">
         </form>
      </div>
   </div>
</div>
