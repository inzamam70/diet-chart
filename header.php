<div class="header ">
    <div class="logo-section">
        <img src="./css/fruit-chart.png" alt="" class="header-logo">
        <h3>Nutri-Flames</h3>
    </div>
    <div class="header-nav" style="margin-top:3px;">
        <a href="index.php">Home</a>
        <a href="./bmi.php">BMI</a>
        <a href="./generate.php">Diet Chart</a>
        <a href="blog.php">Blogs</a>
        <a href="./about.php">About</a>
        <a href="./contact.php">Contact us</a>
        <a href="./faq.php">FAQs</a>
        
        <form class="d-flex" method="get" action="search.php">
            <input class="form-control me-2" type="text" placeholder="Search" name="search">
            <button class="btn btn-primary" type="submit" name="submit">Search</button>
           </form>

        <?php
        include_once "conn.php";
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        ?>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span><sup>
                    <?= $count ?>
                </sup></span></a>
        <?php 
        include_once "conn.php";
        $sql = "SELECT * FROM appoinment";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        ?>
       

            
        <div class="dropdown" style="margin-left:5px;margin-right:10px;">

    

        <a href=""><i class="fa-solid fa-calendar"></i><span><sup>
                    <?= $count ?>
                </sup></span></a>
                <div class="dropdown-content" style="width: 100px;">
    <?php 
     include_once "conn.php";
        $sql = "SELECT * FROM appoinment";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
        

    ?>
    
   
            <a href="appoinment-detail.php?id=<?= $row['id']?>" style="row-gap:5px;"><?= $row['name']?></a>
       
  
    <?php } ?>
    </div>
</div>
         

        <div class="dropdown" style="margin-top:5px;">

    

        <i class="fa-solid fa-user-plus"></i>
            <?php 
             include_once "conn.php";
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                

            ?>
            
            <div class="dropdown-content">
                    <a href="login.php">Login</a>
                    <a href="profile.php?id=<?= $row['id']?>">User Profile</a>
                    <a href="logout.php">Logout</a>
               
            </div>
            <?php } ?>
        </div>


    </div>
</div>

