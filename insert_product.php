<?php
    include 'condb.php';

    $proname = $_POST['proname'] ?? '';
    $typeID = $_POST['typeID'] ?? '';
    $price = $_POST['price'] ?? 0;
    $num = $_POST['num'] ?? 0;

    // อัพโหลดภาพ
    if (isset($_FILES['file1']) && is_uploaded_file($_FILES['file1']['tmp_name'])) {
        $new_image_name = 'pro_' . uniqid() . '.' . pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
        $image_upload_path = './img/' . $new_image_name;
        move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
    } else {
        $new_image_name = '';
    }

    // คำสั่งเพิ่มข้อมูล product
    $sql = "INSERT INTO tbproduct (pro_name, type_id, pro_price, pro_amount, pro_img)
            VALUES ('$proname', '$typeID', '$price', '$num', '$new_image_name')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='show_product.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
    mysqli_close($conn);
?>
