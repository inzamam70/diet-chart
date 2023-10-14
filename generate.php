<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bmi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>


    <div class="body">
        <!-- header start -->
        <?php include('./header.php') ?>
        <!-- header end -->

        <div class="contact">
            <div class="contact-container">
                <div class="contact-info">
                    <div>

                        <h2>Information</h2>
                        <p>1.Weight Management: Diet charts are often used for weight loss, weight maintenance, or weight gain. Depending on your goals, the plan will be tailored to provide the appropriate calorie intake.</p>
                        <p>2.Health Management: They can also be used to manage specific health conditions, such as diabetes, hypertension, or heart disease.</p>
                        <p>3.Fitness Goals: Athletes and fitness enthusiasts use diet charts to optimize their nutrition for performance and muscle gain.</p>
                    </div>

                </div>
                <div class="contact-form">
                    <h2>Diet Chart Generator</h2>
                    
                        <form action="generate_chart.php" method="post" class="form-box">
                            <div class="inputbox w50">
                                <input type="text" name="meal" required>
                                <span>Meal</span>
                            </div>
                            <div class="inputbox w50">
                                <input type="number" name="calories" required>
                                <span>Calories</span>
                            </div>
                            <button type="submit" >Add Meal</button>
                        </form>

                        <h2>Your Diet Chart</h2>
                    <div class="diet-chart">
                        <?php
                        session_start();

                        if (isset($_SESSION["meals"]) && !empty($_SESSION["meals"])) {
                            echo "<ul>";
                            foreach ($_SESSION["meals"] as $meal) {
                                echo "<li>{$meal['meal']} - {$meal['calories']} Calories</li>";
                            }
                            echo "</ul>";

                            $totalCalories = array_sum(array_column($_SESSION["meals"], 'calories'));
                            echo "<p>Total Calories: $totalCalories</p>";
                        } else {
                            echo "<p>No meals added yet.</p>";
                        }
                        ?>
                    </div>
                    
                </div>
             


            </div>
        </div>


        <!-- footer -->
        <?php include('./footer.php') ?>

    </div>



    <script src="./css/jsfile.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>


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