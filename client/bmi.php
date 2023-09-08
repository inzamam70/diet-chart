<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bmi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>
   <!-- <div class="body">
       
        <?php include('./header.php') ?>
      

        <div class="bmi-body">
            <div class="container">
                <h2>Bmi Calculetor</h2>
                <p class="text">Height</p>
                <input type="text" id="height">
                <p class="text">Weight</p>
                <input type="text" id="weight">
                <p id="result"></p>
                <button id="btn" onclick="bmi()">Calculate</button>
                <p id="info">Please enter height[cm] & weight [kg]</p>
            </div>
        </div>




        <?php include('./footer.php') ?>

    </div>  -->

    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="contact">
            <div class="contact-container">
                <div class="contact-info">
                    <div>
                        <h2>Please Check Your BMI</h2>
                        <p >1.A BMI of less than 18 means you are under weight for your height.</p>
                        <p>2.A BMI of less than 18.5 indicates you are thin for your height.</p>
                        <p>3.A BMI between 18.6 and 24.9 indicates you are at a healthy weight for your height.</p>
                        <p>4.A BMI between 25 and 29.9 suggests you are overweight for your height.</p>
                    </div>
                   
                </div>
                <div class="contact-form">
                    <h2>Please enter height[cm] & weight [kg]</h2>
                    <div class="form-box">
                        <div class="inputbox w50">
                            <input type="text" id="height" required>
                            <span>Height</span>
                        </div>
                        <div class="inputbox w50">
                            <input type="text" id="weight" required>
                            <span>Weight</span>
                        </div>
                        <div class="inputbox w100">
                            <span id="result"></span>
                        </div>
                        <div class="inputbox w100">
                            <input type="submit" id="btn" value="Calculate" onclick="bmi()">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>


    <script>
        function bmi() {
            var height = document.getElementById('height').value;
            var weight = document.getElementById('weight').value;
            var bmi = weight / (height / 100 * height / 100);
            var total = bmi.toFixed(2);
            document.getElementById('result').innerHTML = "Your BMI is " + total;
        }
    </script>
    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>