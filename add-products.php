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

    <title>Nutri-Flames</title>
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
                    <h1 class="title-item">Add Product</h1>
                </div>
                <?php
                include_once "conn.php";
                if (isset($_POST['submit'])) {
                    $category_id = $_POST['category_id'];
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $targetDir = "uploads/";
                    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    $image = $_FILES["image"];
                    $img_loc = $_FILES['image']['tmp_name'];
                    $img_name = $_FILES['image']['name'];
                    $path = "./uploads/" . $img_name;
                    move_uploaded_file($img_loc, $path);
                    $sql = "INSERT INTO products (category_id, title, price, image) VALUES ('$category_id', '$title', '$price', '$path')";
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
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                        <label for="description">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter Price">
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