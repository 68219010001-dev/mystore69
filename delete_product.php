<?php
    include 'condb.php';

    $pro_id = $_GET['pro_id'] ?? '';
    $sql = "DELETE FROM tbproduct WHERE pro_id = '$pro_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location='show_product.php';</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลผิดพลาด')</script>";
    }
    mysqli_close($conn);
?>