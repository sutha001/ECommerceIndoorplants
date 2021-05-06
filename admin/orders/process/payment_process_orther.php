<?php include '../../../connect.php'; ?>


<?php


if (isset($_POST['confirm'])) {

    $order_id = $_POST['order_id'];

    $main_image_tmp_name = $_FILES['payment_image']['tmp_name'];
    $main_image_type = $_FILES['payment_image']['type'];
    $main_image_name = "../../image_payment/" . $_FILES['payment_image']['name'];
    $main_image_filename = $_FILES['payment_image']['name'];

    $payment_date = $_POST['datetimes'];
    $payment_price = $_POST['payment_price'];


    if (is_uploaded_file($main_image_tmp_name)) {
        copy($main_image_tmp_name, $main_image_name);
    }


    $sql = "INSERT INTO payment_order (order_id, payment_date,payment_image,payment_price) 
        VALUES($order_id,'$payment_date','$main_image_filename','$payment_price')";
    mysqli_query($connect, $sql);



    echo "<script type='text/javascript'>";
    echo "alert('แจ้งการโอนเงินสำเร็จ');";
    echo "window.location ='../../../user/index_user.php';";
    echo "</script>";
}



?>