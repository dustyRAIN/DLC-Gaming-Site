		

<!DOCTYPE html>
		
<html>
<head>
	<title>DLC Gaming Site</title>
	<link rel="stylesheet" href="gamepageAA.css" type="text/css"/>
</head>


<?php
include_once 'php_includes/auth.php';
// Check connection
if($conn === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

$game_id = $_GET['game_id'];
//post game id from ur page
$sql = "SELECT r.game_name,r.description,r.vid_url FROM request r JOIN game g ON (r.request_id=g.request_id) AND g.game_id = $game_id;";
//post gameid 
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);
			 $gn= $row["game_name"] ;
			 $vr= $row["vid_url"] ;
			 $des= $row["description"] ;
//same
$query="SELECT CAST(AVG(points) as decimal(3,2)) as rating FROM `game_ratings` group by game_id HAVING game_id=$game_id;" ;

$res = mysqli_query($conn, $query);


$row2= mysqli_fetch_array($res);
			 $rate=$row2["rating"] ;

?>	


<body onresize="resized()">
	<header>
		<div id="head_top_container">
			<div id="head_top_right">
				<div id="top_bar_links">
					<ul class="top_bar_list">
						<li class="top_bar_list_style"><a href="#">FAQs</a></li>
						<li class="top_bar_list_style"><a href="#">Contact Us</a></li>
					</ul>
				</div>
				<div id="top_bar_follow">
					<ul class="top_bar_list_follow">
						<li class="top_bar_image_style"><a href="#"><img src="">follow</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="head_middle_container">
			<div id="head_middle_left">
				
			</div>
		</div>
		<div id="head_bottom_container">
			<div id="head_bottom_left">
				<div id="head_bottom_left_top"></div>
				<div id="head_bottom_left_bottom">
					<div id="search_field"><input type="text" name="fname"></div>
					<div id="search_button"><a href="">Search</a></div>
				</div>
			</div>
			<div id="head_bottom_right">
				<ul class="bottom_login_area">
					<li class="bottom_login_plain_text"><a>Not a member yet?</a></li>
					<li class="bottom_login_button"><div id="sin_button"><a href="#">Sign Up</a></div></li>
					<li class="bottom_login_plain_text"><a>or</a></li>
					<li class="bottom_login_button"><div id="log_button"><a href="#">Log In</a></div></li>
				</ul>
			</div>
		</div>
	</header>
	 <div class="lower_fixed_header" id="header_to_be_fixed">
		<div class="lower_header_left">
		<p> <?php echo "$gn"; ?>  </p></div>
		<div class="lower_header_right">
			<button id="button_ratings"> RATINGS  <?php echo "$rate"; ?></button></div> 
			<button id="button_download">DOWNLOAD</button></div>
	</div> 
  
	
 </div>
<div class="lower_fixed_header2" id="header_to_be_fixed"></div>

<div class="video-responsive">
			<iframe width="853" height="720"src="https://www.youtube.com/embed/<?php echo "$vr"; ?>?autoplay=1">
	</iframe>
</div>
 <div class ="lower_part">
	<div class="lower_fixed_container1">
		<div class= "lower_container_left"><p style="text-decoration: underline;"> About This Game </p></div></div>
	<div class="lower_fixed_container2">
		<div class= "upper_container_left2"><p>  <?php echo "$des"; ?>  </p></div>
	</div>
	<form action="php1.php" method="POST">
	<div class="showcase">

	<div class="rating-system3">
  <h3>Give your Respect</h3>
  
  <input type="radio" name='rate3' id="star5_3" value="5" />
  <label for="star5_3"></label>

  <input type="radio" name='rate3' id="star4_3" value="4" />
  <label for="star4_3"></label>

  <input type="radio" name='rate3' id="star3_3" value="3" />
  <label for="star3_3"></label>
 
  <input type="radio" name='rate3' id="star2_3" value="2" />
  <label for="star2_3"></label>

  <input type="radio" name='rate3' id="star1_3" value="1" />
  <label for="star1_3"></label>
  <div class="text"></div>
  <br> <br>

  <input id="to_hide" type="text" name="game_id" value="<?php echo $game_id ?>" />
  
  <input type="submit" name="submit"  value="submit">
</div>

	</div>
 
<?php
mysqli_close($conn);
?>	
</body>
</html>


                                                            