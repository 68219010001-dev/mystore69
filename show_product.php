<?php
include "condb.php";
?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <title>แสดงข้อมูลสินค้า</title>

</head>

<body>

<div class="container">

    <div class="alert alert-primary h3 text-center mb-4 mt-4">
        แสดงข้อมูลสินค้า
    </div>

    <a class="btn btn-primary mb-4"
       href="fr_product.php">
        Add+
    </a>


    <table class="table table-striped table-hover">

        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ประเภท</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>รูปภาพ</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>


        <?php

        $sql = "SELECT *
                FROM tbproduct
                INNER JOIN tbtype
                ON tbproduct.type_id = tbtype.type_id
                ORDER BY tbproduct.pro_id ASC";

        $hand = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_array($hand)) {

        ?>

        <tr>

            <td>
                <?php echo $row['pro_id']; ?>
            </td>

            <td>
                <?php echo $row['pro_name']; ?>
            </td>

            <td>
                <?php echo $row['type_name']; ?>
            </td>

            <td>
                <?php echo $row['pro_price']; ?>
            </td>

            <td>
                <?php echo $row['pro_amount']; ?>
            </td>

            <td>

                <?php if ($row['pro_img'] != '') { ?>

                    <img src="img/<?php echo $row['pro_img']; ?>"
                         height="100">

                <?php } ?>

            </td>


            <td>
                <a href="edit_product.php?pro_id=<?php echo $row['pro_id']; ?>"
                 class="btn btn-warning">
                 Edit
                </a>
            </td>


            <td>

                <a href="delete_product.php?pro_id=<?php echo $row['pro_id']; ?>"
                   class="btn btn-danger"
                   onclick="Del(this.href); return false;">
                    Delete
                </a>

            </td>

        </tr>

        <?php
        }

        mysqli_close($conn);
        ?>

    </table>

</div>


<script>

function Del(mypage)
{
    var agree = confirm("ยืนยันการลบข้อมูล");

    if (agree)
    {
        window.location = mypage;
    }
}

</script>

</body>
</html> 