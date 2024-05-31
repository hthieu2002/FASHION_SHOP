 <header class="fixed-top page-header">
    <div class="container-fluid container-fluid-max">
      <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>"><h4>HT Shop</h4> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE_URL ?>">Trang chủ  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE_URL ?>k_product/sanpham">Sản Phẩm </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['login_user'])){echo BASE_URL."giohang/giohang/".Session::get('id_user');}else{echo BASE_URL."khachhang/dangnhap";} ?>">Giỏ hàng </a>
            </li>
            <?php 
                if(isset($_SESSION['login_user'])){
             ?>
            
             <li><a class="nav-link" href="<?php echo BASE_URL ?>giohang/thongtin/<?php echo Session::get('id_user'); ?>"><i class="fa fa-user" aria-hidden="true">Tài khoản</i></a></li>
          <?php }else{ ?>

            <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>khachhang/dangnhap" title="">Đăng nhập</a>
            </li>
           <?php } ?>
          </ul>
          <div class="text-white">
            <a href="tel:0856775530" class="mr-2" id="gc">
              <i class="fas fa-phone"></i>
              <div class="d-none d-xl-inline">0856775530 &nbsp;</div>
            </a>
            <a href="mailto:nvtung.20it2@vku.udn.vn" id="gc">
              <i class="fas fa-envelope"></i>
              <div class="d-none d-xl-inline">nvtung.20it2@vku.udn.vn </div>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>