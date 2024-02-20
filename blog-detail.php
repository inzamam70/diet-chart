
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
            <div class="post-section" style="display:flex;justify-content:center;align-item:center;">
                <?php 
                include_once('conn.php');
                $id = $_GET['id'];
                $sql = "SELECT * FROM blogs WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
               
               <div class="post" style="gap:20px;">
                    <div >
                        <img src="<?= $row['image']?>" alt="" style="width:150px;height:150px;">
                    </div>
                    <div>
                        <h2><?= $row['title']?></h2>
                        <p><?= $row['description']?></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quod magni nobis veritatis voluptas
                             laborum quos corrupti exercitationem, explicabo ad iusto voluptatum! Error, aliquam? Quae fugiat delectus, 
                            dicta vero neque obcaecati ullam corrupti sed et cum nisi nihil eveniet sint eum consequatur nulla.
                             Unde fuga quo illo reiciendis aliquid sed!</p>
                             <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis a, rem incidunt voluptate, dolore 
                                assumenda quasi eius quod quis, unde eveniet tenetur adipisci nihil nesciunt dignissimos dolorum accusamus libero delectus modi? 
                                Necessitatibus sunt laudantium quisquam maxime tempora non quia ab adipisci! Mollitia asperiores consectetur ipsa quibusdam ea odit vero fugiat officia soluta,
                                 a quaerat facere eum esse nesciunt. Nesciunt amet quisquam accusamus consequatur magni odio minus corrupti, totam quidem sed pariatur rem error. Sapiente rerum 
                                 voluptate optio laborum beatae molestias quaerat nihil quo,
                                 aut minima ducimus sunt repellendus et veritatis quibusdam qui animi eos dignissimos officia iure, illum quae laboriosam!</p>
                        <p class="date"><?= $row['date']?></p>
                    </div>
                </div>
              
                
                 <?php
                    }
                }
                ?>

                

            </div>


        </div>



        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>





</body>

</html>