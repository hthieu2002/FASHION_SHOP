<form action="<?php if(isset($_SESSION['login_user'])){echo BASE_URL."giohang/muahang/".Session::get('id_user'); }else{echo BASE_URL."khachhang/dangnhap" ;} ?> " method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<section class="product">
        <div class="container">
             <?php foreach ($product as $pro): ?>
                 <?php endforeach ?>
                <input type="hidden" value="<?php echo $pro['masp'] ?>" name="masp">
                  <input type="hidden" value="<?php echo $pro['tensp'] ?>" name="tensp">
                  <input type="hidden" value="<?php echo $pro['anhsp'] ?>" name="anhsp">
                   <input type="hidden" value="<?php echo $pro['giakm'] ?>" name="giakm">

            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['anhsp'] ?>" alt="">
                    </div>
                    
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                       <h1 style="text-transform:uppercase;"><?php echo $pro['tensp'] ?></h1>
                       
                    </div>
                    <div class="product-content-right-product-price big">
                        <p><h3>Giá bán: <?php echo number_format($pro['giakm'],0,',',) ?><sup>đ</sup></h3></p>
                    </div>
                    <div class="product-content-right-product-price">
                        <s><?php echo number_format($pro['giasp'],0,',',) ?></s><sup>đ</sup>
                    </div>

                    <div class="product-content-right-product-color">
                       <p><b>Tình trạng : <?php echo $pro['tinhtrang'] != 0 ? "Hết hàng! ": "Còn hàng"; ?></b> </p>
                    </div>
                    
                    <div class="quantity">
                        <p id="sl1" style="font-weight: bold;">Số lượng:&nbsp</p>
                         <button style="width: 9%; height: 38.5px; border: none;" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;" class="reduced items-count" type="button">-</button>
                              <input style="width: 15%; height: 15%;" type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="soluong">
                              <button style="width: 9%; height: 37.5px; border: none" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button">+</button>
                              <div class="clear">
                           </div>
                    </div>
                   
                    <div class="product-content-right-product-button">
                        
                        <button type="submit"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</button>
                    </div>
                   
                    
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            ∨
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                        <p>Chi tiết</p>
                                        <?php echo $pro['mieuta'] ?>
                                </div>
                                <div class="product-content-right-bottom-content-chitiet">
                                  <!----------------------ghi chi tiết ở đây !--------------------->
                                 
                                </div>
                               
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                     <?php echo $pro['noidung'] ?>
                                    <br><br>
                                </div>
                                
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
   <!----------CẢOUSEL-------------->
    <section class="product-related container">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
        <div class=" row product-content">
            <?php foreach ($related as $re): ?>
               
           
            <div class="product-related-item">
                <a href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $re['masp'] ?>" title=""><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $re['anhsp'] ?>" alt=""></a>
                <h1><?php echo $re['tensp'] ?></h1>
                <span><?php echo number_format($pro['giasp'],0,',',) ?><sup>đ</sup></span>
               
            </div>

             <?php endforeach ?>
        </div>
    </section>
    <!---------------------CMT------------------->

    <section class="product-related container">
      <form action="<?php if(isset($_SESSION['login_user'])){echo BASE_URL."khachhang/phanhoi";}else{echo BASE_URL."khachhang/dangnhap";} ?>" method="POST">
<div class="mb-3">
  <input type="hidden" name="masp" value="<?php echo $pro['masp'] ?>">
  <input type="hidden" name="makh" value="<?php echo Session::get('id_user') ?>">

  <label for="exampleFormControlTextarea1" class="form-label">Nêu nhận xét của bạn ở bên dưới : </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
  <button type="submit" class="btn btn-success">Gửi </button>
</form>
</div>
