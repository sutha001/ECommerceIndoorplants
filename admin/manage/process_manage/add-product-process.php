<?php include '../../../connect.php'; ?>


<?php


if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];

    $main_image_tmp_name = $_FILES['main_image']['tmp_name'];
    $main_image_type = $_FILES['main_image']['type'];
    $main_image_name = "../../images_product/" . $_FILES['main_image']['name'];
    $main_image_filename = $_FILES['main_image']['name'];

    $description = $_POST['description'];
    $property = $_POST['property'];
    $care = $_POST['care'];
    $price = $_POST['price'];
    $type_name = $_POST['type_name'];
    $amount = $_POST['amount'];

    $type_id = "";
    $product_id_image = "";


    if (is_uploaded_file($main_image_tmp_name)) {
        copy($main_image_tmp_name, $main_image_name);
    }

    $type_sql = "SELECT type_id FROM product_type WHERE type_name like '%$type_name%'";
    $result = mysqli_query($connect, $type_sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $type_id = $row['type_id'];
    }



    $sql = "INSERT INTO product (product_name, price,image,description,property,care,type_id,amount) 
        VALUES('$product_name',$price,'$main_image_filename','$description','$property','$care',$type_id,$amount)";
    mysqli_query($connect, $sql);



    $proid = "SELECT max(product_id) as product_id  FROM product";
    $result_pro_id = mysqli_query($connect, $proid);

    while ($row = mysqli_fetch_assoc($result_pro_id)) {
        $product_id_image = $row['product_id'];
    }




    //image รองต่างๆ

    $main_image_tmp_name1 = $_FILES['image1']['tmp_name'];
    $main_image_type1 = $_FILES['image1']['type'];
    $main_image_name1 = "../../images_product/" . $_FILES['image1']['name'];
    $main_image_filename1 = $_FILES['image1']['name'];

    if ($main_image_filename1 != "") {
        if (is_uploaded_file($main_image_tmp_name1)) {
            copy($main_image_tmp_name1, $main_image_name1);
        }
        $sqlimg1 = "INSERT INTO images_product (product_id, image_orther) 
        VALUES($product_id_image,'$main_image_filename1')";
        mysqli_query($connect, $sqlimg1);
    }


    $main_image_tmp_name2 = $_FILES['image2']['tmp_name'];
    $main_image_type2 = $_FILES['image2']['type'];
    $main_image_name2 = "../../images_product/" . $_FILES['image2']['name'];
    $main_image_filename2 = $_FILES['image2']['name'];

    if ($main_image_filename2 != "") {
        if (is_uploaded_file($main_image_tmp_name2)) {
            copy($main_image_tmp_name2, $main_image_name2);
        }
        $sqlimg2 = "INSERT INTO images_product (product_id, image_orther) 
        VALUES($product_id_image,'$main_image_filename2')";
        mysqli_query($connect, $sqlimg2);
    }

    $main_image_tmp_name3 = $_FILES['image3']['tmp_name'];
    $main_image_type3 = $_FILES['image3']['type'];
    $main_image_name3 = "../../images_product/" . $_FILES['image3']['name'];
    $main_image_filename3 = $_FILES['image3']['name'];
    if ($main_image_filename3 != "") {
        if (is_uploaded_file($main_image_tmp_name3)) {
            copy($main_image_tmp_name3, $main_image_name3);
        }
        $sqlimg3 = "INSERT INTO images_product (product_id, image_orther) 
        VALUES($product_id_image,'$main_image_filename3')";
        mysqli_query($connect, $sqlimg3);
    }






    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มสินค้าสำเร็จ');";
    echo "window.location ='../../admin_editor.php';";
    echo "</script>";
}



?>