<?php
	include_once 'auth.php';
	
	session_start();

	if(isset($_GET['game_name']) && isset($_SESSION['username'])){
		$name = $_GET['game_name'];
		$user = $_SESSION['username'];
		$description = $_GET['dsc'];
		$vid_url = $_GET['url'];
	
		$sql= "INSERT INTO `request`(`uploader_id`, `game_name`, `description`, `vid_url`, `pic_url`, `state`, `file_url`)
		VALUES ('$user', '$name', '$description', '$vid_url', '', 0, '');";
	

		if(mysqli_query($conn, $sql)){
			echo mysqli_insert_id($conn);
		} else {
			echo 0;
		}
		mysqli_close($conn);
	} else {
		echo 0;
	}
	
	//header("Location: ../project101.php");
