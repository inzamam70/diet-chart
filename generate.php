<?php 
include_once "conn.php";
if(isset($_POST['update_cart_quantity'])){
    $update_quantity_id = $_POST['update_quantity_id'];
    $update_quantity = $_POST['update_quantity'];
    $sql = "UPDATE cart SET quantity = '$update_quantity' WHERE id = '$update_quantity_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:cart.php");
    }else{
        echo "<script>alert('Quantity not updated')</script>";
    }
}
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    $sql = "DELETE FROM cart WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:cart.php");
    }else{
        echo "<script>alert('Product not deleted')</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>
    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="service" style="margin-top:20px;">
            <div class="service-heading">
                <h1>Diet Charts</h1>
            </div>
             
            <div class="diet-section">
                <?php 
                include_once("conn.php");
                $sql = "SELECT * FROM chart";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      
                
                ?>
                <div class="diet-card">
                    <div class="diet-card-img">
                        <img src="<?= $row['image']?>" alt="">
                    </div>
                    <div class="diet-card-body">
                        <h1><?= $row['title']?></h1>
                        <p><?= $row['description']?></p>
                        <p>Price :<?= $row['price']?>/-</p>
                        <a href="diet-details.php?
                        id=<?= $row['id']?>
                        " class="diet-card-btn">View details</a>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>



        </div>

        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>
    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>