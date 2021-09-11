<?php 
include('config.php');

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
    
    <title>index</title>
</head>

<body>
    <div class="mobile-body mx-auto">
        <div class="a11 m-t-65">Wookoo login.</div>

        <div class="row ">
            <form method="POST" id="frm-mobile-verification">
                <div class="col-12 m-t-90">                    
                    <label for=""><span class="a24">Name</span></label>
                    <input class="input" id="firstname" name="firstname" type="text" placeholder="xxxxxx">
                </div>
                <div class="col-12 mt-5">
                    <label for=""><span class="a24">mobile number</span></label>
                    <input class="input" id="mobile" name="mobile" type="text" placeholder="xxxxx-xxxxx">
                </div>
                <div class="col-12 mt-5">
                    <button type="submit" name="continue" class="register continue-btn w-100" onClick="sendOTP();">Continue</button>
                </div>
            </form>
            <div class="col-12 mt-3">
                <div class="a27"><a href="register.php">haven't register yet?</a></div>
            </div>


        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/custom_script.js"></script>

    <script type="text/javascript">
        function sendOTP() { 
            // alert('hhhh');
            $(".error").html("").hide();
            
            var number = $("#mobile").val();
            var name = $("#firstname").val();
            if (number.length == 10 && number != null) {
                var input = {
                    "mobile_number" : number,
                    "name" : name,
                    "action" : "send_otp"
                };
                $.ajax({
                    url : 'controller.php',
                    type : 'POST',
                    data : input,
                    success : function(response) {
                        $(".container").html(response);
                        console.log(response);
                    }
                });
            } else {
                $(".error").html('Please enter a valid number!')
                $(".error").show();
            }
        }
    </script>

</body>

</html>