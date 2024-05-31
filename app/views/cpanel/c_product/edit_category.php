
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
  <?php foreach ($category as $cate): ?>
<div class="col-md-12 col-sm-12 col-xs-12">
   <div class="x_panel">
      <div class="x_title">
         <h2>Danh mục<small><?php echo $cate['tenlsp'] ?></small></h2>
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
            Thông tin danh mục sản phẩm
         </p>
         <form action="<?php echo BASE_URL ?>c_category/edit_category/<?php echo $cate['malsp'] ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên loại sản phẩm</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Nhập loại sản phẩm mới" name="lsp" value="<?php echo $cate['tenlsp'] ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <a href="<?php echo BASE_URL ?>c_category/category" title=""><button type="button" class="btn btn-danger">Hủy bỏ</button></a>
                          <button type="reset" class="btn btn-primary">Làm mới thông tin</button>
                          <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                </div>

          </form>
      </div>
   </div>
   <?php endforeach ?>
</div>
