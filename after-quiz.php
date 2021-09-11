<?php include('config.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/new.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/custom_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <title>index</title>
</head>

<body>
    <div class="mobile-body mx-auto">

        <div class="a11 m-t-65">Wookoo Quiz.</div>

        <div class="row m-0 border-5">
            <div class=" bg-abba">

                <div class="row">
                    <div class="col-6 p-0">
                        <div class="a22">good job!</div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="a23">your score : 
                            <span class="text-yellow"><?php if(isset($_SESSION['score'])) echo $_SESSION['score'] ?></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-7 m-t-27">
                        <div class="a8">
                            your  <span class="text-yellow">
                                100 coins
                            </span> are now ready
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="gif">
                            <img src="assets/img/1.gif" alt="">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="a9 f-s-14">
                            To be eligible win 10, just join WooKoo <br> (its absolutely free & safe)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 mt-3 mx-auto">
                <a class="join-wookoo-now" href="login.php">join wookoo now</a>
            </div>
           
        </div>

        <?php 
        $selSub = "SELECT * FROM `sub_category` ORDER BY RAND() LIMIT 3";
        $Subres = mysqli_query($conn, $selSub);
        $adsinex = 0;
        while($SubFetch = mysqli_fetch_array($Subres)){ ?>
            <?php if($adsinex == 2){?>

                <div class="col-12 m-0 6 q_list_item p-2">
                </div>
            <?php } ?>
                <div class="row  m-t-35">
                    <a href="#">
                        <div class="col-11 m-t-45 mx-auto bg-quiz-gray">
                            <div class="row">
                                <div class="col-7 p-0">
                                    <div class="a17"><?php echo $SubFetch['sub_cat']; ?></div>
                                    <div class="a17">play & win : 50000</div>
                                </div>
                                <div class="col-5 p-0">
                                    <div class="quiz-img">
                                        <img src="<?php echo $dir_name .'/'.$SubFetch['image']; ?>" alt="">
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
        <?php } ?>

        <!-- <div class="row m-t-35">
            <a href="#">
                <div class="col-11 m-t-45 mx-auto bg-quiz-gray">
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