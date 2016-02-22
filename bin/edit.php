<?php
	require_once("post.php");
	require_once("../connect/connect.php");
	$username = $_POST['username'];
	$pid = $_POST['pid'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$postHandler = new Post();
	$postHandler->editPost($title,$content,$username,$pid);
	echo "<script>alert('Edited Successfully');</script>";
	header("location: ../showpost.php?pid=".$pid);
	
?>