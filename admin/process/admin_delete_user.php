<?php 

include "../../connect.php";


$user_id = $_GET['user_id'];



$sql ="DELETE user , user_detail 
FROM user 
NATURAL JOIN user_detail 
WHERE user_id =  $user_id";

$check = mysqli_query($connect, $sql) or die (mysqli_error($connect). ":" .$sql);

if($check){
    echo '<script type="text/javascript">';
        echo 'alert("ลบข้อมูลลูกค้าเรียบร้อย");';
        echo "window.location ='../admin_manage_user.php';";
        echo "</script>";
}
else{
    echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo "window.location ='../admin_manage_user.php';";
        echo "</script>";
}

?>