
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-Flames</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="service" style="margin-top:20px;">
            <div class="service-heading">
                <h1>My Profile</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
            </div>
            <div class="card-section-item">
                <?php
                include_once "conn.php";
                $id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="product-details">
                        <div class="product-details-img">
                            <img src="<?= $row['image'] ?>" alt="" style="width:200px;height:200px;">
                        </div>
                        <div class="product-details-content">
                         <h3><?= $row['name']?></h3>
                         <br>
                         <p>Email: <?= $row['email']?></p>
                         <p>Phone: 0<?= $row['phone']?></p>
                         <p>Address: <?= $row['address']?></p>
                         <br>
                         <p>Profile QR Code </p>
                         <br>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $row['name']?> <?= $row['phone']?> <?= $row['email']?> <?= $row['address']?>" alt="" style="width:100px;height:100px;">
                        </div>
                    </div>
                 <?php 
                }
                ?>
            </div>



        </div>
        


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>





</body>

</html>