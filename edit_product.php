<?php
include 'condb.php';

// รับรหัสสินค้าจาก URL
$pro_id = $_GET['pro_id'] ?? '';

if ($pro_id == '') {
    die("ไม่พบรหัสสินค้า");
}

// ค้นหาข้อมูลสินค้า
$sql1 = "SELECT * FROM tbproduct WHERE pro_id = '$pro_id'";
$result = mysqli_query($conn, $sql1);

if (!$result) {
    die("เกิดข้อผิดพลาดในการค้นหา: " . mysqli_error($conn));
}

$rs = mysqli_fetch_array($result);

if (!$rs) {
    die("ไม่พบข้อมูลสินค้า รหัส: " . htmlspecialchars($pro_id));
}

// เก็บประเภทสินค้าเดิม
$typeID = $rs['type_id'];
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>แก้ไขข้อมูลสินค้า</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <div class="alert alert-primary h4 text-center mb-4 mt-4">
                แก้ไขข้อมูลสินค้า
            </div>

            <form name="form1" method="post" action="update_product.php" enctype="multipart/form-data">

                <!-- รหัสสินค้า -->
                <label>รหัสสินค้า</label>
                <input type="text"
                       name="pro_id"
                       value="<?php echo htmlspecialchars($rs['pro_id']); ?>"
                       class="form-control mb-4"
                       readonly>

                <!-- ชื่อสินค้า -->
                <label>ชื่อสินค้า</label>
                <input type="text"
                       name="pro_name"
                       value="<?php echo htmlspecialchars($rs['pro_name']); ?>"
                       class="form-control mb-4"
                       required>

                <!-- ประเภทสินค้า -->
                <label>ประเภทสินค้า</label>

                <select class="form-select mb-4" name="type_id">

                    <?php
                    $sql = "SELECT * FROM tbtype ORDER BY type_name";
                    $hand = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($hand)) {
                    ?>

                        <option value="<?php echo $row['type_id']; ?>"
                            <?php
                            if ($typeID == $row['type_id']) {
                                echo "selected";
                            }
                            ?>>
                            <?php echo $row['type_name']; ?>
                        </option>

                    <?php
                    }
                    ?>

                </select>

                <!-- ราคา -->
                <label>ราคา</label>
                <input type="number"
                       name="pro_price"
                       value="<?php echo $rs['pro_price']; ?>"
                       class="form-control mb-4"
                       required>

                <!-- จำนวน -->
                <label>จำนวน</label>
                <input type="number"
                       name="pro_amount"
                       value="<?php echo $rs['pro_amount']; ?>"
                       class="form-control mb-4"
                       required>

                <!-- รูปภาพ -->
                <label>รูปภาพเดิม</label>
                <br>

                <?php if ($rs['pro_img'] != '') { ?>

                    <img src="img/<?php echo $rs['pro_img']; ?>"
                         height="100"
                         class="mb-3">

                <?php } ?>

                <br>

                <label>เปลี่ยนรูปภาพ</label>

                <input type="file"
                       name="file1"
                       class="form-control mt-2 mb-4">

                <!-- เก็บชื่อรูปเดิม -->
                <input type="hidden"
                       name="textimg"
                       value="<?php echo htmlspecialchars($rs['pro_img']); ?>">

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="show_product.php"
                   class="btn btn-danger">
                    Cancel
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>