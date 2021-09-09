<?php 
include('header.php');
include('left-side.php');
include('../config.php');
/*SELECT DATA FROM DB*/
$mainCategories = "SELECT * FROM `main_category`";
$catRes1 = mysqli_query($conn, $mainCategories);

$quedata = "SELECT * FROM `que_tbl` ORDER BY RAND()";
$queRes = mysqli_query($conn, $quedata);

$quedata1 = "SELECT COUNT(*) as `count` FROM `que_tbl`";
$queRes1 = mysqli_query($conn, $quedata1);
$queFetch = mysqli_fetch_array($queRes1);
$total_que = $queFetch['count']; 
$limit = 3;
/*ADD QUESTIONS*/
if(isset($_POST['add_que'])){ 

    $main_cat = $_POST['main_cat'];
    $mainCategories2 = "SELECT * FROM `main_category` WHERE main_cat='$main_cat'";
    $catRes2 = mysqli_query($conn, $mainCategories2);
    $mainFetch = mysqli_fetch_array($catRes2);
    $mid = $mainFetch['mid'];

    $sub_cat = $_POST['sub_cat'];
    $subCate = "SELECT * FROM `sub_category` WHERE sub_cat='$sub_cat'";
    $subRes = mysqli_query($conn, $subCate);
    $sFetch = mysqli_fetch_array($subRes);
    $sid = $sFetch['sid'];

    // $req_coin = $_POST['req_coin'];
    $que = $_POST['que'];
    $first_opt = $_POST['first_option'];
    $sec_opt = $_POST['sec_option'];
    $third_opt = $_POST['third_option'];
    $sel_opt = $_POST['answer'];
    $rightAnswer = '-';

    if($sel_opt == 'first_option'){
        $rightAnswer = $first_opt;
    }
    elseif ($sel_opt == 'sec_option') {
        $rightAnswer = $sec_opt;
    }
    elseif ($sel_opt == 'third_option') {
        $rightAnswer = $third_opt;
    }

    $addQue = "INSERT INTO `que_tbl`(`mid`, `main_cat`, `sid`,`sub_cat`,`question`, `first_opt`, `sec_opt`, `third_opt`, `ans`) VALUES ('$mid', '$main_cat','$sid','$sub_cat','$que','$first_opt','$sec_opt','$third_opt','$rightAnswer')";
    $res = mysqli_query($conn, $addQue);  
    if($res){
        echo "<script>alert('Question Added !');</script>";
    }else{
        echo "<script>alert('Failed to Add Question');</script>";
    } 
}
?>
<style type="text/css">
    .queDiv{ display: none; }
    #loadMore{ color: #fff; }
</style>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Question</h4>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="POST">
                                    <div class="form-group row mb-4">
                                        <div class="col-5">
                                            <label class="col-sm-12">Main categories</label>

                                            <div class="col-sm-12 border-bottom">
                                                <select name="main_cat"  id="main_cat" class="form-select shadow-none p-0 border-0 form-control-line" onchange="get_subcategories();" >
                                                    <option value="">--Select--</option>
                                                <?php
                                                    while ($row = mysqli_fetch_array($catRes1)){ ?>
                                                        <option value="<?php echo $row['main_cat']; ?>"><?php echo $row['main_cat']; ?></option>
                                                <?php } ?>   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label class="col-sm-12">Sub categories</label>
                                            <div class="col-sm-12 border-bottom" id="get_sub">
                                                <select name="sub_cat" class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">--Select--</option>
                                                </select>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Enter Question</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="que" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0"> <span> <input type="radio" id="Option-1" name="answer" value="first_option"></span>
                                            Option-1</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="first_option" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0"> <span> <input type="radio" id="Option-2" name="answer" value="sec_option"></span>
                                            Option-2</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="sec_option" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0"> <span> <input type="radio" id="Option-3" name="answer" value="third_option"></span>
                                            Option-3</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="third_option" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <!-- <button class="btn btn-success">Add Question</button> -->
                                            <input class="btn btn-success" type="submit" name="add_que" value="Add Question" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->

                    <div class="page-breadcrumb bg-white mb-4">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <h4 class="page-title">Recently Added Questions</h4>
                            </div>        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                        <?php 
                        $rowperpage = 3;
                         while($qData = mysqli_fetch_array($queRes)){ ?>
                            <div class="col-lg-4 col-md-12 queDiv">
                                <div class="white-box analytics-info">
                                    <h2 class="box-title">Q1. <?php  echo $qData['question']; ?></h2>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <?php if($qData['first_opt'] == $qData['ans']){ ?>

                                            <li class="mr-auto"><span class="counter text-success"><span style="margin-left: 6px;">A.<?php echo $qData['first_opt']; ?></span></span></li> 
                                        <?php }else{ ?>
                                            <li class="mr-auto"><span class="counter"><span style="color: #595959;margin-left: 6px;">A.<?php echo $qData['first_opt']; ?></span></span></li> 
                                        <?php  }
                                            if($qData['sec_opt'] == $qData['ans']){ ?>
                                            <li class="mr-auto"><span class="counter text-success">B.<?php  echo $qData['sec_opt']; ?></span></li>
                                        <?php } else{ ?>
                                            <li class="mr-auto"><span class="counter "><span style="color: #595959;margin-left: 6px;">B.<?php  echo $qData['sec_opt']; ?></span></li>
                                        <?php } 
                                            if($qData['third_opt'] == $qData['ans']){ ?>
                                            <li class="mr-auto"><span class="counter text-success"><span style="margin-left: 6px;">C.<?php  echo $qData['third_opt']; ?></span></span></li>
                                        <?php } else{ ?>
                                            <li class="mr-auto"><span class="counter"><span style="color: #595959;">C.<?php  echo $qData['third_opt']; ?></span></span></li>
                                        <?php } ?>  
                                    </ul>
                                </div>
                            </div>
                        <?php  } ?>
                        <center><div class="col-lg-4"><a href="#" id="loadMore" class="btn btn-success" style="text-align: center;">Load More</a></div></center>
                </div>     
                   
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<?php include('footer.php'); ?>
<!-- For Load More Questions -->
<script type="text/javascript">
$(function () {
    $(".queDiv").slice(0, 3).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".queDiv:hidden").slice(0, 3).slideDown();
        if ($(".queDiv:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});

function get_subcategories()
{
    var main_cat = $('#main_cat').val();    
    var dataString = "main_cat="+ main_cat;
    $.ajax({
        type: "POST",
        url: "loadsubCat.php", 
        data: {action:'get_sub_by_main', dataString:dataString, main_cat:main_cat},
        success: function(html)
        {
            $("#get_sub").html(html);
        }
    });
}
</script>