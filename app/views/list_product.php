<section >
   <form action="<?php echo BASE_URL ?>k_product/timkiem" method="POST">
   <div id="search-product" class="container-fluid ">
      <select class="form-select" aria-label="Default select example" name="loai"> 
         <option selected>Chọn loại sản phẩm</option>
         <?php foreach ($loaisp as $value): ?>
         <option value="<?php echo $value['tenlsp'] ?>"><?php echo $value['tenlsp'] ?></option>
          <?php endforeach ?>
      </select>
      <select class="form-select" aria-label="Default select example" name="kichco">
         <option selected>Chọn kích cỡ</option>
         <option value="3">XL</option>
         <option value="2">L</option>
        <option value="1">M</option>
         <option value="0">S</option>
      </select>
      <select class="form-select" aria-label="Default select example" name="gia">
         <option selected>Chọn giá tiền</option>
         <option value="0">< 100.000 đ</option>
         <option value="A">100.000 - 500.000 đ</option>
         <option value="B">500.000 - 1.000.000 đ</option>
      </select>
      <button type="submit" class="col">Tìm</button>
   </div>
   </form>
</section>
<section>
 
     
 
   <div class="brand">
   <div class="brand-items container-fluid row">
       <?php foreach ($sanpham as $sp): ?>
   <div class="brand-item ">
      <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $sp['anhsp'] ?>">    
      <div class="sub">
         <div class="thong_tin">
            <a href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $sp['masp'] ?>"><button>Chi tiết </button>
            </a>
         </div>

      </div>
      <center>
         <br>
      <p class="name"><?php echo $sp['tensp'] ?></p>
      <p class="price"><?php echo number_format($sp['giasp'],0,',','.').' đ' ?></p>
      </center>
   </div>
    <?php endforeach ?>
</section>
<br><br><br>
<center>
<a href="<?php echo BASE_URL ?>k_product/sanpham" title="">1</a>
<?php foreach ($count as $value): ?>
   <?php 
      $number = $value['number'] / 9;
      $du = $value['number'] % 9;
      if($du > 0){
         $number += 1;
      }
      for($i = 2; $i <= $number; $i++){
    ?>
    <a href="<?php echo BASE_URL ?>k_product/sanphamPage/<?php echo $i ?>" title=""><?php echo $i ?></a>
 <?php } ?>
<?php endforeach ?></center>




