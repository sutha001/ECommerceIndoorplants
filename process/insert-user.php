<?php

include "../connect.php";
mysqli_set_charset($connect, "utf8");

session_start();

// initializing variables
$username = "";
$email    = "";
$password = "";
$fname = "";
$lname = "";
$phone_number = "";
$address = "";
$errors = array();


if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
    $address = $_POST['address'];

    $user_check_query = "SELECT * 
    FROM user
    JOIN user_detail
    on (user.user_id = user_detail.user_id)
    WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($connect, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username && $user['email'] === $email) {
            echo "<script>";
            echo "alert('Username และ Email มีผู้ใช้คนอื่นแล้ว');";  //not showing an alert box.
            echo "window.history.back();";
            echo "</script>";
        } elseif ($user['username'] === $username) {
            echo '<script>';
            echo 'alert("Username มีผู้ใช้คนอื่นแล้ว");';
            echo "window.history.back();";  //not showing an alert box.
            echo '</script>';
        } elseif ($user['email'] === $email) {
            echo '<script>';
            echo 'alert("Email มีผู้ใช้คนอื่นแล้ว");';
            echo "window.history.back();";  //not showing an alert box.
            echo '</script>';
        }
    } else {

        $password = md5($password); //encrypt the password before saving in the database

        $query1 = "INSERT INTO user (username, password,role) 
                  VALUES('$username','$password','user')";
        mysqli_query($connect, $query1);

        $query2 = "INSERT INTO user_detail (fname,lname,address,email,phone_number) 
                  VALUES('$fname', '$lname', '$address','$email','$phone_number')";
        mysqli_query($connect, $query2);


        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($connect, $query);


        while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row['user_id'];
        }
        if (isset($_SESSION["username"])) {
            echo '<script>';
            echo 'alert("สมัครสมาชิกเรียบร้อย");';
            echo "window.location ='../user/index_user.php';";
            echo '</script>';
        }
    }
}
