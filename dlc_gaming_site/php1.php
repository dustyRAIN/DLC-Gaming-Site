<?php

session_start();

$user = $_SESSION['username'];

include_once 'php_includes/auth.php';
// Check connection
if($conn === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
	$rate3 = $_POST['rate3'];
	$game = $_POST['game_id'];
	//i have set 1,555 to check ! pass url data values for gane id , user id 
	$sql="INSERT INTO `game_ratings` (`game_id`, `user_id`, `points`) VALUES ($game, '$user', '$rate3') ON DUPLICATE KEY UPDATE points='$rate3'" ;
	$run=mysqli_query($conn,$sql);
}
	header("location: http://localhost/dlc_gaming_site/gamepage.php?game_id=".$game); 

	mysqli_close($conn);

  ?>