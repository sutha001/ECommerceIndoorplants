<?php include '../../../connect.php'; ?>


<?php


if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $main_image = $_POST['main_image'];
    $description = $_POST['description'];
    $property = $_POST['property'];
    $care = $_POST['care'];
    $price = $_POST['price'];
    $type_name = $_POST['type_name'];
    $amount = $_POST['amount'];


    $date = date("U");
    // สร้าเลข 10 หลักมาจากเวลาเพื่อนำไปเป็นชื่อรูปภาพ
    if ($main_image != "") {
        $type = getimagesize($main_image);            // หาประเภทของรูปภาพ
        if ($type[2] == 1) {
            $image = $date . "_img.gif";          // เมื่อรูปเป็น .gif
        } else if ($type[2] == 2) {
            $image = $date . "_img.jpg";         // เมื่อรูปเป็น .jpg
        } else {
            $image = $date . "_img.bmp";      // เมื่อรูปเป็น .bmp
        }
        copy($main_image, "../images_product/$image");           // copy รูปไว้ในโฟลเดอร์ image
        chmod("../images_product/$image", 0777);
    }

    $sql2 = "INSERT INTO product_type (type_name) 
    VALUES('$type_name')";
    $result = mysqli_query($connect, $sql2);

    $row = $result -> fetch_assoc();

    $select_type_name_id = "SELECT max(type_id) as type_id FROM product_type";
    $type_name_id = mysqli_query($connect, $sql2);
    $ty_id = $row['type_id'];

    $sql = "INSERT INTO product (product_name, price,image,description,property,care,type_id,amount) 
            VALUES('$product_name',$price,'$main_image','$description','$property','$care',$ty_id,$amount)";
    mysqli_query($connect, $sql);

    $image1s = $_POST['image1'];
    $date1 = date("U");
    // สร้าเลข 10 หลักมาจากเวลาเพื่อนำไปเป็นชื่อรูปภาพ
    if ($image1s != "") {
        $type1 = getimagesize($image1s);            // หาประเภทของรูปภาพ
        if ($type1[2] == 1) {
            $image1 = $date1 . "_img.gif";          // เมื่อรูปเป็น .gif
        } else if ($type1[2] == 2) {
            $image1 = $date1 . "_img.jpg";         // เมื่อรูปเป็น .jpg
        } else {
            $image1 = $date1 . "_img.bmp";      // เมื่อรูปเป็น .bmp
        }
        copy($image1s, "../images_product/$image1");           // copy รูปไว้ในโฟลเดอร์ image
        chmod("../images_product/$image1", 0777);


        $sql3 = "INSERT INTO images_product (image_orther) 
    VALUES('$image1s')";
        mysqli_query($connect, $sql3);
    }

    $image2s = $_POST['image2'];
    $date2 = date("U");
    // สร้าเลข 10 หลักมาจากเวลาเพื่อนำไปเป็นชื่อรูปภาพ
    if ($image2s != "") {
        $type2 = getimagesize($image2s);            // หาประเภทของรูปภาพ
        if ($type2[2] == 1) {
            $image2 = $date2 . "_img.gif";          // เมื่อรูปเป็น .gif
        } else if ($type2[2] == 2) {
            $image2 = $date2 . "_img.jpg";         // เมื่อรูปเป็น .jpg
        } else {
            $image2 = $date2 . "_img.bmp";      // เมื่อรูปเป็น .bmp
        }
        copy($image2s, "../images_product/$image2");           // copy รูปไว้ในโฟลเดอร์ image2
        chmod("../images_product/$image2", 0777);

        $sql4 = "INSERT INTO images_product (image_orther) 
    VALUES('$image2s')";
        mysqli_query($connect, $sql4);
    }

    $image3s = $_POST['image3'];
    $date3 = date("U");
    // สร้าเลข 10 หลักมาจากเวลาเพื่อนำไปเป็นชื่อรูปภาพ
    if ($image3s != "") {
        $type3 = getimagesize($image3s);            // หาประเภทของรูปภาพ
        if ($type3[2] == 1) {
            $image3 = $date3 . "_img.gif";          // เมื่อรูปเป็น .gif
        } else if ($type3[2] == 2) {
            $image3 = $date3 . "_img.jpg";         // เมื่อรูปเป็น .jpg
        } else {
            $image3 = $date3 . "_img.bmp";      // เมื่อรูปเป็น .bmp
        }
        copy($image3s, "../images_product/$image3");           // copy รูปไว้ในโฟลเดอร์ image
        chmod("../images_product/$image3", 0777);

        $sql5 = "INSERT INTO images_product (image_orther) 
    VALUES('$image3s')";
        mysqli_query($connect, $sql5);
    }
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มสินค้าสำเร็จ');";
    echo "</script>";
}



?>