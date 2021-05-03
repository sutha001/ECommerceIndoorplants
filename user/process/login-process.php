<?php
include "../../connect.php";

session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connect, $_POST['Username']);
    $password = mysqli_real_escape_string($connect, $_POST['Password']);



    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($connect, $query);


    while ($row = mysqli_fetch_assoc($results)) {
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $row['user_id'];
    }
    if (isset($_SESSION["username"])) {
        header("Location: ../index_user.php");
    }
}

?>

?>