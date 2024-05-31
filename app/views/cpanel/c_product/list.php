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
                    <h2>Danh sách <small>sản phẩm</small> </h2>
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
                    <h2><a class="hv" href="<?php echo BASE_URL ?>c_product/add" title="Thêm sản phẩm mới">Thêm sản phẩm</a></h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên sản phẩm</th>
                          <th>Hình ảnh</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          <th>Kích cỡ</th>
                          <th>Tình trạng</th>
                          <th>Công cụ</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $i = 0;
                        foreach ($product as $pro): 
                          $i++;
                          ?>
                        
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><a class="hv" href="<?php echo BASE_URL ?>c_product/show/<?php echo $pro['masp'] ?>" title="Xem / cập nhật sản phẩm"><?php echo $pro['tensp'] ?></a></td>
                          <td><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['anhsp'] ?>" width="100" height="100"></td>
                          <td><?php echo number_format($pro['giakm'],0,',','.').' đ' ?></td>
                          <td><?php echo $pro['soluong'] ?></td>
                          <td>Size<?php 

                          if($pro['kichco'] == 0)
                          {echo ' > XL';}
                          else if($pro['kichco'] == 1)
                            {echo ' L';} 
                          else if($pro['kichco'] == 2)
                            {echo ' M';}
                          else if($pro['kichco'] == 3)
                            {echo ' S';}

                          ?></td>
                          <td><?php 

                          if($pro['tinhtrang'] == 0)
                            {
                            echo 'Còn hàng';
                            }
                          else if($pro['tinhtrang'] == 1)
                            {
                              echo 'Đang cập nhật';
                            } 
                          else if($pro['tinhtrang'] == 2)
                            {
                              echo 'Hết hàng';
                            }

                          ?></td>
                          <td><a href="<?php echo BASE_URL ?>c_product/delete/<?php echo $pro['masp'] ?>"><center><button class="btn btn-round btn-danger">Xóa</button></center></a></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>