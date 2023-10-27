

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>
    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="service">
            <div class="service-heading">
                <h1>Products</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
            </div>
            <div class="card-section-item">
                <?php
                include_once "conn.php";
                $categoryId = $_GET['category_id'];
                $sql = "SELECT * FROM products WHERE category_id = $categoryId";
              
                $id = 1;

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                <div class="product-card-item">
                    <div class="card-img-item">
                        <img src="<?= $row['image'] ?>" alt="" style="width:200px;height:200px;">
                    </div>
                    <div class="product-card-content-item">
                        <h3><?= $row['title'] ?></h3>
                        <p class="description-item">Price=<?= $row['price'] ?>/-</p>
                        <a href="detail.php?id=<?= $row['id'] ?>" class="card-btn-item">Show Details</a>
                    </div>
                </div>


                <?php } ?>
            </div>

   

</div>

        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>
    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>