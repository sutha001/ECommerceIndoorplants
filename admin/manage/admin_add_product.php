<?php include '../../connect.php';

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
    <div class="area_all" style="background-color: black;">
        <div class="menu_editor">
            <div class="row_edit">
                <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">การจัดการสินค้า</a>
            </div>
            <div class="row_edit">
                <a href="../admin-order.php" class="btn btn-dark" style="background-color: #4f4f4f;">Order</a>
            </div>
            <div class="row_edit">
                <a href="admin_manage_user.php" class="btn btn-dark" style="background-color: #4f4f4f;">การจัดการผู้ใช้</a>
            </div>
        </div>

        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>Order</h1>
                    <hr>
                    <form action="process_manage/add-product-process.php" method="POST" enctype=multipart/form-data>
                        <label>ชื่อสินค้า :</label>
                        <input type="text" name="product_name" required><br><br>
                        <label>รูปสินค้า (หลัก) :</label>
                        <input type="file" name="main_image" required><br><br>
                        <label>รูปสินค้า (รอง1) :</label>
                        <input type="file" name="image1" required>
                        <label>รูปสินค้า (รอง2) :</label>
                        <input type="file" name="image2">
                        <label>รูปสินค้า (รอง3) :</label>
                        <input type="file" name="image3"><br><br>
                        <label>รายละเอียด :</label>
                        <textarea type="text" name="description" rows="5" cols="50" required></textarea><br><br>
                        <label>คุณสมบัติ :</label>
                        <input type="text" name="property" required><br><br>
                        <label>การดูแลรักษา :</label>
                        <input type="text" name="care" required><br><br>
                        <label>ราคา :</label>
                        <input type="number" name="price" required><br><br>
                        <label>หมวด :</label>
                        <select name="type_name" required>
                            <option value="ดูดสารพิษ">ดูดสารพิษ</option>
                            <option value="ไม่ต้องการแดด">ไม่ต้องการแดด</option>
                            <option value="มีดอก">มีดอก</option>
                            <option value="ฟอกอากาศ">ฟอกอากาศ</option>
                        </select>
                        <label>จำนวน :</label>
                        <input type="number" name="amount" required><br><br>
                        <hr>
                        <input type="submit" name="submit" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>