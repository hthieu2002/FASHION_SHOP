  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-umbrella"></i> <span>Shop thời trang</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo Session::get('image') ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome Admin</span>
                <h2> <?php echo Session::get('name'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Danh mục</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     
                      <?php 
                         if(Session::get('login_admin')){
                       ?>
                        <li><a href="<?php echo BASE_URL ?>login/dashboard1">Trang chủ</a></li>
                      <li><a href="<?php echo BASE_URL ?>admin/list_staff">Tài khoản nhân viên</a></li>
                      <li><a href="<?php echo BASE_URL ?>admin/list_custom">Tài khoản khách hàng</a></li>
                      <?php 
                        }else{
                       ?>
                       <li><a href="<?php echo BASE_URL ?>login/dashboard2">Trang chủ</a></li>
                        <li><a href="<?php echo BASE_URL ?>admin/list_custom">Tài khoản khách hàng</a></li>
                       <?php 
                        }
                        ?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Sản Phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo BASE_URL ?>c_category/category">Loại sản phẩm</a></li>
                      <li><a href="<?php echo BASE_URL ?>c_product/product">Sản phẩm</a></li>
                    </ul>
                  </li>
                  <?php foreach ($demhoadon as $dhd): ?>
                    
                  <?php endforeach ?>
                  <li><a><i class="fa fa-shopping-cart "></i>Đơn hàng <sup style="color: red;"><b><?php echo $dhd['mahd'] ?></b></sup><span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">
                      <li><a href="<?php echo BASE_URL ?>c_giohang/tatcadonhang">Tất cả đơn hàng</a></li>
                      <li><a href="<?php echo BASE_URL ?>c_giohang/hoadon">Form gửi hóa đơn <sup style="color: red;"><b><?php echo $dhd['mahd'] ?></b></sup></a></li>
                    </ul>
                  </li>
                <li><a><i class="fa fa-desktop"></i>Phản hồi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo BASE_URL ?>c_gop_y/gop_y">Tất cả phản hồi</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
          

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo BASE_URL ?>login/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo Session::get('image') ?>" alt=""><?php echo Session::get('name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li></li>
                    <li>
                      <?php 
                        if(Session::get('login_admin')){
                       ?>
                      <a href="<?php echo BASE_URL ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      <?php 
                        }else if(Session::get('login_staff')){
                       ?>
                       <a href="<?php echo BASE_URL ?>login/logout1"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                       <?php 
                        }
                        ?>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                     <?php foreach ($dem as $d): ?>
                       
                     <?php endforeach ?>
                    <span class="badge bg-green"><?php echo $d['dem'] ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                   
                    <?php foreach ($dulieu as $value): ?>
                    <li>
                      <a href="<?php echo BASE_URL ?>c_gop_y/traloi/<?php echo $value['magy'] ?>">
                        <span class="image"><img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo $value['hinhanh'] ?>" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $value['ten'] ?></span>
                        </span>
                        <span class="message">
                          <?php echo substr($value['noidunggy'],0,80)."&#8230;" ?>
                        </span>
                      </a>
                    </li>

                    <?php endforeach ?>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->