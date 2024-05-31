 <!-- page content -->
 <?php foreach ($nguoidung as $nd): ?>
 <?php endforeach ?>
 <?php foreach ($sanpham as $sp): ?>
 <?php endforeach ?>
 <?php foreach ($donhang as $dh): ?>
 <?php endforeach ?>
 <?php foreach ($doanhthu as $dt): ?>
 <?php endforeach ?>
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Người dùng</span>
              <div class="count"><?php echo $nd['slmakh'] ?></div>
              
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-suitcase"></i> Sản phẩm</span>
              <div class="count"><?php echo $sp['masp'] ?></div>
              
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Đơn hàng</span>
              <div class="count green"><?php echo $dh['mahd'] ?></div>
              
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>  Doanh thu</span>
              <div class="count"><?php echo number_format($dt['tonggia'],0,',','.')." đ" ?></div>
              
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thống kê 7 sản phẩm bán chạy nhất</h2>
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
                    <canvas id="mybarChart"></canvas>
                    <?php foreach ($thongke as $tk): ?>
                      <?php 
                        $tensp[] = $tk['tensp'];
                        $soluong[] = $tk['soluong'];
                        $soluongmua[] = $tk['soluongmua'];
                       ?>
                    <?php endforeach ?>
                     <input type="hidden" id="t0" value="<?php echo $tensp[0] ?>" />
                     <input type="hidden" id="t1" value="<?php echo $tensp[1] ?>" />
                     <input type="hidden" id="t2" value="<?php echo $tensp[2] ?>" />
                     <input type="hidden" id="t3" value="<?php echo $tensp[3] ?>" />
                     <input type="hidden" id="t4" value="<?php echo $tensp[4] ?>" />
                     <input type="hidden" id="t5" value="<?php echo $tensp[5] ?>" />
                     <input type="hidden" id="t6" value="<?php echo $tensp[6] ?>" />

                     <input type="hidden" id="s0" value="<?php echo $soluong[0] ?>" />
                     <input type="hidden" id="s1" value="<?php echo $soluong[1] ?>" />
                     <input type="hidden" id="s2" value="<?php echo $soluong[2] ?>" />
                     <input type="hidden" id="s3" value="<?php echo $soluong[3] ?>" />
                     <input type="hidden" id="s4" value="<?php echo $soluong[4] ?>" />
                     <input type="hidden" id="s5" value="<?php echo $soluong[5] ?>" />
                     <input type="hidden" id="s6" value="<?php echo $soluong[6] ?>" />

                     <input type="hidden" id="m0" value="<?php echo $soluongmua[0] ?>" />
                     <input type="hidden" id="m1" value="<?php echo $soluongmua[1] ?>" />
                     <input type="hidden" id="m2" value="<?php echo $soluongmua[2] ?>" />
                     <input type="hidden" id="m3" value="<?php echo $soluongmua[3] ?>" />
                     <input type="hidden" id="m4" value="<?php echo $soluongmua[4] ?>" />
                     <input type="hidden" id="m5" value="<?php echo $soluongmua[5] ?>" />
                     <input type="hidden" id="m6" value="<?php echo $soluongmua[6] ?>" />
                  </div>
                  <h2>Chú thích: </h2>
                   <table class="table">

                    
        
                    </script>
    <thead>
      <tr>
        <th>#</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm tương ứng</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $i = 0;
      foreach ($thongke as $thongke): ?>
        <?php $i++ ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $thongke['tensp'] ?></td> 
        <td><?php echo $thongke['ten'] ?></td> 
      </tr>  
       <?php endforeach ?>
    </tbody>
  </table>
                </div>
          </div>
        </div>

        <!-- /page content -->
        