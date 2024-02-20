
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"</title>
</head>

<body>
    <!-- header -->
    <?php include('admin-header.php') ?>

    <!-- nav item -->
    <div class="template">
        <?php include('admin-nav.php') ?>


        <div class="body">

            <div class="from-body">
                <div class="title">
                    <h1 class="title-item">Diet Charts</h1>
                </div>

                <div class="form">
                    <div class="from-btn">
                        <a href="add-chart.php" class="btn btn-warning"><i class="fa-solid fa-plus"></i></a>
                        <a href="admin.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="table-container">
                        <table class="table-content">
                            <thead class="table-item">
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                                include_once("conn.php");
                                $sql = "SELECT * FROM chart";
                                $result = mysqli_query($conn,$sql);
                                $id = 1;
                                while($row = mysqli_fetch_assoc($result)){
                           
                             ?>
                               <tr>
                                    <td><?php echo $id++?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['description']?></td>
                                    <td><?php echo $row['price']?></td>
                                    <td><img src="<?php echo $row['image']?>" alt="" width="100px"></td>
                                    <td >
                                    <div class="action-btn">
                                                <a href="./edit-chart.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pen-nib"></i></a>
                                                <a href="./delete-chart.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                                            </div>
                                    </td>
                                </tr>
                                <?php } ?>
                               </tr>
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>


    </div>




    <!-- body -->





    <!-- footer  -->
    <?php include('admin-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>