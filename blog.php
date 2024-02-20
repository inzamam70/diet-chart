<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-Flames</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/blog.css">
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
                <h1>Blogs</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, explicabo.</p>
            </div>
            <div class="post-section">
                <?php 
                include_once('conn.php');
                $sql = "SELECT * FROM blogs";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
               <a href="blog-detail.php?id=<?= $row['id']?>" style="text-decoration:none;color:black;">
               <div class="post">
                    <div>
                        <img src="<?= $row['image']?>" alt="" style="width:150px;height:150px;">
                    </div>
                    <div>
                        <h2><?= $row['title']?></h2>
                        <p><?= $row['description']?></p>
                        <p class="date"><?= $row['date']?></p>
                        
                    </div>
                </div>
               </a>
                
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