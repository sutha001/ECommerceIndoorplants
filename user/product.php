<?php

include "../connect.php";

session_start();

if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
}


$product_id = mysqli_real_escape_string($connect, $_GET['product_id']);


$sql = "SELECT * FROM product 
natural JOIN product_type
WHERE product_id = $product_id";

$result = mysqli_query($connect, $sql) or die(mysqli_error($connect) . ":" . $sql);

$sql_new_product = "SELECT product_id, image, product_name FROM product ORDER BY product_id ASC";
$result_product = mysqli_query($connect, $sql_new_product);

$sqlimg = "SELECT image_orther FROM images_product WHERE product_id = $product_id";
$result2 = mysqli_query($connect, $sqlimg) or die(mysqli_error($connect) . ":" . $sqlimg);


$rowimg = mysqli_num_rows($result2) or die(mysqli_error($connect) . ":" . $sql_new_product);

$i


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Taviraj&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/product-test.css">
    <title>product</title>
</head>

<body>
    <?php
    if ($_SESSION["username"]) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand px-4" href="index_user.php">
                    <div style="width:100px; cursor: pointer;"><img src="New folder/img/Ser.png" width="100%"></div>
                </a>
                <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="navbar-item px-5">
                            <a href="cart_user.php" class="nav">Cart</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="check-out_user.php" class="nav">Checkout</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="../account.php" class="nav">Account</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="process/logout-process.php" class="nav">log out</a>
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
                                        <img class="d-block w-100" src="../admin/images_product/<?php echo $row['image_orther']; ?>">
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

                    <div class="col-12 col-sm-6 px-2">
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <div class="box-product">
                                <div class="detail-product">

                                    <h1 style="font-size: 28px;text-align: center; font-family: 'Taviraj', serif;">รายละเอียดสินค้า</h1>
                                    <div style="text-align: left;">
                                        <p>ชื่อ : <?php echo $row['product_name']; ?></p>
                                        <p>ประเภท : <?php echo $row['type_name']; ?></p>
                                        <p>ราคา : <?php echo $row['price']; ?></p>
                                        <p>ลักษณะต้นไม้ : <?php echo $row['description']; ?></p>
                                        <p>การดูแลรักษา : <?php echo $row['care']; ?></p>
                                    </div>
                                </div>

                                <div class="quantity-product" style="display: flex;flex-direction:column;">
                                    <div class="empty-quantity" style="flex:1;"></div>
                                    <div class="text-box-quantity-product" style="display: flex; flex-direction: row; justify-content: center;">
                                        <a style="display: flex; align-items: center; font-family: 'Taviraj', serif;">จำนวนสินค้าในสต๊อก</a>&ensp;<input readonly="" type="number" min="1" id="fname" name="fname" style="width: 10%;" value=<?= $row['amount']; ?>>

                                        <?php

                                        if ($row['amount'] == 0) {
                                            echo '<a  style="text-align: center; margin:32%; font-size:1.8vw; color:red;" type="AddtoCart" >สินค้าหมด</a>';
                                        } else {
                                            echo "<a class='btn btn-primary btn-lg' style='width: 30%; margin-left: 20px; margin-right: 5px;' type='AddtoCart' href='cart_user.php?product_id=$product_id&act=add'>ใส่ลงตะกร้า</a>";
                                        }
                                        ?>



                                    </div>
                                    <div class="empty-quantity" style="flex:1;"></div>
                                </div>
                            </div>
                        <?php endwhile ?>

                    </div>
                </div>
                <hr style="height: 10px; margin-top: 5%;">


                <div class="bestsell">
                    <div>
                        <h1>Related Products</h1>
                    </div>

                    <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false, "draggable": false}'>

                        <?php while ($row = $result_product->fetch_assoc()) : ?>
                            <div class="carousel-cell" style="width:250px;margin-left: 3%;">
                                <div class="card">
                                    <a href='product.php?product_id=<?php echo $row['product_id']; ?>'>
                                        <img src="../admin/images_product/<?php echo $row['image']; ?>" style="width: 70%; margin: 10% 10% 10% 15%;">
                                    </a>
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

            </div>
        </div>
        <div class="footer d-flex flex-column">
            <p>This is a fucking FOOTER.</p>
        </div>
    <?php
    } ?>
</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="/path/to/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


</html>