<?php

include "connect.php";

session_start();


$sql = "SELECT * FROM product NATURAL JOIN product_type";
$result = mysqli_query($connect, $sql);

$sql_new_product = "SELECT product_id, image, product_name FROM product ORDER BY product_id ASC";

$result_product = mysqli_query($connect, $sql_new_product);

$i = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
  <link rel="stylesheet" href="user/New folder/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Taviraj&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>HousePlantEcom</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand px-4" href="index_user.php">
                <div style="width:100px; cursor: pointer;"><img src="user/New folder/img/Ser.png" width="100%"></div>
            </a>
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
            <a href="login.php" class="nav">Log-in</a>
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
  <div class="head" style="height: auto; display: flex; align-items: center; justify-content: center;">
    <img src="user/New folder/img/logo.png" width="45%">
  </div>
  <!--  -->
  <div class="container">
    <div class="row">

      <div class="bestsell">
        <div>
          <h1 style="font-family: 'Source Sans Pro', sans-serif;">Latest Products</h1>
        </div>

        <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false, "draggable": false}'>

          <?php while ($row = $result_product->fetch_assoc()) : ?>
            <div class="carousel-cell">
              <div class="card">
                <img src="admin/images_product/<?php echo $row['image']; ?>">
                <div class="card-body">
                  <p><?php echo $row['product_name']; ?></p>
                </div>
              </div>
            </div>
            <?php if ($i == 5) {
              break;
            }
            $i++;

            ?>
          <?php endwhile ?>


        </div>
      </div>

      <div class="button-group filters-button-group">
        <button class="button is-checked" data-filter="*">ทั้งหมด</button>
        <button class="button" data-filter=".ดูดสารพิษ">ดูดสารพิษ</button>
        <button class="button" data-filter=".ไม่ต้องการแดด">ไม่ต้องการแดด</button>
        <button class="button" data-filter=".คลายความชื้น">คลายความชื้น</button>
        <button class="button" data-filter=".มีดอก">มีดอก</button>
        <button class="button" data-filter=".ฟอกอากาศ">ฟอกอากาศ</button>
      </div>

    <div class="grid d-flex text-center">
      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="col-lg-3 p-1 my-4 mx-5 element-item <?php echo $row['type_name']; ?>" >
          <div class="carditem card">
            <a href='product.php?product_id=<?php echo $row['product_id']; ?>'>
              <img src="admin/images_product/<?php echo $row['image']; ?>" class="card-img-top p-4" alt="...">
            </a>
            <div class="card-body">
              <p class="plant-name h3 pb-3"><?php echo $row['product_name']; ?></p>
              <p>ราคา : <?php echo $row['price']; ?> บาท</p>
              <?php

              if ($row['amount'] == 0) {
                echo '<a  style="text-align: center; margin:32%; font-size:1.8vw; color:red;" type="AddtoCart" >สินค้าหมด</a>';
              } else {
                echo '<a class="btn btn-primary btn-lg" style="text-align: center;" type="AddtoCart" href="cart_user.php?product_id=' . $row['product_id'] . '?>&act=add">ใส่ลงตะกร้า</a>';
              }
              ?>
            </div>
          </div>
        </div>
      <?php endwhile ?>
    </div>






    </div>
  </div>
  <div class="footer d-flex flex-column">
    <p>This is a fucking FOOTfER.</p>
  </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="/path/to/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="user/New folder/isotope.pkgd.min.js"></script>

<script>
  const cartButtons = document.querySelectorAll('.cart-button');

cartButtons.forEach(button => {
  button.addEventListener('click', cartClick);
});

function cartClick() {
  let button = this;
  button.classList.add('clicked');
}
</script>
<script>
  var fitRows = Isotope.LayoutMode.modes.fitRows.prototype;
fitRows._resetLayout = function() {

  // pre-calculate offsets for centering each row
  this.x = 0;
  this.y = 0;
  this.maxY = 0;
  this._getMeasurement( 'gutter', 'outerWidth' );
  this.centerX = [];
  this.currentRow = 0;
  this.initializing = true;
  for ( var i=0, len = this.items.length; i < len; i++ ) {
      var item = this.items[i];
      this._getItemLayoutPosition(item);
  }
  this.centerX[this.currentRow].offset = (this.isotope.size.innerWidth +this.gutter-this.x) / 2;
  this.initializing = false;
  this.currentRow = 0;

  // centered offsets were calculated, reset layout
  this.x = 0;
  this.y = 0;
  this.maxY = 0;
  this._getMeasurement( 'gutter', 'outerWidth' );
};
fitRows._getItemLayoutPosition = function( item ) {
  item.getSize();
  var itemWidth = item.size.outerWidth + this.gutter;
  // if this element cannot fit in the current row
  var containerWidth = this.isotope.size.innerWidth + this.gutter;
  if ( this.x !== 0 && itemWidth + this.x > containerWidth ) {

    if (this.initializing)
        this.centerX[this.currentRow].offset = (containerWidth-this.x) / 2;
    this.currentRow++;

    this.x = 0;
    this.y = this.maxY;
  }

  if (this.initializing && this.x == 0) {
    this.centerX.push({ offset: 0});
  }
  //if (this.centerX[this.currentRow].offset < 0)
  //  this.centerX[this.currentRow].offset = 0;

  var position = {
    x: this.x+(this.initializing?0:this.centerX[this.currentRow].offset),
    y: this.y
  };

  this.maxY = Math.max( this.maxY, this.y + item.size.outerHeight );
  this.x += itemWidth;

  return position;
};
  // external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows'
});
// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};
// bind filter button click
$('.filters-button-group').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});

</script>

</html>