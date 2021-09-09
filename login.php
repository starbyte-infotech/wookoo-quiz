<?php 
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>index</title>
</head>

<body>
    <div class="mobile-body mx-auto">
        <div class="a11 m-t-65">Wookoo login.</div>

        <div class="row ">
            <form method="POST" id="frm-mobile-verification">
                <div class="col-12 m-t-90">
                    <label for=""><span class="a24">mobile number</span></label>
                    <input class="input" id="firstname" name="firstname" type="text" placeholder="xxxxx-xxxxx">
                </div>
                <div class="col-12 mt-5">
                    <label for=""><span class="a24">otp</span></label>
                    <input class="input" id="mobile" name="mobile" type="text" placeholder="xxxxxx">
                </div>
                <div class="col-12 mt-5">
                    <button class="register" name="continue"><a class="textbtm1" href="quiz_list.php?mid=1">Continue</a></button>
                </div>
            </form>
            <div class="col-12 mt-3">
                <div class="a27"><a href="register.php">haven't register yet?</a></div>
            </div>


        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>



</body>

</html>