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

        <div class="cart-section" >
            <div class="service-heading">
                <h1>My Cart</h1>
            </div>
            <div class="cart-section-item">
                <table>
                    <tr>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Quantity</th>
                        <th> Total Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include_once "conn.php";
                    $sql = "SELECT * FROM cart";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    $grand_total = 0;
                    $id = 1;
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td>
                                    <?= $id++ ?>
                                </td>
                                <td>
                                    <?= $row['title'] ?>
                                </td>
                                <td>
                                    <?= number_format($row['price']) ?>/-
                                </td>
                                <td><img src="<?= $row['image'] ?>" alt="" class="cart-img"></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?= $row['id'] ?>" name="update_quantity_id">
                                        <div class="quantity_box">
                                            <input type="number" min="1" value="<?= $row['quantity'] ?>" name="update_quantity">
                                            <input type="submit" class="update_quantity" value="Update" name="update_cart_quantity">
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <?= $subtotal = number_format($row['price'] * $row['quantity']) ?>/-
                                </td>
                                <td>
                                    <a href="cart.php?remove=<?= $row['id'] ?>" class="delete_btn" style="display:flex; flex-direction:column;text-decoration:none;" onclick="return confirm('are you sure you want to delete this product?');">Remove</a>
                                </td>
                            </tr>
                    <?php
                            $grand_total = $grand_total + ($row['price'] * $row['quantity']);
                        }
                    } else {
                        echo "<h1 style='text-align:center;'>Cart is Empty</h1>";
                    }
                    ?>

                </table>

                <?php
                if ($grand_total > 0) {
                    echo " <div class='table_bottom'>
                <a href='index.php' class='bottom_btn' style='text-decoration: none;'>Continue Shopping</a>
                <h3 class='bottom_btn'>Grand Total: <Span style='color:red;'>$grand_total/-</Span></h3>
                <a href='payment.php' class='bottom_btn' style='text-decoration: none;'>Proceed to checkout</a>
               </div>";



                ?>

                <?php
                } else {
                    echo "  
                ";
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