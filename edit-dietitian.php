


<?php
session_start();
include_once("conn.php");
$id = $_GET["id"];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $hospital = $_POST['hospital'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $image = $_FILES["image"];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $path = "./uploads/" . $img_name;
    move_uploaded_file($img_loc, $path);
    $sql = "UPDATE doctro SET name='$name', designation='$designation', hospital='$hospital', location='$location', description='$description', image='$path' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Dietitian Updated Successfully')</script>";
        echo "<script>window.location.href='./dietitians.php'</script>";
    } else {
        echo "<script>alert('Dietitian Inserted Failed')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Health-Care</title>
</head>

<body>
    <!-- header -->
    <?php include('admin-header.php') ?>

    <!-- nav item -->
    <div class="template">
       <?php include('admin-nav.php') ?>


        <div class="body">

            <div class="from-body">
                <div class="title">
                    <h1 class="title-item">Edit Diatition</h1>
                </div>

                <div class="form">
                    <form action="" class="form-item" method="post" enctype="multipart/form-data">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="
                        <?php
                        $sql = "SELECT * FROM doctro WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['name'];
                            }
                        }
                        ?>
                        
                        ">

                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" value="
                         <?php
                           $sql = "SELECT * FROM doctro WHERE id='$id'";
                           $result = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result) > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {
   
                                   echo $row['location'];
                               }
                           }
                           ?>
                           ">
                    
                        <label for="hospital">Hospital</label>
                        <input type="text" name="hospital" class="form-control" value="

                        <?php
                        $sql = "SELECT * FROM doctro WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['hospital'];
                            }
                        }
                        ?>
                        ">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" value="
                        <?php   
                        $sql = "SELECT * FROM doctro WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo $row['location'];
                            }
                        }
                        ?>
                        ">
                        
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="
                        <?php
                        $sql = "SELECT * FROM doctro WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['description'];
                            }
                        }
                        ?>

                        ">

                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" value="
                        <?php
                        $sql = "SELECT * FROM categories WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['image'];
                            }
                        }
                        ?>
                        
                        ">
                        <input type="submit" class="btn btn-danger" value="Submit" name="submit" style="width:100%;">
                    </form>
                </div>

            </div>

        </div>


    </div>




    <!-- body -->





    <!-- footer  -->
    <?php include('admin-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
