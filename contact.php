<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-Flames</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="contact">
            <div class="contact-container">
                <div class="contact-info">
                    <div>
                        <h2>Contact Info</h2>
                        <ul class="info">
                            <li>
                                <span><img src="./css/location.png" alt=""></span>
                                <span>Badda,Dhaka</span>
                            </li>
                            <li>
                                <span><img src="./css/email.png" alt=""></span>
                                <span>nusrat@gmail.com</span>
                            </li>
                            <li>
                                <span><img src="./css/call.png" alt=""></span>
                                <span>01865016322</span>
                            </li>
                        </ul>

                        <h2>Qr Code</h2>
                        <br>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=nusrat@gmail.com 01865016322 Dhaka" alt="" style="width:100px;height:100px;">

                    </div>
                    <ul class="sci">
                        <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa-solid fa-envelope"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="contact-form">
                    <h2>Send a Message</h2>

                    <?php 
                    include_once 'conn.php';
                    if(isset($_POST['submit'])){
                        $fristname = $_POST['fristname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $sms = $_POST['sms'];

                        $sql = "INSERT INTO contact (fristname, lastname, email, phone, sms) VALUES ('$fristname', '$lastname', '$email', '$phone', '$sms')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            echo "<script>alert('Message Send Successfully')</script>";
                        }else{
                            echo "<script>alert('Message Send Failed')</script>";
                        }
                    }
                    ?>
                    <form action="" method="post" class="form-box">
                        <div class="inputbox w50">
                            <input type="text" name="fristname" required>
                            <span>First Name</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="text" name="lastname" required>
                            <span>Last Name</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="email" name="email" required>
                            <span>Email Address</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="number" name="phone" required>
                            <span>Mobile Number</span>
                        </div>
                        <div class="inputbox w100">
                            <textarea name="sms" required></textarea>
                            <span>Write your message here...</span>
                        </div>
                        <div class="inputbox w100">
                            <input type="submit" name="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>





</body>

</html>