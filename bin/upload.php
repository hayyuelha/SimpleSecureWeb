<?php
	require_once("file.php");
	require_once("../connect/connect.php");
	$username = $_POST['username'];
	$allowedTypes = array('image/jpeg', 'image/jpg', 'image/png');
	if (in_array($_FILES['userfile']['type'], $allowedTypes)) {
		$file = str_replace(".php",".php.txt",$_FILES['userfile']['name']);
		$target = "../files/";
		$path = $target.md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'],$path)){
			$fileHandler = new File();
			$fileHandler->addToDB($file,md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION),$username);
			echo "<script>alert('File Uploaded Successfully');</script>";
			header("location: ../upload.php");
		}
	}
	echo "<script>alert('Only image file, please...');</script>";
	header("location: ../upload.php");
	
?>