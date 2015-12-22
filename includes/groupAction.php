<?php
	if($_GET['action'] == 'leave') {
   		$query = mysql_query("DELETE FROM `join`  WHERE `group_id` =".$_GET['group_id']." AND student_id=".$_GET['student_id']) or die (mysql_error());
   		if($query) {
			header("location: index.php?p=viewGroup&group_id=".$_GET['group_id']);
   		}
	} else if($_GET['action'] == 'join') {
		$query = mysql_query("INSERT INTO `".DB_DATABASE."`.`join` ( `group_id` , `student_id`) VALUES (".$_GET['group_id'].",".$_GET['student_id'].") ") or die (mysql_error());
   		if($query) {
			header("location: index.php?p=viewGroup&group_id=".$_GET['group_id']);
   		}
	}
?>