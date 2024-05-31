

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
                    <h2>Danh sách <small> phản hồi</small></h2>
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
                        Phản hồi
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>Người phản hồi</th>
                          <th>Thời gian</th>
                          <th>Nội dung</th>
                          <th>Sản phẩm</th>
                          <th>Tình trạng</th>
                          <th>Công cụ</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                   <?php foreach ($gopy as $value): ?>

                        <tr>
                          
                          <td>
                            <form action="<?php echo BASE_URL ?>c_gop_y/traloi/<?php echo $value['magy'] ?>" method="POST">
                            
                            <?php if($value['quatrinh'] == 0){  ?>
                                <button style="color: red; border: none;" type="submit">Trả lời</button>
                            <?php }else{ ?>
                                <p style="color: blue; border: none;" type="submit">Đã phản hồi</p>
                            <?php } ?>
                           </form>
                          </td>
                          <td><?php echo $value['ten'] ?></td>
                          <td><?php echo $value['ngay'] ?></td>
                          <td><?php echo substr($value['noidunggy'],0,20)."&#8230;" ?></td>
                          <td><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['anhsp'] ?>" width="100" height="100"></td>
                          <td> <?php if($value['quatrinh'] == 0){ ?>
                              <p style=" border: none; color: red;">&#9746;</p>
                          <?php }else{ ?>
                              <p style=" border: none; color: blue; ">&#9745;</p>
                          <?php } ?></td>
                          <td><a href="<?php echo BASE_URL ?>c_gop_y/xoagy/<?php echo $value['magy'] ?>"><center><button class="btn btn-round btn-danger">Xóa</button></center></a></td>

                        </tr>
                  <?php endforeach ?>
                      </tbody>
                    
                    </table>
                  </div>
                </div>
              </div>

            