/*----------------- Mobile OTP Verification ------------------*/
function sendOTP() { 
    // $(".error").html("").hide();
    
    // var number = $("#mobile").val();
    // var name = $("#firstname").val();
    // if (number.length == 10 && number != null) {
    //     var input = {
    //         "mobile_number" : number,
    //         "name" : name,
    //         "action" : "send_otp"
    //     };
    //     $.ajax({
    //         url : 'controller.php',
    //         type : 'POST',
    //         data : input,
    //         success : function(response) {
    //             $(".container").html(response);
    //             console.log(response);
    //         }
    //     });
    // } else {
    //     $(".error").html('Please enter a valid number!')
    //     $(".error").show();
    // }
}
// function verifyOTP() {
//     $(".error").html("").hide();
//     $(".success").html("").hide();
//     var otp = $("#mobileOtp").val();
//     var input = {
//         "otp" : otp,
//         "action" : "verify_otp"
//     };
//     if (otp.length == 4 && otp != null) {
//         $.ajax({
//             url : 'controller.php',
//             type : 'POST',
//             dataType : "json",
//             data : input,
//             success : function(response) {
//                 window.location = "app_index.php";
//             },
//             error : function() {
//                 alert("failed!!");
//             }
//         });
//     } else {
//         alert('You have entered wrong OTP.');
//     }
// }
