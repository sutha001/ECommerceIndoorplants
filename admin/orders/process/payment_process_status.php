<?php


include "../../../connect.php";

$order_id = $_GET['order_id'];


$sql = "UPDATE orders SET status = 'ตรวจสอบสำเร็จ' WHERE order_id = $order_id";

mysqli_query($connect, $sql);



$sql_delete = "DELETE  FROM payment_order WHERE order_id = $order_id";

mysqli_query($connect, $sql_delete);

echo '<script type="text/javascript">';
echo 'alert("ตรวจสอบสำเร็จ");';
echo "window.location ='../../admin-order.php';";
echo "</script>";




?>