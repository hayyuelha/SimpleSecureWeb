<?php
	if(file_exists("../connect/connect.php")){
		include("../connect/connect.php");
	}else{
		include("connect/connect.php");

	}
	Class Comment {
		function addToDB ($nama, $email, $konten,$pid) {
			$sql = "INSERT INTO comments(com_name, com_email, com_dis,pid_fk) VALUES ('$nama', '$email','$konten','$pid')";
			$query = mysql_query($sql);
			return $query;
		}

		function getAllComment ($no) {
			$sql = "SELECT * from comments WHERE pid_fk=$no ORDER BY com_date DESC";
			$query = mysql_query($sql);
			return $query;
		}
		function ekho(){
			return "eko";
		}
	}

?>