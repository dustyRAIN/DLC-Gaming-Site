<!DOCTYPE html>
<html>
<head>
	<title>DLC Gaming Site</title>
	<link rel="stylesheet" href="project101.css" type="text/css"/>

	<link rel="stylesheet" href="plugin_chosen/chosen.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="plugin_chosen/chosen.jquery.min.js"></script>
</head>

<!--?php

	include_once 'php_includes/auth.php';

	$sql = "SELECT password from `user`;";
    //$result = mysqli_query($conn, $sql);
    //$resultRows = mysqli_num_rows($result);

	//while($row = $result->fetch_assoc()){
		//echo $row['password'];
	//}

	//mysqli_close($conn);
	
	echo md5("pass");

	?-->




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
				<a href="project101.php" id="site_name">DLC Gaming Site</a>
			</div>
		</div>
		<div id="head_bottom_container">
			<div id="head_bottom_left">
				<div id="head_bottom_left_top"></div>
				<div id="head_bottom_left_bottom">
					<div id="search_field"><input type="text" name="fname" id="search_box"></div>
					<div id="search_button"><a href="">Search</a></div>
					<div class="searh_result_container" id="search_dropdown">
						<ul id="search_result_list">
							
						</ul>
					</div>
				</div>
			</div>
			<div id="head_bottom_right">
				<ul class="bottom_login_area" id="login_area">
					<li class="bottom_login_plain_text"><p>Not a member yet?</p></li>
					<li class="bottom_login_button"><a href="SignUp.php"><button id="sin_button">Sign Up</button></a></li>
					<li class="bottom_login_plain_text"><p>or</p></li>
					<li class="bottom_login_button"><a href="SignIn.php"><button id="log_button">Log In</button></a></li>
				</ul>

				
			</div>
		</div>
	</header>

	<div class="middle_part">
		<div class="slider_container">
			<div class="game_desc_container">
				<div class="slide_game_details">
					<a id="slide_game_title" href="#" onclick="gotoShownGame()">Battlefield 5</a>
					<p id="slide_game_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. netur quia necessitatibus dicta.</p>
				</div>
				<div class="slide_ask_to_upload">
					<p id="slide_game_req_ques">Want to contribute to the community?</p>
					<a id="slide_req_game_up" href="RequestPage.php">Upload your game</a>
				</div>
			</div>
			<span class="dot1" onclick="slidebuttonClicked(1)"></span> 
  			<span class="dot2" onclick="slidebuttonClicked(2)"></span> 
  			<span class="dot3" onclick="slidebuttonClicked(3)"></span> 
			<div class="sliding_content">
				<div class="div_slider" id="div_slider_last"></div>
				<div class="div_slider" id="div_slider_1"></div>
				<div class="div_slider" id="div_slider_2"></div>
				<div class="div_slider" id="div_slider_3"></div>
				<div class="div_slider" id="div_slider_first"></div>
			</div>
		</div>
	</div>

	<!--div class="mid_extra_container">
		<div class="top_contributer_container">
			<div class="top_contributor_heading"><p>Top Contributors</p></div>
			
		</div>
		<div class="dont_know_what_to_put_container">
			
		</div>
	</div-->



	<div class="lower_fixed_header" id="header_to_be_fixed">
		<div class="lower_header_left"><p>Discover Our Games</p></div>
		<div class="lower_header_right">
			<div class="mselect_cont">
				<select id="mselect" multiple="">

				<?php 
				include_once 'php_includes/auth.php';

					$sql = "SELECT type FROM genre;";
					$result = mysqli_query($conn, $sql);

					while($row = $result->fetch_assoc()){
					?>
					<option><?php echo $row['type'] ?></option>
					<?php 
				}

				mysqli_close($conn);
				?>
				</select>
			</div>
			
			<div class="butt_cont">
				<button id="button_sort" onclick="genreSelected()">SORT</button>
			</div>
			
		</div>
	</div>

	<script type="text/javascript">
		$("#mselect").chosen();
	</script>
	
	<ul id="game_card_list">
		
	</ul>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="project101.js"></script>
	<script type="text/javascript" src="project101_search.js"></script>

</body>
</html>


