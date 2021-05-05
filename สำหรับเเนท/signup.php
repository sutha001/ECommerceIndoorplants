<?php include "process/insert-user.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../login.css">
  <title>sign up
  </title>
</head>

<body>


  <div class="container-fluid h-100">
    <div class="row">
      <div class="imglogin col-md-12 col-lg-6">
        <img src="img/test.jpg" width="90%">
      </div>
      <div class="bigcard col-md-12 col-lg-6" style="height: auto;">
        <div class="card" style="width: 80%;">
          <h1 class="card-header  text-center">Sign up</h1>
          <form action="process/insert-user.php" method="POST" name="form1">
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputUsername1" name="username" aria-describedby="emailHelp" placeholder="Username" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">Password</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">ชื่อ</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="fname" placeholder="ชื่อ" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">นามสกุล</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="lname" placeholder="นามสกุล" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">Email address</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="phone_number" placeholder="เบอร์โทรศัพท์" required>
            </div>
            <div class="form-group col-8 pt-3 pb-1">
              <label for="exampleInputPassword1">ที่อยู่</label>
              <textarea type="text" id="address" name="address" class="form-control" rows="3" placeholder="กรอกที่อยู *กรุณากรอกให้ละเอียด" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 66.67%;" name="reg_user">Sign up</button>
            <hr>
            <div style="text-align: center;">
              <p>Already have an account ? <a href="login.php">Sign in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>