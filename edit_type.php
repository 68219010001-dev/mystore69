<?php
    include 'condb.php';

    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM tbtype WHERE type_id = '$type_id' ";
    $result = mysqli_query($conn, $sql);

    $row =mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>แก้ไขประเภทสินค้า</title>
</head>
<body>
    <div class ="container">
    <div class ="h3 text-center alert alert-success mb-4 mt-4 role = alert" >แก้ไขประเภทสินค้า</div>
    <div>
        <form method="POST" action="update_type.php">
            <div class = "mb-3 mt-4">
            <label class = "form-label" >รหัสสินค้า</label>
            <input type="text" name="type_id" value="<?=$row['type_id'] ?>" class="form-control mb-1" readonly><br>

            <label class = "form-label" >ชื่อสินค้า</label>
            <input type="text" name="type_name" value="<?=$row['type_name'] ?>" class="form-control mb-1" ><br>

            <input type="submit" value="แก้ไขข้อมูล" class = "btn btn-success">
            <!-- <input type="reset" value="ยกเลิก" class = "btn btn-danger"> -->
            <a href="show_type.php" class="btn btn-danger">ยกเลิก</a>
        </div>
        </form>
    </div>
    </div>
</body>
</html>