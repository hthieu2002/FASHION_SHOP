 <?php 
   if (!empty($_GET['mess'])) {
      $msg = unserialize(urldecode($_GET['mess']));
      foreach ($msg as $key => $value) {
         echo "<script>
   alert('$value');
</script>";
      }
   }
 ?>

<section id="process" class="process">
   <div class="container-fluid container-fluid-max">
      <div class="row text-center py-5">
         <div class="col-12 pb-4">
            <h2 class="text-red animate__animated animate__flash">Dịch vụ của chúng tôi </h2>
         </div>
         <div class="col-12 col-sm-6 col-lg-3">
            <span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x text-red"></i>
            <i class="fas fa-map-marked fa-stack-1x text-white"></i>
            </span>
            <h3 class="mt-3 text-red h4">Tư vấn 24/7 </h3>
            <p>Nếu bạn gặp vấn đề với sản phẩm ? Hãy nhấc máy lên và gọi ngay cho chúng tôi . </p>
            <p></p>
         </div>
         <div class="col-12 col-sm-6 col-lg-3">
            <span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x text-red"></i>
            <i class="fas fa-plane fa-stack-1x text-white"></i>
            </span>
            <h3 class="mt-3 text-red h4">Chính sách đổi trả  </h3>
            <p>Sản phẩm lỗi , hư hỏng trong quá trình vận chuyển sẽ được đổi trả miễn phí </p>
         </div>
         <div class="col-12 col-sm-6 col-lg-3">
            <span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x text-red"></i>
            <i class="fas fa-car fa-stack-1x text-white"></i>
            </span>
            <h3 class="mt-3 text-red h4">Khuyến mãi </h3>
            <p>Khuyến mãi lên tới 15% cho những đơn hàng trên 1.000.000VNĐ.</p>
         </div>
         <div class="col-12 col-sm-6 col-lg-3">
            <span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x text-red"></i>
            <i class="fas fa-home fa-stack-1x text-white"></i>
            </span>
            <h3 class="mt-3 text-red h4">Thẻ khách hàng </h3>
            <p> Mua hàng để tích lũy điểm trong thẻ , điểm thẻ có thể đổi thành vocher hoặc quà .</p>
         </div>
         
      </div>
   </div>
</section>
<section id="about" class="about">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <img src="https://www.elleman.vn/wp-content/uploads/2019/03/14/trang-phuc-thoi-trang-elle-man-feature.jpg" class="img-fluid" alt="">
         </div>
         <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Thời trang - thước đo cho sự phong độ </h3>
            <p>
               “Phong cách là thước đo giúp người khác biết bạn là ai, là phương tiện thay bạn nói với thế giới những điều bạn muốn nói và quan trọng là, phong cách không bao giờ phản bội bạn”– Orson Welles 
            </p>
            <div class="row">
               <div class="col-md-6">
                  <i class="bx bx-receipt"></i>
                  <h4>Trang phục hè 2021 </h4>
                  <p>Với những bộ trang phục mát mẻ , phóng khoáng ,bộ sưu tập hè 2021 mang lại rất nhiều sự lựa chọn cho các bạn </p>
                  
               </div>
               <div class="col-md-6">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Bộ sưu tập mùa thu 2021  </h4>
                  <p>Với những chiếc áo cổ lọ , hay những chiếc áo dạ măng tô , đôi khi là những chiếc khăn choàng cổ , bộ sưu tập này rất đáng để khám phá </p>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<br>
<br>
<br>
<section id="about" class="about">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Xu hướng </h3>
            <p>
               "Ăn mặc theo kiểu tối giản" -xu hướng thiết kế trang phục theo tinh thần tối giản. Trong thời trang, tối giản là những trang phục thiên về sự đơn giản, ít chi tiết và phụ kiện. Các tông màu nghiêng về trung tính, màu tối hoặc đơn sắc. Tiêu chí của việc ăn mặc theo kiểu minimalism là "càng đơn giản, càng tinh tế".
            </p>
            <div class="col-md-6">
               <h4>Màu của năm - Xanh lá </h4>
               <p>Trong năm 2021, xanh lá cây trở thành tông màu chủ đạo được nhiều thương hiệu lăng xê như Bottega Veneta, Prada, Lacoste, .... </p>
            </div>
         </div>
         <div class="col-lg-6">
            <img src="https://studiovietnam.com/wp-content/uploads/2021/01/xu-huong-chup-anh-thoi-trang-cho-nam-dep-nhat-04.jpg" class="img-fluid" alt="">
         </div>
      </div>
   </div>
</section>
<section id="nenan">
   <div  class="container-fluid container-fluid-max">
      <div class="row">
         <?php foreach ($product as $pro): ?>
         <div class="col-md-3 col-sm-3 animate__animated animate__backInLeft animate__delay-auto">
            <div class="card" style="width: 18rem;">
               <a class="hv" href="<?php echo BASE_URL ?>c_product/chitietsanpham/<?php echo $pro['masp'] ?>" title=""><img class="card-img-top" src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['anhsp'] ?>" alt="Card image cap"></a>
               <div class="card-body">
                  <p class="card-text"><?php echo substr($pro['noidung'] , 0,100).'...'?></p>
               </div>
            </div>
         </div>
          <?php endforeach ?>
      </div>
      <div class="row">
         <a id="btnnenan" class="btn bg-red  text-white" target="_blank" href="<?php echo BASE_URL ?>k_product/sanpham" role="button">Xem thêm →</a>
      </div>
   </div>
</section>

