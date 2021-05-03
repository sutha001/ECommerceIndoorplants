<?php

include "connect.php";

$user_id = mysqli_real_escape_string($connect, $_GET['user_id']);


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
  <title>Lab07</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand px-5" href="index.html">LOGO</a>
      <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-item px-4">
            <a href="" class="nav-link">Account</a>
          </li>
          <li class="navbar-item px-4">
            <a href="cart.html" class="nav-link">Cart</a>
          </li>
          <li class="navbar-item px-4">
            <a href="check-out.html" class="nav-link">Checkout</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  
  <!--Profile-->
  <div class="container">
    <div style="margin-top: 3%;">
      <h1>Account</h1>
    </div><hr>

  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <div class="pic-profile">
      <img src="img\พลูด่าง.jpg" style="border-radius: 50%;width: 100%;">
    </div>

    <div class="box-profile-detail">
      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Username
          </p>
        </div>
        <div class="profile-username">
          <input type="text" id="fname" name="fname" readonly value="<?= $username; ?>">
        </div>
      </div><hr>

      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Name
          </p>
        </div>
        <div class="profile-username">
          <input type="text" id="fname" name="fname" value="<?= $fname; ?>">
        </div>
      </div><hr>

      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Surname
          </p>
        </div>
        <div class="profile-username">
          <input type="text" id="fname" name="fname" value="<?= $lname; ?>">
        </div>
      </div><hr>

      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Email
          </p>
        </div>
        <div class="profile-username">
          <input type="text" id="fname" name="fname" value="<?= $email; ?>">
        </div>
      </div><hr>

      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Phone number
          </p>
        </div>
        <div class="profile-username">
          <input type="text" id="fname" name="fname" value="<?= $phone_number; ?>">
        </div>
      </div><hr>

      <div class="profile-detail">
        <div class="text-username">
          <p style="font-size: 24px;">
            Address
          </p>
        </div>
        <div class="profile-username">
          <form>
            <textarea><?php echo $row['address']; ?></textarea>
          </form>
        </div>
      </div><hr>
      
    </div>

    <?php endwhile ?>

  </div>

  <div class="footer d-flex flex-column" style="margin-top: 3%;">
    <p>This is a fucking FOOTER.</p>
  </div>
    
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>