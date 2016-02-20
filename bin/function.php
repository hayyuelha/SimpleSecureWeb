<?php
header('X-Frame-Options: SAMEORIGIN');
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
function only_for_user($if_true,$if_false){
	if(isset($_SESSION['username'])){
		echo $if_true;
	}else{
		echo $if_false;
	}
}
function generate_csrf_token(){
	$date = date("H:i");
	$jam = date("H");
	$menit = substr($date, strpos($date, ":")+1);
	return md5($jam.round($menit,-1));
}

?>