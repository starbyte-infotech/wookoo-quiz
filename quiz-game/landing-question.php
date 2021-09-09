<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Wookoo Quiz</title>
</head>

<body>
    <div class="mobile-body mx-auto">
        <div class="process-bar-55"></div>
        <div class="a1">Let's get started,</div>
        <div class="a2">answer 2 simple questions to get <span class="text-yellow">100 coins</span> now:</div>

        <div class="row">
            <div class="mx-auto">
                <div class="text-center question-border">
                    <span class="f-s-14"> 1/2</span>
                </div>
            </div>
        </div>
        <div class="a3" id="question">A bilingual can speak ___ languages.</div>

        <div class="row buttons">
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-gray">
                    <div class="row" id="btn0">
                        <div class="col-1 p-0">
                            <div class="round ms-auto">
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6" id="choice0">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-gray">
                    <div class="row" id="btn1">
                        <div class="col-1 p-0 ">
                            <div class="round ms-auto">
                                <!-- <div class="green"></div> -->
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6" id="choice1">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-gray">
                    <div class="row" id="btn2">
                        <div class="col-1 p-0 ">
                            <div class="round ms-auto">
                                <!-- <div class="red"></div> -->
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6" id="choice2">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>  
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-gray">
                    <div class="row" id="btn3">
                        <div class="col-1 p-0 ">
                            <div class="round ms-auto">
                                <!-- <div class="red"></div> -->
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6" id="choice3">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>           
        </div>




        <div class="a4">Test your knowledge instantly!</div>

        <ul class="a5">
            <li>Play quizzes in over 25 categories like GK, sports, bollywood, geography, business, history, IPL & more
            </li>
            <li>Compete with thousands of other quiz enthusiasts</li>
            <li>Collect <span class="text-red">WOOKOO</span> coins in every quiz</li>
        </ul>

    </div>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <footer>
        <p id="progress">Question x of y.</p>
    </footer>
    <script type="text/javascript" src="quiz_controller.js"></script>
    <script type="text/javascript" src="questions.js"></script>
    <script type="text/javascript" src="app.js"></script>


</body>

</html>