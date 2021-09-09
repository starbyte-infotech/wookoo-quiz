<?php 
include('config.php');
if(isset($_GET['sid'])){

    $sid = $_GET['sid'];
    $SubData = "SELECT * FROM `sub_category` WHERE sid=".$sid;
    $Subres = mysqli_query($conn, $SubData);
    $SubFetch = mysqli_fetch_array($Subres);
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/new.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/custom_script.js"></script>

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <title>Question</title>
</head>

<body>
    <div class="mobile-body mx-auto">
        <div class="process-bar-55">
            <div class="a10">52s</div>
        </div>
        <div class="a1">Let's get started,</div>
        <div class="a2">answer 2 simple questions to get <span class="text-yellow">100 coins</span> now:</div>

        <div class="row">
            <div class="mx-auto">
                <div class="text-center question-border">
                    <span class="f-s-14"> 1/2</span>
                </div>
            </div>
        </div>
        <div class="a3">A bilingual can speak ___ languages.</div>

        <div class="row">
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-gray">
                    <div class="row">
                        <div class="col-1 p-0">
                            <div class="round ms-auto">
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-green">
                    <div class="row">
                        <div class="col-1 p-0 ">
                            <div class="round-green ms-auto">
                                <div class="green"></div>
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="d-content">
                <div class="col-9 mx-auto bg-red">
                    <div class="row">
                        <div class="col-1 p-0 ">
                            <div class="round-red ms-auto">
                                <div class="red"></div>
                            </div>
                        </div>
                        <div class="col-11 p-0">
                            <div class="a6">
                                seven
                            </div>
                        </div>
                    </div>
                </div>
            </a>           
        </div>

        <div class="a16">your score : 0</div>     

    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
</body>
<script src="assets/js/jquery/dist/jquery.min.js"></script>

<script src="assets/js/jquery/dist/jquery.min.js"></script>
<script>
    var navItems = document.querySelectorAll(".bottom-nav-item");

    navItems.forEach(function(e, i) {
        e.addEventListener("click", function(e) {
            navItems.forEach(function(e2, i2) {
                e2.classList.remove("active");
            });
            this.classList.add("active");
        });
    });
</script>
<script type="text/javascript">
function wait(ms){
    var start = new Date().getTime();
    var end = start;
    while(end < start + ms) {
        end = new Date().getTime();
    }
}
function optionClick(opt,qid)
{
    var opt = opt;
    var qid = qid;
    
    $.ajax({
        url: "functions.php", 
        type: "POST", 
        dataType:"json",            
        data: {action : 'select_option', qid: qid, opt: opt},
        success: function(data) {  
            if(data == 1){ 
                var score = $('.quescore').html();
                $(".q_list_item.bg-transparent.q-"+opt).css("cssText","background-color: #2cb12c !important;");
                $(".q-"+opt+" .smile").css("display","block"); 
                var add = parseInt(score)+20;
                $(".quescore").html(add);
                var finalScore = $('.quescore').text();
            }else{ 
                var score1 = $('.quescore').html();
                $(".q_list_item.bg-transparent.q-"+opt).css("cssText", "background-color: #e72c2c !important;");
                $(".q-"+opt+" .sad").css("display","block");   
                var sub = score1-10;
                $(".quescore").html(sub);
                var finalScore = $('.quescore').text();                  
            }

    
            var number_question_extra=document.getElementById("number_question_extra").innerHTML;
            if(number_question_extra<25)
            {
                var question_unique=document.getElementById("question_unique").value;
                jQuery.ajax
                ({                        
                    url: "answer_fill.php",
                    type: "POST",
                    data:{
                        "action":"check_random",
                        "subcat":'<?php echo $SubFetch['sub_cat'];?>',
                        "question_unique":question_unique
                    },
                    success: function(data)
                    {  
                    str1=data.trim();
                    if(str1==1)
                    {       
                            jQuery.ajax
                            ({  
                                url: "answer_fill.php",
                                type: "POST",
                                data:{
                                    "action":'random',
                                    "subcat":'<?php echo $SubFetch['sub_cat'];?>',
                                    "qid" : qid,
                                    "question_unique":question_unique
                                },
                                success: function(data)
                                {   
                                    var question_unique=document.getElementById("question_unique").value; 
                                    question_unique=question_unique+","+data;
                                    document.getElementById("question_unique").value=question_unique;
                                    // delay(1000);
                                    jQuery.ajax
                                    ({
                                        url: "answer_fill.php",
                                        type: "POST",
                                        data:{
                                            "action":"fill_answer",
                                            "test":data, //question  id
                                            "subcat":'<?php echo $SubFetch['sub_cat'];?>'
                                        },
                                        success: function(data)
                                        {   
                                            jQuery('#answer_container').replaceWith(data);
                                            console.log("fill_answer"+data);

                                        }
                                    });
                                    document.getElementById("number_question").innerHTML=number_question_extra+"/25";

                                    jQuery.ajax
                                    ({                        
                                        url: "answer_fill.php",
                                        type: "POST",
                                        data:{
                                            "action":"fill_question",
                                            "test":data,//question  id
                                            "subcat":'<?php echo $SubFetch['sub_cat'];?>'
                                        },
                                        success: function(data)
                                        {
                                            console.log("fill_question :"+data); 
                                            document.getElementById("question").innerHTML = data;
                                            console.log(data);                                            
                                        }
                                    });
                                }
                            });
                    }
                    else
                    {
                        var score=document.getElementById("score").innerHTML; 
                        location.replace("scorbord1.php?number="+score);
                    }
                    
                    }

                });
                number_question_extra=parseInt(number_question_extra);
                document.getElementById("number_question_extra").innerHTML=number_question_extra+1;
                // document.getElementById("number_question").innerHTML=number_question_extra+"/25";
            } 
            else
            {
                var score=document.getElementById("score").innerHTML; 
                location.replace("scorbord1.php?number="+score);
            }
            
        }
    });
}
// ------------ Time Counter ------------
var counter = 90;
var scorbord = 'scorbord.php';
var interval = setInterval(function() {
    counter--;
    // Display 'counter' wherever you want to display it.
    if (counter <= 0) {
        clearInterval(interval);
        var score=document.getElementById("score").innerHTML; 
        location.replace("scorbord1.php?number="+score);
        return;
    }else{
        $('#time').text(counter);
    }
}, 1000);

</script>
<script>
function myFunction() {
  document.getElementByClassName("gkhead13").style.textDecoration = "none";
}
</script>
</html>