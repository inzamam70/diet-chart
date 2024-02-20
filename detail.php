<?php 
include_once "conn.php";
if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
    $product_id = $_POST['update_quantity_id'];
    $sql = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Product Already Added')</script>";
        echo "<script>window.location.href='cart.php'</script>";
    }else{
        $sql = "INSERT INTO cart (title, price,image, quantity, product_id) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity', '$product_id')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Product Added')</script>";
            echo "<script>window.location.href='cart.php'</script>";
        }else{
            echo "<script>alert('Product Not Added')</script>";
            echo "<script>window.location.href='detail.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Nutri-Flames</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/detail.css">
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

        <div class="service" style="margin-top:20px;">
            <div class="service-heading">
                <h1>Products</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
            </div>

           
            <div class="card-section-item">
                <?php
                include_once "conn.php";
            
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <div class="product-details">
                        <div class="product-details-img">
                            <img src="<?= $row['image'] ?>" alt="" style="width:200px;height:200px;">
                        </div>
                        <div class="product-details-content">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="update_quantity_id" value="<?=$row['id']?>">
                                <p class="quality">New</p>
                                <h3>
                                    <?= $row['title'] ?>
                                </h3>
                                <p>Price=
                                    <?= $row['price'] ?>/-
                                </p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe sapiente accusantium
                                    voluptates molestiae atque nostrum.</p>
                             

                                <input type="hidden" name="product_name" value="<?=$row['title']?>">
                                <input type="hidden" name="product_price" value="<?=$row['price']?>">
                                <input type="hidden" name="product_image" value="<?=$row['image']?>">

                                <input type="submit" class="submit-btn" value="Add to cart" name="add_to_cart">
                            </form>

                        </div>
                    </div>
                <?php } 
                }else{
                    echo "<h1>Product Not Found</h1>";
                }
                ?>
            </div>

            <div class="review-form">
                <?php 
                include_once "conn.php";
                if(isset($_POST['submit'])){
                    $product_id = $_POST['product_id'];
                    $name = $_POST['name'];
                    $sms = $_POST['sms'];
                    $sql = "INSERT INTO product_review (product_id, name, sms) VALUES ('$product_id', '$name', '$sms')";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        echo "<script>alert('Review Added Successfully')</script>";
                    }else{
                        echo "<script>alert('Review Not Added')</script>";
                    }
                }
                ?>
                <h2>Review Here</h2>
                <form action="" method="post">
                    <?php
                    include_once "conn.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM products WHERE id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <input type="hidden" name="product_id" value="<?= $row['id']?>">
                    <?php } ?>
                    <input type="text" name="name" placeholder="Enter name">
                    <textarea name="sms" id="" cols="30" rows="10" placeholder="Enter Review"></textarea>
                    <input type="submit" name="submit" value="Submit" class="review-btn">
                </form>
            </div>

            <h1 style="margin-top:20px;">Reviews</h1>
            <p class="divider"></p>
            <div class="review-card">
                <div class="review-card-content">
                    <?php 
                    include_once "conn.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product_review WHERE product_id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    
                        <div class="review-card-text">
                            <h1><?= $row['name']?></h1>
                            <p><?= $row['sms']?></p>
                        </div>
                    
                    <?php 
                        }
                    }
                    ?>

                </div>
            </div>



        </div>

        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>
    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>