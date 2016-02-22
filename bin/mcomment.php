<?php 
	require_once("comment.php");
	$comment_handler = new Comment();
	
	switch ($_GET['id']){
		case 1: 
				$pid = 		$_POST['pid'];
				$nama = 	$_POST['nama'];
				$email =	$_POST['email'];
				$konten	= 	htmlentities($_POST['konten']);
				$comment_handler->addToDB($nama,$email,$konten,$pid);
				header("location: ../showpost.php?pid=".$pid);
				break;
	}
?>