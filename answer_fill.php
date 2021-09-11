<?php 
include('config.php');

if(isset($_POST['test']) && $_POST['action']=="fill_answer")
{ 
    $subcat = $_POST['subcat'];
    $test = $_POST['test'];        
    $quedata = "SELECT * FROM que_tbl WHERE sub_cat ='$subcat' AND `q_id`='$test'";
    $queRes = mysqli_query($conn, $quedata);
    $queFetch = mysqli_fetch_array($queRes);

    $optionFirst = $queFetch['first_opt'];
    $optionSec = $queFetch['sec_opt'];
    $optionThird = $queFetch['third_opt']; ?>
    <div class="row"  id="answer_container">     
        <a href="#" class="d-content" onclick="optionClick('first',<?php echo $queFetch['q_id'];?>);">
            <div class="col-9 mx-auto q_list_item  bg-transparent q-first bg-gray">
                <div class="row">
                    <div class="col-1 p-0">
                        <div class="round ms-auto dot">
                            <div class="inner-dot"></div>
                        </div>
                    </div>
                    <div class="col-11 p-0">
                        <div class="a6 gkhead13">
                            <?php echo $optionFirst;?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="d-content" onclick="optionClick('second',<?php echo $queFetch['q_id'];?>);">
            <div class="col-9 mx-auto q_list_item  bg-transparent q-second bg-gray">
                <div class="row">
                    <div class="col-1 p-0">
                        <div class="round ms-auto dot">
                            <div class="inner-dot"></div>
                        </div>
                    </div>
                    <div class="col-11 p-0">
                        <div class="a6 gkhead13">
                            <?php echo $optionSec;?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="d-content" onclick="optionClick('third',<?php echo $queFetch['q_id'];?>);">
            <div class="col-9 mx-auto q_list_item  bg-transparent q-third bg-gray">
                <div class="row">
                    <div class="col-1 p-0">
                        <div class="round ms-auto dot">
                            <div class="inner-dot"></div>
                        </div>
                    </div>
                    <div class="col-11 p-0">
                        <div class="a6 gkhead13">
                            <?php echo $optionThird;?>
                        </div>
                    </div>
                </div>
            </div>
        </a> 
    </div>
<?php } 

if(isset($_POST['test']) && $_POST['action']=="fill_question")
{
    $subcat = $_POST['subcat'];
    $test = $_POST['test'];
    $quedata = "SELECT * FROM que_tbl WHERE sub_cat ='$subcat' AND `q_id`='$test'";
    $queRes = mysqli_query($conn, $quedata);
    $queFetch = mysqli_fetch_array($queRes);
    $optionFirst = $queFetch['first_opt'];
    $optionSec = $queFetch['sec_opt'];
    $optionThird = $queFetch['third_opt'];
    echo $queFetch['question'];
}

if(isset($_POST['action']) && $_POST['action']=="random")
{
    $question_unique = explode(',', $_POST["question_unique"]);
    $question_unique_filter = implode("','", $question_unique);
    $subcat = $_POST['subcat'];
    $qid = $_POST['qid'];

    $quedata = "SELECT * FROM que_tbl WHERE sub_cat ='$subcat' AND q_id NOT IN('".$question_unique_filter."') ORDER BY RAND() LIMIT 1";
    $queRes = mysqli_query($conn, $quedata);
    $queFetch = mysqli_fetch_array($queRes);
    echo $qid = $queFetch['q_id'];
}

if(isset($_POST['action']) && $_POST['action']=="check_random")
{
    $question_unique = explode(',', $_POST["question_unique"]);
    $question_unique_filter = implode("','", $question_unique);
    $subcat = $_POST['subcat'];
    $quedata = "SELECT * FROM que_tbl WHERE sub_cat ='$subcat' AND q_id NOT IN('".$question_unique_filter."')";  
    $queRes = mysqli_query($conn, $quedata);
    $num = mysqli_num_rows($queRes);
    if($num<=0){
        echo "0";
    }else{
        echo "1";
    }
}
?>
