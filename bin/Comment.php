<?php

Class Comment {
	function addToDB ($nama, $email, $konten,$pid) {
		$sql = "INSERT INTO comments(com_name, com_email, com_dis,pid_fk) VALUES ('$nama', '$email', '$konten','$pid')";
		$query = mysql_query($sql);
		return $query;
	}

	function softdelete ($id) {
		$sql = "UPDATE comments SET isDeleted = '1' WHERE pid = '$id'";
		$query = mysql_query($sql);
	}

	function getAllComment ($no) {
		$sql = "SELECT * from comments WHERE pid_fk=$no ORDER BY com_date DESC";
		$query = mysql_query($sql);
		return $query;
	}

	function getComments () {
		$sql = "SELECT * FROM comments WHERE isDeleted = '0'";
		$query = mysql_query($sql);
		return $query;
	}

	function getAcomments ($pid) {
		$sql = "SELECT * FROM comments WHERE pid = '$pid'";
		$query = mysql_query($sql);
		return $query;
	}
}

?>