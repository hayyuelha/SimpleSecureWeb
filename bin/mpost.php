<?php
	session_start();
	if(file_exists("../connect/connect.php")){
		include("../connect/connect.php");
	}else{
		include("connect/connect.php");
	}	
	include "post.php";
	$postHandler = new Post();
	if (isset($_GET['delete'])) {
		$postHandler->softdelete($_GET['delete']);
		header("Location: ../postlist.php");
	}
	// if (isset($_GET['showpost'])) {
	// 	$data = $postHandler->getAPost($_GET['showpost']);
	// 	header("Location: ../showpost.php");
	// }
?>