<?php 
session_start();
include_once('conn.php');
if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
}
?>


<?php
include_once "conn.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $card_number = $_POST['card_number'];
    $date = $_POST['date'];
    $cvc = $_POST['cvc'];
    $grand_total = $_POST['grand_total'];
    $sql = "INSERT INTO payment (name, card_number, date, cvc, grand_total) VALUES ('$name', '$card_number', '$date', '$cvc', '$grand_total')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Payment Successfull')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Payment Failed')</script>";
        echo "<script>window.location.href='payment.php'</script>";

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
    <link rel="stylesheet" href="./css/payment.css">
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

        <div class="wrapper-payment">
           
            <div class="table">
                <table>
                    <thead>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th> Total Price</th>
                    </thead>
                    <tbody>
                        <?php 
                        include_once "conn.php";
                        $sql = "SELECT * FROM cart";
                        $result = mysqli_query($conn, $sql);
                        $id = 1;
                        $grand_total = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <td><?= $id++?></td>
                            <td><?= $row['title']?></td>
                            <td><?= $row['price']?>/-</td>
                            <td><?= $row['quantity']?></td>
                            <td><?= $subtotal = number_format($row['price'] * $row['quantity']) ?>/-</td>
                        </tr>
                        <?php $grand_total = $grand_total + ($row['price'] * $row['quantity']); } ?>

                    </tbody>
                </table>
                <?php
                if($grand_total > 0){
                    echo "
                <div class='table_bottom'>
                <h3 class='bottom_btn'>Grand Total: <Span style='color:red;'>$grand_total/-</Span></h3>
               </div>
               ";
                } else {
                    echo "";
                }

                ?>
            </div>
            <div class="payment-body">
                <div class="payment-logo">
                    <p>p</p>
                </div>


                <h2>Payment Gateway</h2>
                <form action="" method="post">
                <div class="form-payment">
                    <div class="card-payment space icon-relative">
                        <label class="label">Card holder:</label>
                        <input type="text" class="input" placeholder="Enter your name" name="name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-payment space icon-relative">
                        <label class="label">Card number:</label>
                        <input type="number" class="input"  placeholder="Card Number" name="card_number">
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="card-grp-payment space">
                        <div class="card-item-payment icon-relative">
                            <label class="label">Transection Date:</label>
                            <input type="date" name="date">
                        </div>
                        <div class="card-item-payment icon-relative">
                            <label class="label">CVC:</label>
                            <input type="text" class="input"  placeholder="000" name="cvc">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="hidden" name="grand_total" value="<?= $grand_total?>">
                     <button type="submit" name="submit" class="btn-payment">Pay</button>
                   
                    
                </div>
            </form>
            
                
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>
    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>