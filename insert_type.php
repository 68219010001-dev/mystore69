<?php
    include 'condb.php';

    $type_name = $_POST['type_name'];

    $sql = "INSERT INTO tbtype (type_name) 
    VALUES ('$type_name')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_type.php';</script>";

    }else {
        echo "<script>alert('บันทึกไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);

?>