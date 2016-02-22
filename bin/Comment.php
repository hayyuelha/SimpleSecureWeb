<?php

Class Comment {
	function addToDB ($title, $content, $username) {
		$sql = "INSERT INTO Comment(title, content, username) VALUES ('$title', '$content', '$username')";
		$query = mysql_query($sql);
	}

	function softdelete ($id) {
		$sql = "UPDATE Comment SET isDeleted = '1' WHERE pid = '$id'";
		$query = mysql_query($sql);
	}

	function getAllComment ($no) {
		$sql = "SELECT * from comments WHERE pid_fk=$no ORDER BY com_date DESC";
		$query = mysql_query($sql);
		return $query;
	}

	function getComments () {
		$sql = "SELECT * FROM Comment WHERE isDeleted = '0'";
		$query = mysql_query($sql);
		return $query;
	}

	function getAComment ($pid) {
		$sql = "SELECT * FROM Comment WHERE pid = '$pid'";
		$query = mysql_query($sql);
		return $query;
	}
}

?>