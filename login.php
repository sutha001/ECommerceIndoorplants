<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./login.css">
  <title>login
  </title>
</head>
<body>
  <div class="container-fluid h-100">
    <div class="row">
      <div class="imglogin col-6" style="height: 100vh;">
        <img src="test.jpg" width="90%" >
      </div>
      <div class="bigcard col-6" style="height: auto;">
        <div class="card" style="width: 80%;">
          <h1 class="card-header  text-center">Sign in</h1>
          <form>
            <div class="form-group col-8 pt-3 pb-3">
              <label for="exampleInputEmail1">Username</label>
              <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group col-8 pt-3 pb-5">  
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="login" class="btn btn-primary btn-lg btn-block" style="width: 66.67%;">Login</button>
            <hr>
            <div style="text-align: center;">
              <p><a href="#">Sign up</a></p>
              <p><a href="#">Forgot your password</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>