<?php
include "connect.php";
session_start();

@$product_id = $_GET['product_id'];

  

@$act = $_GET['act'];

if ($act == 'add' && !empty($product_id)) {
  if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
  } else {
    $_SESSION['cart'][$product_id] = 1;
  }
}


if ($act == 'remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
{
  unset($_SESSION['cart'][$product_id]);
}

if ($act == 'update') {
  $amount_array = $_POST['amount'];
  foreach ($amount_array as $product_id => $amount) {
    $_SESSION['cart'][$product_id] = $amount;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Taviraj&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css\cart.css">
  <title>cart</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand px-4" href="./index.html">
        <div style="width:100px; cursor: pointer;"><img src="./img/Ser.png" width="100%"></div>
      </a>
      <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-item px-5">
            <a href="cart.html" class="nav">Cart</a>
          </li>
          <li class="navbar-item px-5">
            <a href="html.html" class="nav">Checkout</a>
          </li>
          <li class="navbar-item px-5">
            <a href="" class="nav">Account</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <!--Adress and place order-->
  <div style="margin-top: 3%;">
    <h1 style="text-align: center;">Cart</h1>
  </div>

  <div class="container">
    <div class="your-order">
      <h1 style="font-size: 24px;text-align: center;padding-top: 3%;">YOUR ORDER</h1>
      <table style="margin-top: 2%;">
        <form id="frmcart" name="frmcart" method="post" action="?act=update">
          <table width="600" border="0" align="center" class="square">
            <tr>
              <td colspan="5" bgcolor="#CCCCCC">
                <b>ตะกร้าสินค้า</span>
              </td>
            </tr>
            <tr>
              <td bgcolor="#EAEAEA">สินค้า</td>
              <td align="center" bgcolor="#EAEAEA">ราคา</td>
              <td align="center" bgcolor="#EAEAEA">จำนวน</td>
              <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
              <td align="center" bgcolor="#EAEAEA">ลบ</td>
            </tr>
            <?php
            $total = 0;
            if (!empty($_SESSION['cart'])) {
              include("connect.php");
              foreach ($_SESSION['cart'] as $product_id => $qty) {
                $sql = "SELECT * FROM product WHERE product_id = $product_id ";
                $query = mysqli_query($connect, $sql) or die(mysqli_error($connect) . ":" . $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['price'] * $qty;
                $total += $sum;
                echo "<tr>";
                echo "<td width='334'>" . $row["product_name"] . "</td>";
                echo "<td width='46' align='right'>" . number_format($row["price"], 2) . "</td>";
                echo "<td width='57' align='right'>";
                echo "<input type='number' name='amount[$product_id]' value='$qty' style='width: 5em'/></td>";
                echo "<td width='93' align='right'>" . number_format($sum, 2) . "</td>";
                //remove product
                echo "<td width='46' align='center'><a href='cart-tung.php?product_id=$product_id&act=remove'>ลบ</a></td>";
                echo "</tr>";
              }
              echo "<tr>";
              echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
              echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
              echo "<td align='left' bgcolor='#CEE7FF'></td>";
              echo "</tr>";
            }
            ?>
            <tr>
              <td><a href="index-fix.php">กลับหน้ารายการสินค้า</a></td>
              <td colspan="4" align="right">
                <input type="submit" name="button" id="button" value="ปรับปรุง" />
                <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='check-out.php';" />
              </td>
            </tr>
          </table>
        </form>


        <?php

        ?>

</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>