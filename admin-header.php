<div class="header">


    <div>
        <img src="./css/logo.png" alt="" class="img">
    </div>
    <?php
    session_start();

    if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
        $username = $_SESSION["username"];?>
        <div class="header-item">
            <h4>Admin DashBoard</h4>
            
        </div>

        <div class="header-item">
        <a href=""><i class="fa-solid fa-user"></i><?= $username?></a>
            <a href="logout.php"><i class="fa-solid fa-power-off"></i></a>
        </div>
        <?php
    } else {
        header("Location: login.php"); // Redirect to the login page if not authenticated
        exit();
    }
    ?>
    <!-- <h4 class="header-item"></h4>
    <div class="header-item">

        <a href=""><i class="fa-solid fa-power-off"></i></a>

    </div> -->
</div>