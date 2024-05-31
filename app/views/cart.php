<?php 
   if (!empty($_GET['sdt'])) {
      $msg = unserialize(urldecode($_GET['sdt']));
      foreach ($msg as $key => $value) {
         echo "<script>
   alert('$value');
</script>";
      }
   }

 ?>

<section id="user">
   <div class="container emp-profile">
      <form method="post">
         <div class="row">
            <div class="col-md-4">
               <?php foreach ($khachhang as $kh): ?>
                  
              <?php endforeach ?>
               <div class="profile-img">
                  <img src="<?php echo BASE_URL ?>public/uploads/admin/<?php echo $kh['hinhanh'] ?>" alt=""/>
               </div>
            </div>
            <div class="col-md-6">
               <div class="profile-head">
                  <h5>
                     <?php echo $kh['tai_khoan_kh'] ?> 
                  </h5>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-md-2">
               <a type="submit" class="profile-edit-btn" name="btnAddMore" href="<?php echo BASE_URL ?>giohang/thongtin/<?php echo $kh['makh'] ?>"> Chỉnh sửa</a>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="profile-work">
               </div>
            </div>
            <div class="col-md-8" style="margin-top: -15% !important;">
               <div class="tab-content profile-tab" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="row">
                        <div class="col-md-6">
                           <label>Họ và tên : </label>
                        </div>
                        <div class="col-md-6">
                           <p><?php echo $kh['ten'] ?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Địa chỉ :</label>
                        </div>
                        <div class="col-md-6">
                           <p><?php echo $kh['diachi'] ?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Email</label>
                        </div>
                        <div class="col-md-6">
                           <p><?php echo $kh['email'] ?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Số điện thoại </label>
                        </div>
                        <div class="col-md-6">
                           <p><?php echo $kh['dienthoai'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
<section id="cart-prd">
 <form action='<?php echo BASE_URL ?>giohang/updategiohang/<?php echo $kh['makh'] ?>' method="POST">

<div class="card">
   <div class="row">
      <div class="col-md-8 cart">
         <div class="title">
            <div class="row">
               <div class="col">
                  <h4><b>Giỏ hàng</b></h4>
               </div>
               <?php 
                  if(isset($_SESSION["shopping_cart"])){
                  ?>
            </div>
         </div>
         <?php
            $tong = 0;
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
             $subtotal = $value['giakm']* $value['soluong'];
             $tong+= $subtotal;
            ?>
         <div class="row border-top border-bottom">
            <div class="row main align-items-center">
               <div class="col-2"><a style="cursor: pointer;" href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $value['masp'] ?>"><img class="img-fluid" src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['anhsp'] ?>"></a></div>
               <div class="col">
                  <div class="row text-muted"><?php echo $value['tensp'] ?></div>
               </div>
               <div class="col"><input style="padding: 7px 5px; width: 25%; margin-left: 25%; margin-top: 15%;" type="number" min="1" name="qty[<?php echo $value['masp'] ?>]" value="<?php echo $value['soluong'] ?>"></div>

               <div class="col"> <?php echo number_format($subtotal,0,',',). ' đ' ?> <button type="submit" name="delete_cart" value="<?php echo $value['masp'] ?>">&#10005;</button></div>
            </div>
         </div>
         <?php } ?>
         <div class="back-to-shop"><a href="<?php echo BASE_URL ?>">&leftarrow;</a><span class="text-muted">Quay lại /</span>
         <button type="submit" style="text-decoration: none; border: none;outline:none" name="update_cate" value="<?php echo $value['masp'] ?>"><span class="text-muted">Cập nhật giỏ hàng</span></button>
         </div>
      </div>
      </form>
      <div class="col-md-4 summary">
         <div>
            <h5><b>Hóa đơn</b></h5>
         </div>
         <hr>
         <form action="<?php echo BASE_URL ?>giohang/dathang" method="POST" accept-charset="utf-8">
            <div class="row" >
               <div class="col" style="padding-left:0;">Anh/Chị : </div>
               <div class="col text-right"><?php echo $kh['ten']; ?></div>
            </div>
            <input type="hidden" value="<?php echo Session::get('id_user'); ?>" name="id"/>
            <div class="col" style="padding-left:0; padding-top: 5px">Địa chỉ* : </div>
            <input class="col" name="address" required="required" value="<?php echo $kh['diachi'] ?>"/>
            <div class="col" style="padding-left:0;">Số điện thoại* :</div>
            <?php if($kh['dienthoai'] == 0){ ?>
               <input style="background-color: red;" class="col" name="phone" required="required" value="<?php echo $kh['dienthoai'] ?>"  readonly/>
            <?php }else{ ?>
               <input class="col" name="phone" required="required" value="<?php echo $kh['dienthoai'] ?>" readonly/>
            <?php } ?>
           
            <div class="col" style="padding-left:0;">Ghi chú cho shop :</div>
            <textarea class="col" name="ghichu" style="width: 100%;"></textarea>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
               <div class="col">Tổng tiền</div>
               <div class="col text-right"><?php echo number_format($tong,0,',',). ' đ' ?></div>
               <input type="hidden" name="tongtien" value="<?php echo $tong ?>">
            </div>
            <button type="submit" class="btn">CHỐT ĐƠN</button>
            <?php 
               }else{
               ?>
            <tr>
               <td colspan="7" >
                  <div class="sum_price_all">
                     <span class="text_price">Giỏ hàng trống !</span> 
                  </div>
               </td>
            </tr>
            <?php 
               } 
               ?>
      </div>
       
      </form>
   </div>
</div>
