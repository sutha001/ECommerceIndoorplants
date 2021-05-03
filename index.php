<?php

include "connect.php";




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
    <link rel="stylesheet" href="./main.css">
    <title>HousePlantEcom</title>
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
    <div id="multi" class="carousel slide">
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
    </div>
    <!--  -->
    <div class="container">
        <div class="row">

            <div class="bestsell">
                <div>
                    <h1>Best Seller</h1>
                </div>

                <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false, "draggable": false}'>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-cell">
                        <div class="card">
                            <img src="img/พลูด่าง.jpg">
                            <div class="card-body">
                                <p>พลูด่าง</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="filtertag" style=" height: 100px; width: 100%;">
                <div class="filter" style=" width: auto; height: 50%;">
                    <span style="padding-left: 20px;">Filter By :&ensp; </span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">ดูดสารพิษ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">ไม่ต้องการแดด</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">คลายความชื้น</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">มีดอก</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">ฟอกอากาศ</label>
                    </div>
                </div>
            </div>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-lg-4 p-4">
                    <div class="card">
                        <a href='product-test.php?product_id=<?php echo $row['product_id'];?>'>
                            <img src="admin/images_product/<?php echo $row['image']; ?>" class="card-img-top p-4" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="plant-name h3 pb-3"><?php echo $row['product_name']; ?></p>
                            <button class="btn btn-primary btn-lg" style="text-align: center;" type="AddtoCart">Add to cart</button>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>



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