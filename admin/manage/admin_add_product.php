<?php include '../../connect.php';

$product_id = $_GET['product_id'];
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login_admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Editor</title>
</head>

<body>
    <?php
    if ($_SESSION["username"]) {
    ?>
        <div class="area_all" style="background-color: black;">
            <div class="menu_editor">
                <div class="row_edit">
                    <a href="../admin_editor.php" class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">การจัดการสินค้า</a>
                </div>
                <div class="row_edit">
                    <a href="../admin-order.php" class="btn btn-dark" style="background-color: #4f4f4f;">Order</a>
                </div>
                <div class="row_edit">
                    <a href="../admin_manage_user.php" class="btn btn-dark" style="background-color: #4f4f4f;">การจัดการผู้ใช้</a>
                </div>
                <div class="row_edit">
                    <a href="../logout-admin-process.php" class="btn btn-dark" style="background-color: #4f4f4f;">ออก</a>
                </div>
            </div>

            <?php





            $sql = "SELECT *
        FROM product
        NATURAL JOIN product_type
        WHERE product_id = $product_id";

            $result = $connect->query($sql) or die(mysqli_error($connect) . ":" . $sql);

            $total = mysqli_num_rows($result);
            ?>

            <div class="other_editor">
                <div class="container">
                    <div class="info_right">
                        <h1>เพิ่มสินค้า</h1>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">ชื่อ</th>
                                    <th width="10%">รูปภาพ</th>
                                    <th width="10%">ราคา(บาท)</th>
                                    <th width="10%">หมวด</th>
                                    <th width="10%">จำนวนคงเหลือ </th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="#" method="POST">
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $row['product_id']; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['type_name']; ?></td><?php echo $row['amount']; ?>

                                            <td width="5%"><input type="number" name="amount" style="width: 5rem;" min="0" value="<?php echo $row['amount']; ?>"></td>
                                            <td width="5%"><input type="submit" name="submit" value="เพิ่ม"></td>
                                        </tr>
                                    <?php endwhile ?>
                                </form>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php

    if (isset($_POST['submit'])) {

        $amount = $_POST['amount'];

        $sql2 = "UPDATE product
        SET amount = $amount
        WHERE product_id = $product_id";
        $result2 = $connect->query($sql2) or die(mysqli_error($connect) . ":" . $sql2);

        echo '<script type="text/javascript">';
        echo 'alert("เพิ่มจำนวนสินค้าสำเร็จ");';
        echo "window.location ='../admin_editor.php';";
        echo "</script>";
    }



    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>