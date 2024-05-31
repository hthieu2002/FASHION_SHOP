 <?php 
   if (!empty($_GET['msg'])) {
      $msg = unserialize(urldecode($_GET['msg']));
      foreach ($msg as $key => $value) {
         echo "<script>
   alert('$value');
</script>";
      }
   }
 ?>
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
                    <h2>Danh sách <small>nhân viên</small></h2>
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
                        Tài khoản nhân viên / <a href="<?php echo BASE_URL ?>admin/staff" title="Đăng kí tài khoản thành viên"> Đăng kí tài khoản</a>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên tài khoản nhân viên</th>
                          <th>Hình ảnh</th>
                          <th>Tên nhân viên</th>
                          <th>Số điện thoại</th>
                          <th>Công cụ</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                            $i = 0;
                              foreach ($staff as $key => $st) {
                                $i++;
                             ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><a title="Chỉnh sửa/ xem nội dung" class="hv" href="<?php echo BASE_URL ?>admin/staff_details/<?php echo $st['manv'] ?>"><?php echo $st['tai_khoan_nv'] ?></a></td>
                           <td><img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo $st['hinhanh'] ?>" width="100" height="100"></td>
                          <td><?php echo $st['ten'] ?></td>

                          <td><?php echo $st['dienthoai'] ?></td>
                          <td><a href="<?php echo BASE_URL ?>admin/delete_staff/<?php echo $st['manv'] ?>"><center><button class="btn btn-round btn-danger">Xóa</button></center></a></td>
                        </tr>
                        <?php 
                            }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            