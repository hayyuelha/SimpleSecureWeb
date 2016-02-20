<?php
	require_once("post.php");
	require_once("../connect/connect.php");
	$username = $_POST['username'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$postHandler = new Post();
	$postHandler->addToDB($title,$content,$username);
	echo "<script>alert('Posted Successfully');</script>";
	header("location: ../postlist.php");
	
?>