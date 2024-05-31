<?php foreach ($khachhang as $value): ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Đơn hàng <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Chi tiết đơn hàng<small>Mã: <?php echo $value['mahd'] ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-user"></i> <?php echo $value['ten']."." ?>
                                          <small class="pull-right">Ngày: <?php echo $value['ngaylap'] ?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          Thông tin
                          <address>
                                          <strong><?php echo $value['ten'] ?>.</strong>
                                          <br>Địa chỉ : <?php echo $value['noinhan'] ?>
                                          <br>Số điện thoại : <?php echo $value['dienthoai'] ?> 
                                          <br>Ngày đặt : <?php echo $value['ngaylap'] ?>
                                          
                                          <br>Ghi chú: <?php echo $value['ghichu'] ?>
                                      </address>
                        </div>
                      
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                              </tr>
                            </thead>
                            <tbody>
                             

                              <?php
                                $i = 0;
                                $tong = 0;
                               foreach ($sanpham as $sp): ?>
                                <?php $i++?>
                                <?php 
                                    $subtotal = $sp['giakm']* $sp['soluongmua'];
                                  $tong+= $subtotal;
                                 ?>
                             
                                <form action="<?php if($value['tinhtrang'] == 0){echo BASE_URL."c_giohang/xoact/".$sp['macthd'];}else{echo BASE_URL."c_giohang/chitietdonhang/".$sp['mahd'];} ?>" method="POST">
                                
                                
                                 <input type="hidden" name="mahd" value="<?php echo $sp['mahd'] ?>">
                              <tr>
                                <td><input type="submit" title="" value="<?php echo $i ?>"/></td>
                                <td><?php echo $sp['tensp'] ?></td>

                                <td><a href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $sp['masp'] ?>" title=""><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $sp['anhsp'] ?>" width="100" height="100"></a></td>
                                <td><?php echo $sp['soluongmua'] ?></td>
                                <td><?php echo number_format($sp['giakm'],0,',','.').' đ' ?></td>
                              </tr>
                              
                               <?php endforeach ?>
                                 <br>Tổng giá : <?php echo number_format($tong,0,',','.').' đ' ?>

                            </tbody>
                            </form>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                 
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> In hóa đơn</button>
                          <?php foreach ($nhanvien as $nv): ?>
                            
                        <form action="<?php if($value['tinhtrang']== 0){ echo BASE_URL."c_giohang/in/".$value['mahd']; }else{echo "#";} ?>" method="POST">
                          <input type="hidden" name="manv" value="<?php echo Session::get('id') ?>">
                          <input type="hidden" name="gia" value="<?php echo $tong ?>">
                          <?php if($value['tinhtrang'] == 0){ ?>
                            <?php if(isset($_SESSION['login_admin'])){ ?>
                              <p class="btn btn-danger pull-right"><i class="fa fa-credit-card"></i> Chưa xác nhận đơn hàng</p>
                            <?php }else{ ?>
                              <button class="btn btn-danger pull-right"><i class="fa fa-credit-card"></i> Chưa xác nhận đơn hàng</button>
                            <?php } ?>
                              

                          <?php }else if($value['tinhtrang'] == 1) { ?>
                              <p class="btn btn-success pull-right"><i class="fa fa-credit-card"></i><span style="color:red;"><?php echo " ".$nv['ten'] ?></span> Đã xác nhận đơn hàng</p>
                          <?php }else if($value['tinhtrang'] == 4) { ?>
                              <p class="btn btn-success pull-right"><i class="fa fa-credit-card"></i><span style="color:red;"><?php echo " ".$nv['ten'] ?></span> Đã xác nhận đơn hàng</p>
                          <?php }else{ ?>
                              <p class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Đã nhận</p>

                          <?php } ?>
                          </form>
                           <?php endforeach ?>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Shop thời trang Hiếu - Tùng
          </div>
          <div class="clearfix"></div>

<?php endforeach ?>