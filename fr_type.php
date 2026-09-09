<?php
    include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>เพิ่มประเภทสินค้า</title>
</head>
<body>
    <div class ="container">
    <div class ="h3 text-center alert alert-success mb-4 mt-4 role = alert" >เพิ่มประเภทสินค้า</div>
    <div>
        <form method="POST" action="insert_type.php">
            <div class = "mb-3 mt-4">

            <label>ชื่อประเภทสินค้า</label>
            <input type="text" name="type_name" class="form-control mb-1" required><br>   

            <input type="submit" value="บันทึกข้อมูล" class = "btn btn-success">
            <!-- <input type="reset" value="ยกเลิก" class = "btn btn-danger"> -->
            <a href="show_type.php" class="btn btn-danger">ยกเลิก</a>
        </div>
        </form>
    </div>
    </div>
</body>
</html>