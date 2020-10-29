<?php 
	session_start();
	
	$link = mysqli_connect("localhost","root","","webappassignment2");
	if(!$link){
		die("Could not connect:".mysqli_connect_error());
		
	}

	$link = mysqli_connect("localhost","root","","webappassignment2");
	if(!$link){
		die("Could not connect:".mysqli_connect_error());
		
	}

	if (isset($_POST["action"]))
	{
		if($_POST["action"]=="Reject"){
			$sql = "DELETE FROM banner WHERE banner_id='".$_POST["id"]."'";
			$result = mysqli_query($link,$sql);
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
			}
		}
		else if($_POST["action"]=="Approve"){
			$sql = "UPDATE banner SET banner_approval_status=1 WHERE banner_id='".$_POST["id"]."'";
			$result = mysqli_query($link,$sql);
		}
		header('Location: '.$_SERVER["PHP_SELF"], true, 303);
	}
?>




<!--HTML validated using https://validator.w3.org on 8 Aug-->
<!--Version 1.0 (8 Aug)-->
<!--must have at least one "ngo_details_content", if no record found
use javascript to append a div with "no records" text to prevent collapse-->

<!DOCTYPE html>
<html lang="en">
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Banner Approval</title>
		<link rel="stylesheet" href="Style/reset.css" />
		<link rel="stylesheet" type="text/css" href="Style/22_admin_banner_approval.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header></header>
		
		<div class="container">
			<nav class="navigation_bar">
				<div class="pages_dropdown">
					<a href="#" class="navigation_dropdown">Navigation</a>
					<div class="navigation_dropdown_content">
						<a href="8.admin_approval_main.php">Admin</a>
						<a href="8.student_removal.php">Student</a>
						<a href="8.ngo_approval_main.php">NGO</a>
						<a href="8.admin_event_board.php">Event Board</a>
						<a href="8.banner_main.php">Banner</a>
					</div>
				</div>							
				<a id="logout_anchor" href="5.login.php">Logout</a>
				<a id="profile_anchor" href="8.admin_profile.php">Profile</a>		
			</nav>
			
			
				
			<div class="admin_banner_approval_menu">
				<?php
					$sql = "SELECT * FROM banner WHERE banner_approval_status=0";
					$result=mysqli_query($link,$sql);
					if(mysqli_num_rows($result)!=0){
						while($row = mysqli_fetch_array($result)){?>
						<div class="admin_banner_approval_menu_content">
							<div class="admin_banner_approval_menu_banner">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['banner_file'] ).'" alt="NGO Logo width=200px height=200px "/>'; ?>
							</div>
							<div class="admin_banner_approval_menu_description">
								<?php
										echo "<p><strong>Banner ID:</strong><br>"
										.$row["banner_id"]."</p>
										<p><strong>Start Datetime: </strong><br>"
										.$row["banner_start_datetime"]."</p>
										<p><strong>End Datetime:</strong><br>"
										.$row["banner_end_datetime"]."</p>
										<p><strong>Submitted By:</strong><br>"
										.$row["ngo_email"]."</p>";		
									?>
										
								<form method="post">
									<input class="button button_reject" name="action" type="submit" value="Reject">
									<input class="button" name="action" type="submit" value="Approve">										
									<input type="hidden" name="id" value=<?php echo $row["banner_id"];?>>

								</form>
							</div>
						</div>
						<?php
						}
					}else{
						echo "<div class='admin_banner_approval_menu_content'>
							<div class='no_record_filler'>There are no pending applications as of now.~</div>
							</div>";
					}
						?>
				
				<footer>
					<div class="footer_left">
						<a href="0.about_us.php" ><strong> About Us </strong></a>
						<a href="0.tnc.php" ><strong> Terms&nbsp;and&nbsp;Conditions </strong></a>
					</div>
					<div class="footer_mid">
						<p id="copyright"><em>Copyright &copy; 2019 Voluntarius. All Rights Reserved. </em></p>
					</div>
					<div class="footer_right">
						<strong> Connect with Us: </strong>
							<a href="https://www.facebook.com" class="footer_icon_color"><i class="fa fa-facebook big"></i></a>
							<a href="https://www.instagram.com/" class="footer_icon_color"><i class="fa fa-instagram big"></i></a>
							<a href="https://twitter.com/?lang=en" class="footer_icon_color"><i class="fa fa-twitter big"></i></a>
					</div>
				</footer>
	
			</div>
		</div>
			

	</body>
</html>