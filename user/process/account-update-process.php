<?php
session_start();
include "../../connect.php";

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];



    $sql = "UPDATE user_detail
    SET fname = '$fname'
    lname = '$lname'
    email = '$email'
    phone_number = '$phone_number'
    address = '$address'
    WHERE user_id = $user_id";

    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect) . ":" . $sql);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("แก้ไขข้อมูลสำเร็จ");';
        echo "window.location ='../../account.php';";
        echo "</script>";
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("แก้ไขข้อมูลสำเร็จ");';
        echo "window.location ='../../account.php';";
        echo "</script>";
    }
}
