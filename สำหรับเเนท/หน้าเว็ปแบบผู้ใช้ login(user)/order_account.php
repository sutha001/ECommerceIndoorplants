<?php

include "connect.php";

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
}



$sql = "SELECT * , SUM(amount_order) AS amount_or
FROM orders
NATURAL JOIN order_detali
NATURAL JOIN user
NATURAL JOIN user_detail
WHERE user_id = $user_id
GROUP BY order_id
ORDER BY order_id DESC";

$result = mysqli_query($connect, $sql) or die(mysqli_error($connect) . ":" . $sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\account.css">
    <link rel="stylesheet" href="main.css">
    <title>Account</title>
</head>

<body>
    <?php
    if ($_SESSION["username"]) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand px-4" href="user/index_user.php">
                    <div style="width:100px; cursor: pointer;"><img src="user/New folder/img/Ser.png" width="100%"></div>
                </a>
                <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="navbar-item px-5">
                            <a href="user/cart_user.php" class="nav">Cart</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="check-out_user.php" class="nav">Checkout</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="account.php" class="nav">Account</a>
                        </li>
                        <li class="navbar-item px-5">
                            <a href="process/logout-process.php" class="nav">log out</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>

        <!--Profile-->
        <div class="container">
            <div style="margin-top: 3%;">
                <a class="btn btn-primary btn-lg" style="width:20%" href="account.php">Account</a>
            </div>
            <div style="margin-top: 3%;">
                <a class="btn btn btn-light btn-lg" style="border: black solid 1px; width:20%">สถาณะคำสั่งซื้อ</a>
            </div>
            <hr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส Order</th>
                            <th scope="col">สถาณะคำสั่งซื้อ</th>
                            <th scope="col">จำนวน(ต้น)</th>
                            <th scope="col">ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['amount_or']; ?></td>
                            <td><?php echo $row['total_price']; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endwhile ?>

        </div>

        <div class="footer d-flex flex-column" style="margin-top: 3%;">
            <p>This is a fucking FOOTER.</p>
        </div>
    <?php
    } ?>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>