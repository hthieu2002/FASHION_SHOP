<?php foreach ($text as $value): ?>
   
<?php endforeach ?>
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
         <h2>Form trả lời <small></small></h2>
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
            Trả lời : Anh/chị <<b> <?php echo $value['ten'] ?> </b> >
         </p>
         <p>
            Nội dung : <?php echo $value['noidunggy'] ?>

         </p>
         <form action="<?php echo BASE_URL ?>c_gop_y/traloimail" method="POST" id="demo-form2"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $value['ten'] ?>" name="ten">
                 <input type="hidden" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $value['email'] ?>" name="email">
                 <input type="hidden" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $value['magy'] ?>" name="magy">
               </div>
            </div>
           
            
            <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nội dung phản hồi: <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
               </div>

            </div>
           
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?php echo BASE_URL ?>c_gop_y/gop_y" title=""><button class="btn btn-primary" type="button">Hủy bỏ</button></a>
                  <button type="submit" class="btn btn-success">Trả lời</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
