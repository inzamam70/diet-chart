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
                        <a href=""><i class='bx bxl-facebook' ></i></a>
                        <a href=""><i class='bx bxl-instagram' ></i></a>
                        <a href=""><i class='bx bxl-twitter' ></i></a>
                    </div>
                </div>
                <div class="logreg-box">
                    <div class="form-box register">
                        <form action="">
                            <h2>Register here</h2>
                            
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-user' ></i></span>
                                <input type="text" name="" required>
                                <label for="">User name</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-envelope' ></i></span>
                                <input type="email" name="" required>
                                <label for="">Email</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                                <input type="password" name="" required>
                                <label for="">Password</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                                <input type="password" name="" required>
                                <label for="">Retype-Password</label>
                            </div>

                            <div class="remember-forgot">
                                <label><input type="checkbox">I agree to the terms & condition</label>
                                
                            </div>
                            <button type="submit" class="log-btn">Sign In</button>
                            <div class="login-register">
                                <p>Already  have an account? <a href="./login.php" class="login-link">Sign in</a></p>
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