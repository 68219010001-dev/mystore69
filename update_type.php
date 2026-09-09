<?php
    include 'condb.php';

   $type_id = $_POST['type_id'];
   $type_name = $_POST['type_name'];

   $sql ="UPDATE tbtype set 
   type_name = '$type_name' 
   WHERE type_id ='$type_id'";

   $result = mysqli_query($conn, $sql);
   
   if ($result) {
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_type.php';</script>";
   }else{
        echo "<script>alert('แก้ไขไม่ได้กากจัด');</script>";
   }
   mysqli_close($conn);
?>