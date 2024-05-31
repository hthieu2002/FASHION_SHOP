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
                    <h2>Form<small></small></h2>
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
                        Gửi hóa đơn
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Mã hóa đơn</th>
                          <th>Người mua</th>
                          <th>Ngày đặt hàng</th>
                          <th>Địa chỉ</th>
                          <th>File hóa đơn</th>
                          <th>Tình trạng</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                   
                     foreach ($hoadon as $value): ?>
                      
                        <tr>
                          <form action="<?php echo BASE_URL ?>c_gop_y/guihoadon" method="POST" enctype="multipart/form-data">

                          <td><a href="<?php echo BASE_URL ?>c_giohang/chitietdonhang/<?php echo $value['mahd'] ?>" title="xem nội dung"><?php echo $value['mahd'] ?></a></td>
                          <td><a href="<?php echo BASE_URL ?>admin/custom_details/<?php echo $value['makh'] ?>" title=""><?php echo $value['ten'] ?></a></td>
                          <td><?php echo $value['ngaylap'] ?></td>
                          
                          <td><?php echo substr($value['noinhan'],0,41).'...' ?></td>
                        <td><input required="required" id="file" name="image" type="file" /></td>
                          <input type="hidden" name="email" value="<?php echo $value['email'] ?>">
                          <input type="hidden" name="name" value="<?php echo $value['ten'] ?>">
                           <input type="hidden" name="mahd" value="<?php echo $value['mahd'] ?>">

                          <td>
                            <input type="hidden" name="manv" value="<?php echo Session::get('id') ?>">
                          <?php if($value['tinhtrang'] == 0){ ?>
                              <button style=" border: none; color: red;">Xác nhận</button>
                          <?php }else if($value['tinhtrang'] == 1){ ?>
                              <button style=" border: none; color: red; "> Gửi hóa đơn</button>
                          <?php }else if($value['tinhtrang'] == 4) { ?>
                              <button style=" border: none; color: blue; ">Đã gửi hóa đơn</button>
                          <?php } ?>

                          </td>
                          
                        </form> 
                        </tr>
                        
                      </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>

            