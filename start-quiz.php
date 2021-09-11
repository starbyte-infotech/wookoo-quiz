<?php
include('config.php');

if(isset($_GET['sid'])){

    $sid = $_GET['sid'];
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

        <div class="a11 m-t-65">Wookoo Quiz.</div>

        <div class="row m-0 border-5">
            <div class=" bg-abba">
                <div class="a7">good job!</div>


                <div class="row">
                    <div class="col-7 m-t-27">
                        <div class="a8">
                            play and <span class="text-yellow">
                                win
                            </span> 50000
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="gif">
                            <img src="assets/img/1.gif" alt="">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="a9 f-s-14">
                            Join wookoo & become eligible to
                            win coins
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-9 mt-3 text-center">
                <a class="play-with-login" href="login.php">play with login</a>
            </div>
            <div class="col-3 mt-3 text-center ps-0">
                <a class="play-without-login" href="question.php?sid=<?php echo $sid ?>">play</a>
            </div>
        </div>


        <div class="a21">Quiz Rules!!</div>

        <ul class="a5 m-t-17">
            <li>You get 90 seconds to answer as many questions as you can (max questions you can answer is 25).
            </li>
            <li>There are 3 options for each question, one of
                them is the answer for the question.</li>
            <li>You get 20 points for each right answer.</li>
            <li>You get (-)10 points for each wrong answer.</li>
            <li> You get 10 points as hattrick bonus if you
                answer 3 questions correctly in a row.</li>
            <li>The winners for the quiz is decided depending upon the scores of all the users that participated in the quiz.</li>
        </ul>

    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>



</body>

</html>