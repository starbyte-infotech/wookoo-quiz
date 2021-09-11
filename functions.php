<?php 
include('config.php');
if(isset($_POST['action']) && $_POST['action'] == 'select_option')
{
	$qid = $_POST['qid'];
	$selected_option = $_POST['opt'];
	$quedata = "SELECT * FROM `que_tbl` WHERE q_id='$qid'";
	$queRes = mysqli_query($conn, $quedata);
	$queFetch = mysqli_fetch_array($queRes);
	$ans = '';
	
	if($selected_option == 'first'){
		$ans= $queFetch['first_opt'];
	}else if($selected_option == 'second'){
		$ans= $queFetch['sec_opt'];
	}else if($selected_option == 'third'){
		$ans= $queFetch['third_opt'];
	}

	if($ans == $queFetch['ans']){
		echo "1";
		$score = 20;
	}else{
		echo "0";
		$score = -10;
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'load_que')
{
	echo $finalScore = $_POST['finalScore'];
}
?>