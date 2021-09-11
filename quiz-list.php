<?php
include('config.php');

$selData = "SELECT * FROM `sub_category`";
$res = mysqli_query($conn, $selData);
$subfetch = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="js/custom_script.js"></script>
    <title>Question</title>
</head>

<body>
    <div class="mobile-body mx-auto">
        <div class="a11 m-t-65">Wookoo Quiz.</div>
        <?php
        $i=0;
        while ($subfetch = mysqli_fetch_array($res)) { 

            $sid=$subfetch['sid'];
            $sub_cat=$subfetch['sub_cat'];
            $coin=$subfetch['coin'];

            if($i==0)
            {
                // echo '0-'.$i;  ?>

                <div class="row">
                    <!-- <a href="#"> -->
                        <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                            <div class="event-name-left"><?php echo $sub_cat ?> 1</div>
                            <div class="row">
                                <div class="col-7 p-0">
                                    <div class="a17">play & win : <?php echo $coin ?></div>
                                </div>
                                <div class="col-5 p-0">
                                    <div class="quiz-img">
                                        <img src="<?php echo $dir_name .'/'.$subfetch['image']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 p-0">
                                    <div class="a18">Winner announcement: 07:15 PM</div>
                                </div>
                                <div class="col-2 p-0">
                                    <div class="a19">Live</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6 me-auto p-0">
                                    <div class="a20">entry : 500</div>
                                </div>
                                <div class="col-6 ms-auto d-content p-0">
                                    <a href="start-quiz.php?sid=<?php echo $sid;?>"><button class="play-button">play now</button></a>
                                </div>
                            </div>
                        </div>
                    <!-- </a> -->
                </div>

            <?php }elseif($i%2==0){ 
                // echo '2-'.$i; ?>

                <div class="row m-t-35">
                    <!-- <a href="#"> -->
                        <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                            <div class="event-name-right"><?php echo $sub_cat ?> 2</div>
                            <div class="row">

                                <div class="col-5 p-0">
                                    <div class="quiz-img">
                                        <img src="<?php echo $dir_name .'/'.$subfetch['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-7 p-0">
                                    <div class="a17">play & win : <?php echo $coin ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 p-0">
                                    <div class="a19-left">Live</div>
                                </div>
                                <div class="col-10 p-0">
                                    <div class="a18">Winner announcement: 07:15 PM</div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-6 me-auto p-0">
                                    <div class="a20">entry : 500</div>
                                </div>
                                <div class="col-6 ms-auto d-content p-0">
                                     <a href="start-quiz.php?sid=<?php echo $sid;?>"><button class="play-button">play now</button></a>
                                </div>
                            </div>
                        </div>
                    <!-- </a> -->
                </div>

            <?php }else{
                // echo 'else-'.$i;  ?>

                <div class="row">
                    <!-- <a href="#"> -->
                        <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                            <div class="event-name-left"><?php echo $sub_cat ?> 3</div>
                            <div class="row">
                                <div class="col-7 p-0">
                                    <div class="a17">play & win : <?php echo $coin ?></div>
                                </div>
                                <div class="col-5 p-0">
                                    <div class="quiz-img">
                                        <img src="<?php echo $dir_name .'/'.$subfetch['image']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 p-0">
                                    <div class="a18">Winner announcement: 07:15 PM</div>
                                </div>
                                <div class="col-2 p-0">
                                    <div class="a19">Live</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6 me-auto p-0">
                                    <div class="a20">entry : 500</div>
                                </div>
                                <div class="col-6 ms-auto d-content p-0">
                                    <a href="start-quiz.php?sid=<?php echo $sid;?>"><button class="play-button">play now</button></a>
                                </div>
                            </div>
                        </div>
                    <!-- </a> -->
                </div>
           <?php }
            $i++;
        } 
        ?>
        <!-- <div class="row">
            <a href="#">
                <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                    <div class="event-name-left">bollywood</div>
                    <div class="row">
                        <div class="col-7 p-0">
                            <div class="a17">play & win : 50000</div>
                        </div>
                        <div class="col-5 p-0">
                            <div class="quiz-img">
                                <img src="assets/img/NoPath.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 p-0">
                            <div class="a18">Winner announcement: 07:15 PM</div>
                        </div>
                        <div class="col-2 p-0">
                            <div class="a19">Live</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 me-auto p-0">
                            <div class="a20">entry : 500</div>
                        </div>
                        <div class="col-6 ms-auto d-content p-0">
                            <button class="play-button">play now</button>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->

        <!-- <div class="row m-t-35">
            <a href="#">
                <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                    <div class="event-name-right">bollywood</div>
                    <div class="row">

                        <div class="col-5 p-0">
                            <div class="quiz-img">
                                <img src="assets/img/NoPath.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-7 p-0">
                            <div class="a17">play & win : 50000</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-0">
                            <div class="a19-left">Live</div>
                        </div>
                        <div class="col-10 p-0">
                            <div class="a18">Winner announcement: 07:15 PM</div>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-6 me-auto p-0">
                            <div class="a20">entry : 500</div>
                        </div>
                        <div class="col-6 ms-auto d-content p-0">
                            <button class="play-button">play now</button>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
     <!--    <div class="row  m-t-35">
            <a href="#">
                <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                    <div class="event-name-left">bollywood</div>
                    <div class="row">
                        <div class="col-7 p-0">
                            <div class="a17">play & win : 50000</div>
                        </div>
                        <div class="col-5 p-0">
                            <div class="quiz-img">
                                <img src="assets/img/NoPath.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 p-0">
                            <div class="a18">Winner announcement: 07:15 PM</div>
                        </div>
                        <div class="col-2 p-0">
                            <div class="a19">Live</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 me-auto p-0">
                            <div class="a20">entry : 500</div>
                        </div>
                        <div class="col-6 ms-auto d-content p-0">
                            <button class="play-button">play now</button>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="row m-t-35">
            <a href="#">
                <div class="col-11 position-relative m-t-45 mx-auto bg-quiz-gray">
                    <div class="event-name-right">bollywood</div>
                    <div class="row">
                        <div class="col-5 p-0">
                            <div class="quiz-img">
                                <img src="assets/img/NoPath.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-7 p-0">
                            <div class="a17">play & win : 50000</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-0">
                            <div class="a19-left">Live</div>
                        </div>
                        <div class="col-10 p-0">
                            <div class="a18">Winner announcement: 07:15 PM</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 me-auto p-0">
                            <div class="a20">entry : 500</div>
                        </div>
                        <div class="col-6 ms-auto d-content p-0">
                            <button class="play-button">play now</button>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->

    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>



</body>

</html>