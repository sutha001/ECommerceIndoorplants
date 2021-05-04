<?php
session_start();
include "connect.php";


if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
$user_id = $_SESSION['user_id'];

$sql_userid = "SELECT * FROM user 
natural JOIN user_detail
WHERE user_id = $user_id";

$resultid = mysqli_query($connect, $sql_userid) or die(mysqli_error($connect) . ":" . $sql_userid);


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/check.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Taviraj&display=swap" rel="stylesheet">

  <title>Check out</title>
</head>

<body style="font-family: 'Taviraj', serif; background-color: whitesmoke;">
  <?php
  if ($_SESSION["username"]) {
  ?>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand px-4" href="index_user.php">
                <div style="width:100px; cursor: pointer;"><img src="user/New folder/img/Ser.png" width="100%"></div>
            </a>
        <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="menu" style="font-family: 'Source Sans Pro', sans-serif;">
          <ul class="navbar-nav ms-auto">
            <li class="navbar-item px-5">
              <a href="cart_user.php" class="nav">Cart</a>
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
    <!--Adress and place order-->
    <div style="margin-top: 3%;">
      <h1 style="text-align: center; font-family: 'Source Sans Pro', sans-serif; font-size:50px; margin-bottom: 20px;">Check out</h1>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 d-flex">
          <div class="col-12 col-md-6">
            <div class="box-address">
              <h2 style="text-align: center;">กรอกที่อยู่สำหรับจัดส่ง</h2>
              <form actiom="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php while ($row = mysqli_fetch_assoc($resultid)) : ?>
                  <div class="row">
                    <div class="col px-4 py-2">
                      <label>ชื่อจริง : </label>
                      <input type="text" class="form-control" name="fname" placeholder="First name" readonly value="<?= $row['fname']; ?>">
                    </div>
                    <div class="col px-4 py-2">
                      <label>นามสกุล : </label>
                      <input type="text" class="form-control" name="lname" placeholder="Last name" readonly value="<?= $row['lname']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col px-4 py-2">
                      <label>Email : </label>
                      <input type="text" class="form-control" name="email" placeholder="Email address" readonly value="<?= $row['email']; ?>">
                    </div>
                    <div class="col px-4 py-2">
                      <label>เบอร์โทรศัพท์ : </label>
                      <input type="text" class="form-control" name="phon" placeholder="Phone number" readonly value="<?= $row['phone_number']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col px-4 py-4">
                      <label>ที่อยู่ : </label>
                      <div><textarea style="width: 100%;" name="address" placeholder="กรุณากรอกที่อยู่อย่างละเอีนดโดยเฉพาะ**** รหัสไปรษณีย์ เขต จังหวัด****" value="<?= $row['address']; ?>" readonly><?= $row['address']; ?></textarea></div>
                    </div>
                  </div>
                  <div style="display: flex; justify-content: center;">
                    <input type="submit" name="saveorder" class="btn btn-primary btn-lg" style="width: 40%;font-family: 'Taviraj', serif;" value="ชำระเงิน">
                  </div>
                <?php endwhile ?>
              </form>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="box-order">
              <h2 style="text-align: center;">รายการของคุณ</h2>
              <div style="margin: 50px; padding-bottom: 20px;">
                <table class="table table-border-bottom">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ชื่อสินค้า</th>
                      <th scope="col">จำนวนสินค้า</th>
                      <th scope="col">ราคา</th>
                    </tr>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                      echo '<tr>';
                      echo '<th scope="row"></th>';
                      echo '<td></td>';
                      echo '<td></td>';
                      echo '<td></td>';
                      echo '</tr>';
                      echo '</tbody>';
                      echo '</table>';
                      echo '<p style="text-align: right; font-size: 20px;"><span style="font-weight: bold;">ราคารวมทั้งสิ้น</span> : 0 บาท</p>';
                    } else {
                      $total = 0;
                      foreach ($_SESSION['cart'] as $product_id => $qty) {
                        $sql  = "SELECT * FROM product WHERE product_id = $product_id";
                        $query  = mysqli_query($connect, $sql);
                        $row  = mysqli_fetch_array($query);
                        $sum  = $row['price'] * $qty;
                        $total  += $sum;
                        echo "<tr>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td align='right'>" . number_format($row['price'], 2) . "</td>";
                        echo "<td align='right'>$qty</td>";
                        echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                        echo "</tr>";
                      }
                      echo "<tr>";
                      echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
                      echo "<td align='right' bgcolor='#F9D5E3'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                      echo "</tr>";

                      echo '</table>';
                      echo '<p style="text-align: right; font-size: 20px;"><span style="font-weight: bold;">ราคารวมทั้งสิ้น</span> : ' . number_format($total, 2) . '</p>';
                      echo  '</div>';
                      echo '</div>';
                    }
                    ?>
                    <!--<div style ="text-align: center; margin-top: 5%; background-color: red;">
            กล่องนี้จะขึ้นหลังจากกดชำระเงิน
            <p>ชื่อบัญชี : นาย สุธา บินกามิตร์ <span style="padding-left: 20px;">เลขที่บัญชี : x-xxxxxxxxxxx</span></p>
            <p>หมายเลข order ของคุณ : xxxxxx <span style="padding-left: 20px;">จำนวนเงินที่ต้องชำระ : xx บาท</span></p>
          </div>-->
              </div>
            </div>
          </div>
        </div>

        <hr style="margin-top:3%;width:80%;margin-left: auto;border: solid;margin-right: auto;">

        <!--Order confirmation-->
        <form action="admin/orders/process/payment_process.php" method="POST" enctype=multipart/form-data>
          <div class="container" style="height: auto;">
            <div class="row justify-content-center">
              <h2 style="text-align: center; font-family: 'Source Sans Pro', sans-serif;">Order Confirmation</h2>
              <div class="col-3" style="text-align: center;">
                <p>หมายเลข Order</p>
                <input type="text" id="order_id" name="order_id" placeholder="#125" style="width: 50%;" required>
              </div>
              <div class="col-3" style="text-align: center;">
                <p>จำนวนเงินที่ชำระ</p>
                <input type="number" id="payment_price" name="payment_price" placeholder="#125" style="width: 50%;" required>
              </div>
              <div class="col-3" style="text-align: center;">
                <p>วันและเวลาที่โอนเงิน</p>
                <input type="datetime-local" id="datetimes" name="datetimes" placeholder="#125" style="width: 50%;" required>
              </div>
              <div class="col-3" style="text-align: center;">
                <p>สลิปการชำระเงิน</p>
                <input type="file" name="payment_image" class="form-control-file" id="exampleFormControlFile1" required>
              </div>
              <div class="w-100"></div>
              <div class="col-6 py-3" style="text-align: center;">
                <input type="submit" class="btn btn-primary btn-lg" style="width: 40%;font-family: 'Taviraj', serif; margin-top: 20px;" name="confirm" value="ยืนยัน">
              </div>
            </div>
          </div>
        </form>
      <?php
    } ?>


      <?php
      if (isset($_POST['saveorder'])) {
        // collect value of input field
        date_default_timezone_set('Asia/Bangkok');
        $creat_data = date('Y-m-d');

        $sql1  = "INSERT INTO orders (order_date,status,user_id,total_price) VALUES('$creat_data','กำลังตรวจสอบ',$user_id,$total)";
        $query1  = mysqli_query($connect, $sql1);
        //ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
        $sql2 = "SELECT MAX(order_id) AS order_id FROM orders ";
        $query2  = mysqli_query($connect, $sql2);
        $roworder = mysqli_fetch_array($query2);
        $order_id = $roworder["order_id"];

        foreach ($_SESSION['cart'] as $product_id => $qty) {

          $sql_amount_get = "SELECT amount FROM product WHERE $product_id";
          $query_amount_get  = mysqli_query($connect, $sql_amount_get);
          $row_amount_get = mysqli_fetch_array($query_amount_get);

          $amount_set = $row_amount_get['amount'] - $qty;



          $sql3  = "SELECT * FROM product WHERE product_id = $product_id ";
          $query3  = mysqli_query($connect, $sql3);
          $row3  = mysqli_fetch_array($query3);

          $sql4  = "INSERT INTO order_detali VALUES($order_id, $product_id,$qty)";
          $query4  = mysqli_query($connect, $sql4);

          $sql_amount = "UPDATE product
          SET amount = $amount_set
          WHERE product_id = $product_id";

          mysqli_query($connect, $sql_amount);
        }

        if ($query1 && $query4) {
          $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
          foreach ($_SESSION['cart'] as $product_id) {
            //unset($_SESSION['cart'][$p_id]);
            unset($_SESSION['cart']);
          }
        } else {
          $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
        }
      }
      echo '<script type="text/javascript">';
      echo 'alert("' . $msg . '");';
      echo "window.location ='index_user.php';";
      echo "</script>";
      ?>









      <!--<div style="margin-top: 3%;">
    <h1 style="text-align: center;">ORDER CONFIRMATION</h1>
  </div>

  <div class="box-order-confirm" style="display: flex;flex-direction:row;margin-top: 3%;">

    <div class="box-order-slip" style="display: flex;flex-direction:row;">

      <div class="box-order-number" style="display: flex;flex-direction:column;">
        <div class="label-order-number">
          <p style="font-size:24px;">Order Number</p>
        </div>
        <div class="text-box-order-number">
          <input type="text" id="fname" name="fname" placeholder="#125"style="width: 50%;">
        </div>
      </div>

      <div class="box-tranfer-slip" style="display: flex;flex-direction:column;">
        <div class="label-tranfer-slip">
          <p style="font-size:24px;">Tranfer Slip</p>
        </div>
        <div class="text-box-tranfer-slip">
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
      </div>
    </div>-->


      <div class="footer d-flex flex-column" style="margin-top: 3%;">
        <p style="font-family: 'Source Sans Pro', sans-serif;">This is a fucking FOOTER.</p>
      </div>

</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>