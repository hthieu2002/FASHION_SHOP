<?php foreach ($khachhang as $value): ?>
<?php endforeach ?>
<style>
.button{
    color: red;
    cursor:pointer;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  overflow: auto;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;

}

.show {display:block;}

</style>
<section id="user">
   <div class="container emp-profile">
      <form action="<?php echo BASE_URL ?>khachhang/capnhat/<?php echo $value['makh'] ?>" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
         <div class="row">
            <div class="col-md-4">
               <div class="profile-img">
                  <img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo $value['hinhanh'] ?>" alt=""/>
                  <div class="file btn btn-lg btn-primary">
                     Change Photo 
                     <a class="hv" href="<?php echo BASE_URL ?>khachhang/img/<?php echo $value['makh'] ?>"><input type="file" name="image_staff"/></a>
                  </div>
               </div>

            </div>
            <div class="col-md-6">
               <div class="profile-head">
                  <h5>
                     <?php echo $value['tai_khoan_kh'] ?>
                  </h5>
                      <b id="myBtn" class="button">Đổi mật khẩu</b> 
                      <div id="mymk" class="dropdown-content">
                        <input type="password" name="matkhau"  placeholder="******">
                        <button name="doimatkhau" class="btn">Thay đổi</button>
                      </div>
                    <script type="text/javascript">
                        document.getElementById("myBtn").onclick = function() {inFunction()};
                        function inFunction() {
                          document.getElementById("mymk").classList.toggle("show");
                          document.getElementById("myBtn").style.color = 'blue';
                          document.get
                        }
                    </script>
                  <p class="proile-rating"> </span></p>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-md-2">
               <a class="profile-edit-btn" name="btnAddMore" href="<?php echo BASE_URL ?>"> Quay lại </a>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="profile-work">
               </div>
            </div>
            <div class="col-md-8" style="margin-top: -13% !important;">
               <div class="tab-content profile-tab" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="row">
                        <div class="col-md-6">
                           <label>Họ và tên : </label>
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="name" value="<?php echo $value['ten'] ?>">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Email :</label>
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="email" value="<?php echo $value['email'] ?>">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Số điện thoại :</label>
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="phone" value="<?php echo $value['dienthoai'] ?>">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Địa chỉ :</label>
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="address" value="<?php echo $value['diachi'] ?>">
                        </div>
                     </div>
                  </div>
                  <button class="submit" name="doithongtin"> Thay đổi</button>
                     <a href="<?php echo BASE_URL ?>khachhang/logout" title=""><input class="btn btn-success" value="Đăng xuất"/></a>
               </div>
            </div>
         </div>
      </form>
      <div class="row">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lịch sử đơn hàng </a>
            </li>
         </ul>
      </div>
      <div class="row">
         <?php if(isset($lichsu)){ ?>
         <table id="" class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Sản phẩm</th>
                  <th>Ngày đặt hàng</th>
                  <th>Địa chỉ</th>
                  <th>Tổng giá</th>
                  <th>Tình trạng</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $i = 0;
                   foreach ($lichsu as $ls): ?>
                    <?php $tong = 0;
                      $sum = $ls['soluongmua']*$ls['dongia'];
                      $tong += $sum;
                     ?>
               <?php $i++ ?>
               <tr>
                  <td><?php echo $i ?> </td>
                  <td><a href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $ls['masp'] ?>"><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $ls['anhsp'] ?>" width="100" height="100"></a></td>
                  <td><?php echo $ls['ngaylap'] ?></td>
                  <td><?php echo $ls['noinhan'] ?></td>
                  <td><?php echo number_format($tong,0,',','.').' đ' ?></td>
                  <form action="<?php echo BASE_URL ?>khachhang/duyetdon/<?php echo $ls['mahd'] ?>" method="POST">
                    <input type="hidden" name="idkh" value="<?php echo $ls['makh'] ?>">
                     <td>
                        <?php if($ls['tinhtrang'] == 0){ ?>
                        <p style=" border: none; color: red;">    Đang duyệt đơn ...</p>
                        <?php }else if($ls['tinhtrang'] == 1){ ?>
                        <button style=" border: none; color: red; ">Chưa nhận hàng</button>
                    <?php }else if($ls['tinhtrang'] == 4){ ?>
                        <button style=" border: none; color: red; ">Chưa nhận hàng</button>
                        <?php }else{ ?>
                        <button style=" border: none; color: blue; ">Đã nhận hàng</button>
                        <?php } ?>
                     </td>
                  </form>
               </tr>
            </tbody>
            <?php endforeach ?>
         </table>
         <?php }else{ ?>
         <b>Bạn chưa mua hàng! </b>
         <?php } ?>
      </div>
   </div>
</section>
