<?php
    include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ระบบสินค้า</title>
</head>
<body>
    <div class="container">
    <div class="h3 text-center alert-success mb-4 mt-4 role = alert">แสดงประเภทเสินค้า</div>
    <a href="../index.html" class="btn btn-secondary mb-4">ย้อนกลับหน้าแรก</a>
    <a href="fr_type.php" class="btn btn-success mb-4">เพิ่มข้อมูล</a>
    <div>
        <table class="table table-striped">
            <tr>
                <th>รหัสประเภทสินค้า</th>
                <th>ชื่อประเภทสินค้า</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbtype";
                $result = mysqli_query($conn, $sql);
                while ($row =mysqli_fetch_array($result)){
                
            ?>

            <tr>
                <td><?=$row["type_id"] ?></td>
                <td><?=$row["type_name"] ?></td>
                <td><a href ="edit_type.php?type_id=<?=$row["type_id"] ?>" class="btn btn-warning">แก้ไข</a></td>
                <td><a href ="delete_type.php?type_id=<?=$row["type_id"] ?>" class="btn btn-danger" onclick="Del(this.href); return false;">ลบ</td>
            </tr>
            <?php
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    </div>
</body>
</html>
<script language="Javascript">
    function Del(mypage) {
        var agree = confirm("ยืนยันการลบข้อมูล");
        if (agree){
            window.location = mypage;
        }
    }

</script>