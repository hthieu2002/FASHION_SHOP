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
                    <h2>Danh sách <small> đơn hàng</small></h2>
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
                        Đơn hàng
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Mã hóa đơn</th>
                          <th>Người mua</th>
                          <th>Ngày đặt hàng</th>
                          <th>Tổng giá</th>
                          <th>Địa chỉ</th>
                          <th>Ghi chú</th>
                          <th>Tình trạng</th>
                          <th>Công cụ</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                   
                     foreach ($order as $value): ?>
                      
                        <tr>
                          
                          <td><a href="<?php echo BASE_URL ?>c_giohang/chitietdonhang/<?php echo $value['mahd'] ?>" title="xem nội dung"><?php echo $value['mahd'] ?></a></td>
                          <td><a href="<?php echo BASE_URL ?>admin/custom_details/<?php echo $value['makh'] ?>" title=""><?php echo $value['ten'] ?></a></td>
                          <td><?php echo $value['ngaylap'] ?></td>
                          <td><?php echo number_format($value['tonggia'],0,',','.').' đ' ?></td>
                          <td><?php echo substr($value['noinhan'] ,0,20).'...'?></td>
                          <td><?php echo substr($value['ghichu'],0,20).'...' ?></td>
                          <form action="<?php echo BASE_URL ?>c_giohang/xacnhan/<?php echo $value['mahd'] ?>" method="POST">
                          <td>
                            <input type="hidden" name="manv" value="<?php echo Session::get('id') ?>">
                          <?php if($value['tinhtrang'] == 0){ ?>
                              <p style=" border: none; color: red;">Chưa xác nhận</p>
                          <?php }else if($value['tinhtrang'] == 1){ ?>
                              <p style=" border: none; color: blue; ">Đang vận chuyển...</p>
                          <?php }else if($value['tinhtrang'] == 4){ ?>
                              <p style=" border: none; color: blue; ">Đang vận chuyển...</p>
                          <?php }else{ ?>
                              <p style=" border: none; color: blue; ">Đã nhận</p>
                          <?php } ?>

                          </td>
                          
                        </form> 
                          <td><a href="<?php echo BASE_URL ?>c_giohang/xoa/<?php echo $value['mahd'] ?>"><center><button class="btn btn-round btn-danger">Xóa</button></center></a></td>
                        </tr>
                        
                      </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>

            