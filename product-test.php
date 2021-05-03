<?php

include "connect.php";

$product_id = mysqli_real_escape_string($connect, $_GET['product_id']);


$sql = "SELECT * FROM product 
natural JOIN product_type
WHERE product_id = $product_id";

$result = mysqli_query($connect, $sql) or die(mysqli_error($connect) . ":" . $sql);

$sqlimg = "SELECT image_orther FROM images_product WHERE product_id = $product_id";
$result2 = mysqli_query($connect, $sqlimg) or die(mysqli_error($connect) . ":" . $sqlimg);

$rowimg = mysqli_num_rows($result2);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
  <link rel="stylesheet" href="css/product-test.css">
  <title>product</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand px-5" href="#">LOGO</a>
      <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-item px-4">
            <a href="" class="nav-link">Account</a>
          </li>
          <li class="navbar-item px-4">
            <a href="" class="nav-link">Cart</a>
          </li>
          <li class="navbar-item px-4">
            <a href="" class="nav-link">Checkout</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <!-- Carousel -->
  <!--  -->
  <div class="container">
    <div class="row">

      <div class="col-6 col-sm-12 d-flex flex-row" style="margin-top: 50px;">
        <div class="col-12 col-sm-6 px-2">
          <div id="slide" class="carousel slide">

            <ol class="carousel-indicators">
              <?php
              $x = 0;
              foreach ($result2 as $row) {
                $actives = '';
                if ($x == 0) {
                  $actives = 'active';
                }
              ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $x; ?>" class="<?php echo $actives; ?> ">

                </li>
              <?php $x++;
              } ?>
            </ol>
            <div class="carousel-inner">
              <?php
              $i = 0;
              foreach ($result2 as $row) {
                $actives = '';
                if ($i == 0) {
                  $actives = 'active';
                }
              ?>
                <div class="carousel-item <?php echo $actives; ?>">
                  <img class="d-block w-100" src="admin/images_product/<?php echo $row['image_orther']; ?>">
                </div>
              <?php
                $i++;
              }
              ?>
            </div>
            <a href="#slide" role="button" class="carousel-control-prev" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a href="#slide" role="button" class="carousel-control-next" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-product">
            <div class="detail-product" style="background-color: gray;">
              <h1 style="font-size: 18px;text-align: center;">PRODUCT DETAIL</h1>
              <div style="text-align: left;">
                <p>ชื่อ : <?php echo $row['product_name']; ?> </p>
                <p>ประเภท : <?php echo $row['type_name']; ?></p>
                <p>ราคา : <?php echo $row['price']; ?></p>
                <p>ลักษณะต้นไม้ : <?php echo $row['description']; ?></p>
                <p>การดูแลรักษา : <?php echo $row['care']; ?></p>
              </div>
            </div>

            <div class="quantity-product" style="display: flex;flex-direction:column;">
              <div class="empty-quantity" style="flex:1;"></div>
              <div class="text-box-quantity-product" style="display: flex; flex-direction: row; justify-content: center;">
                <a style="display: flex; align-items: center;">จำนวน (ชิ้น) </a>&ensp;<input type="number" min="1" id="fname" name="fname" style="width: 10%;">
                <input type="button" class="btn btn-secondary" style="width: 30%; margin-left: 20px; margin-right: 5px;" value="ADD TO CART">
                <input type="button" class="btn btn-secondary" style="width: 30%; margin-left: 5px; margin-right: 5px;" value="CHECKOUT">
              </div>
              <div class="empty-quantity" style="flex:1;"></div>
            </div>
          </div>
        <?php endwhile ?>
        <div class="col-12 col-sm-6 px-2">

        </div>
      </div>
      <hr style="height: 10px; margin-top: 5%;">


      <div class="bestsell">
        <div>
          <h1>Related Products</h1>
        </div>

        <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false, "draggable": false}'>

          <div id="related" class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body">
                <p>พลูด่าง</p>
              </div>
            </div>
          </div>

          <div id="related" class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body">
                <p>พลูด่าง</p>
              </div>
            </div>
          </div>

          <div id="related" class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body">
                <p>พลูด่าง</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <div class="footer d-flex flex-column">
    <p>This is a fucking FOOTER.</p>
  </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="/path/to/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


</html>