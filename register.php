<?php
include_once 'conn.php';
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $image = $_FILES["image"];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $path = "./uploads/" . $img_name;
    move_uploaded_file($img_loc, './uploads/' . $img_name);

    $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO users(name, email,phone,address,image, password, user_type) VALUES('$name','$email','$phone','$address','$path','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
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
    <link rel="stylesheet" href="./css/login.css">
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
        <div class="login-body">
            <div class="background"></div>
            <div class="login-container">
                <div class="login-content">
                <div class="img">
                        <img src="./css/fruit-chart.png" alt="">    
                        <h2 class="logo"> Nutri-Flames</h2>
                    </div>
                    <div class="text-sci">
                        <h2>Welcome! <br><span>To our Website</span></h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum, veniam.</p>
                    </div>
                    <div class="social-icons">
                        <a href=""><i class='bx bxl-linkedin'></i></a>
                        <a href=""><i class='bx bxl-facebook'></i></a>
                        <a href=""><i class='bx bxl-instagram'></i></a>
                        <a href=""><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>
                <div class="logreg-box">
                    <div class="form-box register">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h2>Register here</h2>
                            <?php
                            if (isset($error)) {
                                foreach ($error as $error) {
                                    echo '<span class="error-msg">' . $error . '</span>';
                                }
                                ;
                            }
                            ; 
                            ?>
                            <div class="form-devider">
                                <div>
                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-user'></i></span>
                                        <input type="text" name="name" required>
                                        <label for="">User name</label>
                                    </div>

                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                                        <input type="email" name="email" required>
                                        <label for="">Email</label>
                                    </div>

                                    <div class="input-box">
                                        <span class="icon"><i class="fa-solid fa-phone"></i></span>
                                        <input type="number" name="phone" required>
                                        <label for="">Phone</label>
                                    </div>

                                    <div class="input-box">
                                        <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                        <input type="text" name="address" required>
                                        <label for="">Address</label>
                                    </div>

                                   
                                </div>
                                <div>
                                    <div class="input-box">
                                        <span class="icon"><i class="fa-solid fa-image"></i></span>
                                        <input type="file" name="image" required accept="image/*">
                                        <!-- <label for="">Image</label> -->
                                    </div>

                                    
                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                        <input type="password" name="password" required>
                                        <label for="">Password</label>
                                    </div>

                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                        <input type="password" name="cpassword" required>
                                        <label for="">Retype-Password</label>
                                    </div>

                                    <div class="input-box">
                                        <select name="user_type" class="input-box">
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>


                                </div>
                   
                            </div>
                   

                            <div class="remember-forgot">
                                <label><input type="checkbox">I agree to the terms & condition</label>

                            </div>
                            <button type="submit" name="submit" class="log-btn">Sign In</button>
                            <div class="login-register">
                                <p>Already have an account? <a href="./login.php" class="login-link">Sign in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>

</body>

</html>