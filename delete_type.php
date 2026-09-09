<?php
    include 'condb.php';
    
    $type_id = $_GET['type_id'];
    $sql = "DELETE FROM tbtype WHERE type_id = '$type_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location='show_type.php';</script>";    
    }else{
        echo "Error : " . $sql . "<br>" . mysqli_query($conn, $sql);
        echo "<script>alert('ลบข้อมูลผิดพลาด')</script>";
    }
    mysqli_close($conn);
?>