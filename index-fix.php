<?php

include "connect.php";

session_start();


$sql = "SELECT * FROM product";
$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
  <link rel="stylesheet" href="main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Taviraj&display=swap" rel="stylesheet"> 
  <title>HousePlantEcom</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <!--<a class="navbar-brand px-5" href="index.html">LOGO</a>-->
      <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-item px-5">
            <a href="cart-tung.php" class="nav">Cart</a>
          </li>
          <li class="navbar-item px-5">
            <a href="check-out.php" class="nav">Checkout</a>
          </li>
          <li class="navbar-item px-5">
            <a href="login.php" class="nav" >Log-in</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <!-- Carousel -->
  <!--<div id="multi" class="carousel slide">
    <ol class="carousel-indicators">
      <li class="active" data-bs-target="#multi" data-bs-slide-to="0"></li>
      <li class="active" data-bs-target="#multi" data-bs-slide-to="1"></li>
      <li class="active" data-bs-target="#multi" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./img/cat1.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>แมว1</h5>
          <p>น้อนแมว</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./img/cat2.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>แมว2</h5>
          <p>น้อนแมว</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./img/cat3.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>แมว3</h5>
          <p>น้อนแมว</p>
        </div>
      </div>
    </div>
    <a href="#multi" role="button" class="carousel-control-prev" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a href="#multi" role="button" class="carousel-control-next" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>-->
  <div class="head"style="height: auto; display: flex; align-items: center; justify-content: center;">
    <img src="img/logo.png" width="45%">
  </div>
  <!--  -->
  <div class="container">
    <div class="row">

      <div class="bestsell">
        <div><h1 style="font-family: 'Source Sans Pro', sans-serif;">Best Seller</h1></div>

        <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false, "draggable": false}'>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg" >
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          <div class="carousel-cell">
            <div class="card">
              <img src="img/พลูด่าง.jpg">
              <div class="card-body"><p>พลูด่าง</p></div>
            </div>
          </div>

          
        </div>
      </div>

      <div class="filtertag" style=" height: 100px; width: 100%;">
        <div class="filter" style=" width: auto; height: 50%;">
          <span style="padding-left: 20px; font-family: 'Source Sans Pro', sans-serif;">Filter By :&ensp; </span>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">ดูดสารพิษ</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">ไม่ต้องการแดด</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">คลายความชื้น</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
            <label class="form-check-label" for="inlineCheckbox4">มีดอก</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option">
            <label class="form-check-label" for="inlineCheckbox5">ฟอกอากาศ</label>
          </div>
        </div>
      </div>

    <?php while ($row = $result->fetch_assoc()) : ?>
      <?php echo $row['product_id'];?>
      <div class="col-lg-4 p-4">
        <div class="carditem card">
          <a href='product.php?product_id=<?php echo $row['product_id'];?>'>
                            <img src="admin/images_product/<?php echo $row['image']; ?>" class="card-img-top p-4" alt="...">
                        </a>
          <div class="card-body">
            <p class="plant-name h3 pb-3"><?php echo $row['product_name']; ?></p>
            <p>ราคา : <?php echo $row['price']; ?> บาท</p>
            <a class="btn btn-primary btn-lg" style="text-align: center;" href='cart-tung.php?product_id=<?php echo $row['product_id']; ?>&act=add' >ใส่ลงตะกร้า</a>
          </div>
        </div>
      </div>
    <?php endwhile ?>

      

      


    </div>
  </div>
  <div class="footer d-flex flex-column">
    <p>This is a fucking FOOTfER.</p>
  </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="/path/to/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


</html>