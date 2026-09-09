<?php
    include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>เพิ่มข้อมูลสินค้า</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-primary h3 text-center mb-4 mt-4" role="alert">
                    เพิ่มข้อมูลสินค้า
                </div>
                <form name="form1" method="post" action="insert_product.php" enctype="multipart/form-data">
                    <labal>ชื่อสินค้า</labal>
                    <input type="text" name="proname" class="form-control" placeholder="ชื่อสินค้า" required > <br>
                    <label>ประเภทสินค้า</label>
                    <select class="form-select" name="typeID">
                        <?php
                            $sql = "SELECT * FROM tbtype ORDER BY type_name";
                            $hand = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($hand)) {
                        ?>
                        <!-- ดึงค่าจากฟิวฐานข้อมูลมาแสดง -->
                        <option value="<?=$row['type_id']?>"><?=$row['type_name'] ?></option>
                        <?php
                        }
                        mysqli_close($conn);
                       
                        ?>
                    </select> <br>
                   
                    <label for="">ราคา</label>
                    <input type="number" name="price" class="form-control" placeholder="ราคาสินค้า" required > <br>
                    <label for="">จำนวน</label>
                    <input type="number" name="num" class="form-control" placeholder="จำนวนสินค้า" required > <br>
                    <label for="">รูปภาพ</label>
                    <input type="file" name="file1" required > <br> <br>


                    <input type="submit" value="Submit" class="btn btn-primary">
                    <!-- <input type="reset" value="Cancel" class="btn btn-danger">  -->
                    <a href="show_product.php" class="btn btn-danger">Cancel</a>


                </form>
            </div>
        </div>
    </div>
</body>
</html>
