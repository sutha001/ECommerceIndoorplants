<?php

include "connect.php";

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['username'])) {
  header('location: ../login.php');
}



$sql = "SELECT * FROM user 
natural JOIN user_detail
WHERE user_id = $user_id";

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
          <div style="width:100px; cursor: pointer;"><img src= "user/New folder/img/Ser.png" width="100%"></div>
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
              <a href="user/check-out_user.php" class="nav">Checkout</a>
            </li>
            <li class="navbar-item px-5">
              <a class="nav">Account</a>
            </li>
            <li class="navbar-item px-5">
              <a href="user/process/logout-process.php" class="nav">log out</a>
            </li>
          </ul>
        </div>
      </div>
      </div>
    </nav>

    <!--Profile-->
    <div class="container">
      <div style="margin-top: 3%;">
        <a class="btn btn btn-light btn-lg" style="border: black solid 1px; width:20%">Account</a>
      </div>
      <div style="margin-top: 3%;">
        <a class="btn btn-primary btn-lg" style="width:20%" href="order_account.php">สถาณะคำสั่งซื้อ</a>
      </div>
      <hr>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="box-profile-detail">
          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Username
              </p>
            </div>
            <div class="profile-username">
              <input type="text" id="fname" name="fname" readonly value="<?= $row['username']; ?>">
            </div>
          </div>
          <hr>
          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Name
              </p>
            </div>
            <div class="profile-username">
              <input type="text" id="fname" name="fname" readonly value="<?= $row['fname']; ?>">
            </div>
          </div>
          <hr>

          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Surname
              </p>
            </div>
            <div class="profile-username">
              <input type="text" id="fname" name="fname" readonly value="<?= $row['lname']; ?>">
            </div>
          </div>
          <hr>

          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Email
              </p>
            </div>
            <div class="profile-username">
              <input type="text" id="fname" name="fname" readonly value="<?= $row['email']; ?>">
            </div>
          </div>
          <hr>

          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Phone number
              </p>
            </div>
            <div class="profile-username">
              <input type="text" id="fname" name="fname" readonly value="<?= $row['phone_number']; ?>">
            </div>
          </div>
          <hr>

          <div class="profile-detail">
            <div class="text-username">
              <p style="font-size: 24px;">
                Address
              </p>
            </div>
            <div class="profile-username">
              <textarea readonly><?php echo $row['address']; ?></textarea>
            </div>
          </div>
          <hr>

        </div>

      <?php endwhile ?>
      <div style="margin: 1% 10% 1%;">
        <a class="btn btn-dark" style="width:20%" href="user/process/account-update.php">แก้ไขข้อมูลส่วนตัว</a>
      </div>
    </div>

    <div class="footer d-flex flex-column" style="margin-top: 3%;">
      
    </div>
  <?php
  } ?>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>