<div class="service">
    <div class="service-heading">
        <h1>Our Specialist</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, et?</p>
    </div>

    <div class="special-card-container">
        <div class="card-container">
            <?php 
            include_once('conn.php');
            $sql = "SELECT * FROM special";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
           
            <div class="card-data">
                <img src="<?= $row['image']?>" alt="">
                <div class="pro-content">
                    <h2><?= $row['name']?></h2>
                    <p><?=$row['description']?></p>
                    <div class="special-social-icon">
                        <a href=""><i class="fa fa-brands fa-twitter"></i></a href="">
                        <a href=""><i class="fa fa-brands fa-facebook"></i></a href="">
                        <a href=""><i class="fa fa-brands fa-youtube"></i></a href="">
                        <a href=""><i class="fa fa-brands fa-instagram"></i></a href="">
                    </div>
                </div>
            </div>
            
            <?php
            }
            ?>

        </div>

    </div>
</div>