<?php

Class Post {
	function addToDB ($title, $content, $username) {
		$sql = "INSERT INTO post(title, content, username) VALUES ('$title', '$content', '$username')";
		$query = mysql_query($sql);
	}

	function softdelete ($id) {
		$sql = "UPDATE post SET isDeleted = '1' WHERE pid = '$id'";
		$query = mysql_query($sql);
	}

	function getAllPost ($username) {
		$sql = "SELECT * FROM post WHERE username = '$username' AND isDeleted = '0'";
		$query = mysql_query($sql);
		return $query;
	}

	function getPosts () {
		$sql = "SELECT * FROM post WHERE isDeleted = '0'";
		$query = mysql_query($sql);
		return $query;
	}

	function getAPost ($pid) {
		$sql = "SELECT * FROM post WHERE pid = '$pid'";
		$query = mysql_query($sql);
		return $query;
	}

	function editPost ($title,$content,$username,$pid) {
		$sql = "UPDATE post SET title = '$title', content = '$content' WHERE pid = '$pid' AND username = '$username'";
		$query = mysql_query($sql);
	}
}

?>