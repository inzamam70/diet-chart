<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/contact.css">
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
                                <span>70inzamam.sentinel@gmail.com</span>
                            </li>
                            <li>
                                <span><img src="./css/call.png" alt=""></span>
                                <span>01865016322</span>
                            </li>
                        </ul>

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
                    <div class="form-box">
                        <div class="inputbox w50">
                            <input type="text" name="" required>
                            <span>First Name</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="text" name="" required>
                            <span>Last Name</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="email" name="" required>
                            <span>Email Address</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="number" name="" required>
                            <span>Mobile Number</span>
                        </div>
                        <div class="inputbox w100">
                            <textarea name="" required></textarea>
                            <span>Write your message here...</span>
                        </div>
                        <div class="inputbox w100">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>





</body>

</html>