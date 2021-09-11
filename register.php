<?php 
include('config.php');

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $coins = 100;
    $score = 0;
    $otp = 0;

    $sql = "INSERT INTO `user_tbl`(`uid`, `name`, `mobile`,`coins`, `score`, `otp`) VALUES (NULL, '$name','$mobile','$coins', '$score', '$otp')"; 
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "<script>alert('You have successfully registered');</script>";
        header('Location: login.php');
    }else{
        echo "<script>alert('Failed to Register');</script>";
    }
}
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
        <div class="a11 m-t-65">Wookoo register.</div>

        <div class="row ">
            <form method="POST">
                <div class="col-12 m-t-90">
                    <label for=""><span class="a24">user name</span></label>
                    <input class="input" type="text" placeholder="xyz123" name="name">
                </div>
                <div class="col-12 mt-5">
                    <label for=""><span class="a24">mobile number</span></label>
                    <input class="input" type="text" placeholder="xxxxx-xxxxx" name="mobile">
                </div>
                <div class="col-12 mt-5">
                    <button type="submit" class="register" name="register">register</button>
                </div>
            </form>
            <div class="col-12 mt-3">
                <div class="a27"><a href="login.php">already register?</a></div>
            </div>


        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>



</body>

</html>