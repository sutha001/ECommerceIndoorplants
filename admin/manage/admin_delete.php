<?php 

include "../../connect.php";


$product_id = $_GET['product_id'];



$sql ="DELETE FROM product WHERE product_id = $product_id";

$check = mysqli_query($connect, $sql) or die (mysqli_error($connect). ":" .$sql);

if($check){
    echo '<script type="text/javascript">';
        echo 'alert("ลบสินค้าเรียบร้อย");';
        echo "window.location ='../admin_editor.php';";
        echo "</script>";
}
else{
    echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo "window.location ='../admin_editor.php';";
        echo "</script>";
}

?>