<?php

include 'condb.php';

// รับค่าจากฟอร์ม
$pro_id = $_POST['pro_id'] ?? '';
$pro_name = $_POST['pro_name'] ?? '';
$type_id = $_POST['type_id'] ?? '';
$pro_price = $_POST['pro_price'] ?? 0;
$pro_amount = $_POST['pro_amount'] ?? 0;
$textimg = $_POST['textimg'] ?? '';


// ตรวจสอบรหัสสินค้า
if ($pro_id == '') {

    echo "<script>
            alert('ไม่พบรหัสสินค้า');
            window.location='show_product.php';
          </script>";

    exit();
}


// ตรวจสอบว่ามีสินค้านี้จริงหรือไม่
$check_sql = "SELECT * FROM tbproduct WHERE pro_id = '$pro_id'";
$check_result = mysqli_query($conn, $check_sql);

if (!$check_result || mysqli_num_rows($check_result) == 0) {

    echo "<script>
            alert('ไม่พบข้อมูลสินค้า');
            window.location='show_product.php';
          </script>";

    exit();
}


// ใช้รูปเดิมก่อน
$new_image_name = $textimg;


// ถ้ามีการเลือกรูปใหม่
if (isset($_FILES['file1']) &&
    $_FILES['file1']['error'] == 0 &&
    is_uploaded_file($_FILES['file1']['tmp_name'])) {

    $extension = pathinfo(
        basename($_FILES['file1']['name']),
        PATHINFO_EXTENSION
    );

    $new_image_name = 'pro_' . uniqid() . '.' . $extension;

    $image_upload_path = './img/' . $new_image_name;

    move_uploaded_file(
        $_FILES['file1']['tmp_name'],
        $image_upload_path
    );
}


// คำสั่งแก้ไขข้อมูล
$sql = "UPDATE tbproduct SET
        pro_name = '$pro_name',
        type_id = '$type_id',
        pro_price = '$pro_price',
        pro_amount = '$pro_amount',
        pro_img = '$new_image_name'
        WHERE pro_id = '$pro_id'";

$result = mysqli_query($conn, $sql);


if ($result) {

    echo "<script>
            alert('แก้ไขข้อมูลสินค้าเรียบร้อย');
            window.location='show_product.php';
          </script>";

} else {

    echo "<script>
            alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');
            window.location='show_product.php';
          </script>";
}


mysqli_close($conn);

?>