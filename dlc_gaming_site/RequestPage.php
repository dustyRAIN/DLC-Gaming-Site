<!DOCTYPE html>
<html>
<head>
	<title>DLC Gaming Site</title>
	<link rel="stylesheet" href="RequestPage.css" type="text/css"/>
	
	<script type="text/javascript" src="JQuery_Ajax.js"></script>

	<link rel="stylesheet" href="plugin_chosen/chosen.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="plugin_chosen/chosen.jquery.min.js"></script>
</head>
<body>
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
				<div class="request_details"><p>Request Here...</p></div>
				<div class="name_details" id="name_info">
					<div class="label"><p>Name of the Game</p></div>
					<div class="label_input"><input type="text" name="game_name" placeholder="Enter Name..." class="namesize" id="game_name"></div>
				</div>
				<div class="name_details"id="game_info">
					<div class="label"><p>Description</p></div>
					<div class="label_input"><textarea name="Desc" placeholder="Description.." class="namesize" id="game_desc"></textarea></div>
				</div>
				<div class="name_details" id="name_info">
					<div class="label"><p>Video URL</p></div>
					<div class="label_input"><input type="URL" name="vidurl" placeholder="Enter URl..." class="namesize" id="vid_url"></div>
				</div>
				<div class="name_details">
					<div class="label"><p>Genre</p></div>
					<div class="label_input">
						<select id="mselect" multiple="">
							<?php 
								include_once 'php_includes/auth.php';

								$sql = "SELECT type FROM genre;";
								$result = mysqli_query($conn, $sql);
						
								while($row = $result->fetch_assoc()){
									?>
									<option><?php echo $row['type'] ?></option>
								<?php }

								mysqli_close($conn);
							?>
							
						</select>
						
					</div>
				</div>
				<div class="name_details">
					<div class="label"></div>
					<div class="label_input"id="select_file"><button onclick="submitted()" name="value" id="Submit_file">Submit</button><br><br></div>
				</div>
			</div>
		</div>
	</div>


	
	<script type="text/javascript">
		$("#mselect").chosen();
	</script>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript" src="RequestPage.js"></script>
	<script type="text/javascript" src="project101_search.js"></script>


	
	

</body>
</html>
