
<?php session_start()?>
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

    <title><Nutri-Flames/title>
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
                    <h1 class="title-item">Add Dietitian</h1>
                </div>
                <?php
                include_once "conn.php";
                if (isset($_POST['submit'])) {
                    $chart_id = $_POST['category_id'];
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
                    $sql = "INSERT INTO doctro (chart_id, name, designation, hospital, location, description, image) VALUES ('$chart_id', '$name', '$designation', '$hospital', '$location', '$description', '$path')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Products Added Successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Products Not Added.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }

                }



                ?>

                <div class="form">
                    <form action="" class="form-item" method="post" enctype="multipart/form-data">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="">
                            <?php
                            include_once "../dbconn.php";
                            $sql = "SELECT * FROM chart";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" placeholder="Enter designation">
                        <label for="hospital">Hospital</label>
                        <input type="text" name="hospital" class="form-control" placeholder="Enter hospital">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Enter location">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter description">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
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