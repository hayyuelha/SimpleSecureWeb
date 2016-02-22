<?php 
	require_once("Comment.php");
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
		case 2: 

				break;
		case 3:

				break;
		case 4:
				$registrator->showUser();
				break;	
	}
?>