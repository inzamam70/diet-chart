
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
    <title>Health-Care</title>
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

        <div class="diet-details">
            <div class="diet-details-card">
                <?php 
                include_once("conn.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM chart WHERE id = '$id'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      
                
                ?>
               
                <div class="diet-details-content">
                    <h1><?php echo $row['full_title'] ?></h1>
                    <p><?php echo $row['full_description'] ?></p>
                </div>
                <div class="diet-details-img">
                    <img src="<?php echo $row['image'] ?>" alt="">
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="doctor-section">
            <h1>Dietitian & Nutritionist</h1>
            <p class="divider"></p>

            <div class="doctor-card">
                <?php 
                include_once("conn.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM doctro WHERE id = '$id'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      
                
                ?>
                <div class="doctor-card-item">
                    <div class="doctor-card-img">
                        <img src="<?php echo $row['image'] ?>" alt="">
                    </div>
                    <div class="doctor-card-content">
                        <h1><?php echo $row['name'] ?></h1>
                        <p><?php echo $row['designation'] ?></p>
                        <p><?php echo $row['hospital'] ?></p>
                        <p><?php echo $row['location'] ?></p>
                        <p style="margin-top:20px;"><?= $row['description']?></p>
                        <br>
                        <p>Profile QR Code </p>
                        <br>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $row['name']?>" alt="" style="width:100px;height:100px;">
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>

            <div class="apoinment-form">
                <h2>Book an Appointment</h2>
                <?php 
                include_once "conn.php";
                if(isset($_POST['submit'])){
                    $doctor_id = $_POST['doctor_id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $sql = "INSERT INTO appoinment (doctor_id, name, email, phone, date, time) VALUES ('$doctor_id', '$name', '$email', '$phone', '$date', '$time')";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        echo "<script>alert('Appointment Added Successfully')</script>";
                    }else{
                        echo "<script>alert('Appointment Not Added')</script>";
                    }
                }
                ?>
                <form action="" method="post">
                <?php
                    include_once "conn.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM doctro WHERE id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <input type="hidden" name="doctor_id" value="<?= $row['id']?>">
                    <?php } ?>
                    <input class="appoinment-input" name="name"type="text" placeholder="Enter Name">
                    <input class="appoinment-input" name="email" type="text" placeholder="Enter Email">
                    <input class="appoinment-input" name="phone" type="number" placeholder="Enter Phone">
                    <input class="appoinment-input" name="date" type="text" placeholder="Enter Date">
                    <input class="appoinment-input" name="time" type="text" placeholder="Enter Time">
                    <input type="submit" value="Submit" name="submit" class="apoinment-btn">
                </form>
            </div>
        </div>

        <div class="doctor-section">
            
            <?php 
            include_once "conn.php";
            if(isset($_POST['submit_review'])){
                $chart_id = $_POST['chart_id'];
                $name = $_POST['name'];
                $sms = $_POST['sms'];
                $sql = "INSERT INTO review (chart_id, name, sms) VALUES ('$chart_id', '$name', '$sms')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Review Added Successfully')</script>";
                }else{
                    echo "<script>alert('Review Not Added')</script>";
                }
            }
            ?>
            <div class="review-form">
                <h2>Review Here</h2>
                <form action="" method="post">
                    <?php
                    include_once "conn.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM chart WHERE id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <input type="hidden" name="chart_id" value="<?= $row['id']?>">
                    <?php } ?>
                    <input type="text" name="name" placeholder="Enter name">
                    <textarea name="sms" id="" cols="30" rows="10" placeholder="Enter Review"></textarea>
                    <input type="submit" name="submit_review" value="Submit" class="review-btn">
                </form>
            </div>

            <h1 style="margin-top:20px;">Reviews</h1>
            <p class="divider"></p>
            <div class="review-card">
                <div class="review-card-content">
                    <?php 
                    include_once "conn.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM review WHERE chart_id = '$id'";
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