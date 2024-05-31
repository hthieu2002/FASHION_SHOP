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
                    <h2>Danh sách <small> loại sản phẩm</small></h2>
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
                        Loại sản phẩm / <a href="<?php echo BASE_URL ?>c_category/add" title="Thêm một danh mục sản phẩm"> Thêm danh mục mới</a>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên loại sản phẩm</th>
                          <th>Công cụ</th>
                         
                        </tr>
                      </thead>
                      <tbody>
               			<?php
               			$i = 0;
               			 foreach ($category as $cate):
               			 	$i++;

               			  ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><a href="<?php echo BASE_URL ?>c_category/edit/<?php echo $cate['malsp'] ?>" title="Chỉnh sửa/ xem nội dung"><?php echo $cate['tenlsp'] ?></a></td>
                          <td><a href="<?php echo BASE_URL ?>c_category/delete/<?php echo $cate['malsp'] ?>"><center><button class="btn btn-round btn-danger">Xóa</button></center></a></td>
                        </tr>
                       <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            