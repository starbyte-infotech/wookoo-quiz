<?php
include('config.php');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

if(isset($_POST['action']) && $_POST['action'] == 'send_otp'){

    $mobile_number = $_POST['mobile_number'];
    $name = $_POST['name'];
    $rndno = rand(1000, 9999);
    // $_SESSION['session_otp'] = 1234;

    $url = "https://www.fast2sms.com/dev/bulk?authorization=szlExyGvi293hN1AV4goBaFJXeMHOt7P5wqSQKUTnIpCjDZfmd7zGK4rgaFnEYDHvTCckiPpb3V0UBoq&sender_id=FSTSMS&message=OTP%20CODE%20is%20$rndno&language=english&route=p&numbers=$mobile_number";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $resArr = json_decode($result,true);

    $coins = 100;
    if($resArr['return'] = 1){
        $selUser="SELECT * FROM `user_tbl` WHERE name='$name' AND mobile='$mobile_number'";
        $UserRes = mysqli_query($conn,$selUser);
        if(mysqli_num_rows($UserRes)>=1){
            
            $_SESSION['quiz_name']=$name;
            $_SESSION['quiz_mobile']=$mobile_number;
            header("Location: otp.php?number=$mobile_number");
            echo $status = 1;
        }else{
            $sql = "INSERT INTO `user_tbl`(`name`, `mobile`, `coins`) VALUES ('$name','$mobile_number','$coins')";
            $res = mysqli_query($conn, $sql);
            $_SESSION['quiz_name']=$name;
            $_SESSION['quiz_mobile']=$mobile_number;
            header("Location: otp.php?number=$mobile_number"); 
            echo $status = 0;
        }
    }
    return $mobile_number.$rndno;

}else if(isset($_POST['action']) && $_POST['action'] == 'verify_otp'){

    $otp = $_POST['otp'];                
    if ($otp == $_SESSION['session_otp']) {
        unset($_SESSION['session_otp']);
        echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
        // header("Location: index.php"); 
    } else {        
        unset($_SESSION['quiz_name']);
        unset($_SESSION['quiz_mobile']);
        echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
    }
}
?>
