<?php 
session_start();
include_once 'conn.php';
if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
       
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');
        } else {
            $_SESSION['user_name'] = $row['name'];
            header('location:index.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
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
                    <h2 class="logo">Diet-Chart</h2>
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
                    <div class="form-box login">
                        <form action="" method="post">
                            <h2>Login here</h2>
                            <?php
                            if (isset($error)) {
                                foreach ($error as $error) {
                                    echo '<span class="error-msg">' . $error . '</span>';
                                }
                                ;
                            }
                            ;
                            ?>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-envelope'></i></span>
                                <input type="email" name="email" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                <input type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember me</label>
                                <a href="">Forgot Password?</a>
                            </div>
                            <button type="submit" name="submit" class="log-btn">Sign In</button>
                            <div class="login-register">
                                <p>Don't have anaccount? <a href="./register.php" class="register-link">Sign up</a></p>
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