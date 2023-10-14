<?php ?>


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
          
            <div class="card-body">
                <a href="" class="btn btn-success "><i class="fa-solid fa-file" style="padding: 5px;"></i>New </a>
                <a href="" class="btn btn-primary"><i class="fa-solid fa-spinner" style="padding: 5px;"></i>Progress </a>
                <a href="" class="btn btn-warning"><i class="fa-solid fa-circle-check" style="padding: 5px;"></i>Accepted </a>
                <a href="" class="btn btn-danger"><i class="fa-solid fa-check" style="padding: 5px;"></i>Finish</a>
                
            </div>

        </div>
    </div>




 





    
    <?php include('admin-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
