<div class="slider">
    <?php 
    include_once('conn.php');
    $sql = "SELECT * FROM sliders";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
        ?>
        <!-- fade css -->
        <div class="myslide fade">
            <div class="txt">
                <h1><?= $row['title'] ?></h1>
                <p><?= $row['description'] ?></p>
            </div>
            <img src="<?= $row['image']?>" style="width: 100%; height: 100%;">
        </div>
        <?php
    }
    ?>
            

      

         

        

      
            <!-- /fade css -->

            <!-- onclick js -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="dotsbox" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>
            <!-- /onclick js -->
        </div>