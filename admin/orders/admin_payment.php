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
                <a href="../admin_editor.php" class="btn btn-dark" style="background-color: #4f4f4f;">การจัดการสินค้า</a>
            </div>
            <div class="row_edit">
                <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">Order</a>
            </div>
            <div class="row_edit">
                <a href="../admin_manage_user.php" class="btn btn-dark" style="background-color: #4f4f4f;">การจัดการผู้ใช้</a>
            </div>
        </div>

        <?php

        $perpage = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }


        $start = ($page - 1) * $perpage;

        $sql = "SELECT * , CONCAT(fname,' ',lname) AS fullname
        FROM payment_order
        NATURAL JOIN orders
        NATURAL JOIN user
        NATURAL JOIN user_detail
        limit {$start} , {$perpage}";

        $result = $connect->query($sql) or die(mysqli_error($connect) . ":" . $sql);


        $total = mysqli_num_rows($result);
        ?>

        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>หลักฐานการโอนเงิน</h1>
                    <hr>
                    <div style="margin: 3% 0%;">
                        <a class="btn btn-dark" style="background-color: #4d4d4d;" href="../admin-order.php">ทั้งหมด</a>
                        <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">หลักฐาน</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">order_id</th>
                                <th width="15%">ชื่อ</th>
                                <th width="15%">สลิป</th>
                                <th width="10%">ยืนยันการชำระเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['order_id']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td>
                                        <a class="lightbox" href="#dog">
                                            <img src="../image_payment/<?php echo $row['payment_image']; ?>" />
                                        </a>
                                        <div class="lightbox-target" id="dog">
                                            <img src="../image_payment/<?php echo $row['payment_image']; ?>" />
                                            <a class="lightbox-close" href="#"></a>
                                        </div>
                                    </td>
                                    <td><a class="btn btn-dark" style="background-color: #4d4d4d;" href="process/payment_process.php?order_id=<?php echo $row['order_id']; ?>">ยืนยัน</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    $sql2 = "select * from order_detali ";
                    $query2 = mysqli_query($connect, $sql2);
                    $total_record = mysqli_num_rows($query2);
                    $total_page = ceil($total_record / $perpage);
                    ?>
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="admin_order.php" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li><a class="btn btn-dark" style="background-color: #4d4d4d;" href="admin_order.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="admin_order.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>