<?php
session_start();
include_once 'conn.php';
if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Hello, world!</title>
</head>

<body>

    <?php include('admin-header.php') ?>


    <div class="template">
        <?php include('admin-nav.php') ?>

        <div class="body">
            <h1>Health Care</h1>

            <div class="">
                <a href="" class="btn btn-success "><i class="fa-solid fa-file" style="padding: 5px;"></i>New </a>
                <?php 
                include_once 'conn.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                ?>
                <a href="" class="btn btn-primary"><i class="fa-solid fa-users" style="padding: 5px;"></i>Users <span><sup><?=$count?></sup></span></a>
                <?php 
                 $sql = "SELECT * FROM contact";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                ?>
                <a href="" class="btn btn-warning"><i class="fa-solid fa-users" style="padding: 5px;"></i>Massages <span><sup><?=$count?></sup></span></a>
                <a href="" class="btn btn-danger"><i class="fa-solid fa-check" style="padding: 5px;"></i>Finished</a>

            </div>
            <div class="admin-table">
               <div class="table-sms">
               <h2>Massages</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone-No</th>
                            <th scope="col">Massages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         include_once 'conn.php';
                            $sql = "SELECT * FROM contact";
                            $result = mysqli_query($conn, $sql);
                            $id = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th scope="row"><?= $id++?></th>
                            <td><?= $row['fristname']?><?=$row['lastname']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['sms']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
               </div>

               <div class="table-user">
               <h2>Users</h2>
          
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">User-type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
               include_once 'conn.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                $id = 1;
                while ($row = mysqli_fetch_assoc($result)) {
               ?>
                        <tr>
                            <th scope="row"><?= $id++?></th>
                            <td><?= $row['name']?></td>
                            <td><?=$row ['email']?></td>
                            <td><?=$row ['user_type']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
               </div>

              
            </div>

          

        </div>


    </div>











    <?php include('admin-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>