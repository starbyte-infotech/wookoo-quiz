<?php include('config.php'); ?>
<?php
session_start();
if(isset($_GET['number']))
{
    $number=$_GET['number'];
    if(isset($_SESSION['quiz_name']))
    {
        $quiz_name=$_SESSION['quiz_name'];
        $quiz_mobile=$_SESSION['quiz_mobile'];
        $query_user="SELECT * FROM `user_tbl` WHERE `user_tbl`.`name` ='$quiz_name' && `user_tbl`.`mobile` ='$quiz_mobile';";
        $result_user = mysqli_query($conn, $query_user);
        $store = mysqli_fetch_array($result_user);

        $score=$store['score']+$number;
        if($number<0)
        {
            $coins=$store['coins']+10;
        }
        else
        {
            $coins1=$number*10;
            $coins=$store['coins']+$coins1;
        }
        
        $query_user="UPDATE `user_tbl` SET `score` = '$score',`coins`='$coins' WHERE `user_tbl`.`name` ='$quiz_name' && `user_tbl`.`mobile` ='$quiz_mobile';";
        $result_user = mysqli_query($conn, $query_user);
        
    }
    $_SESSION['score']=$number;
    header("location:after-quiz.php");    
}
?>