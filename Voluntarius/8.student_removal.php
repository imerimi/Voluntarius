<?php 
	session_start();
	
	$link = mysqli_connect("localhost","root","","webappassignment2");
	if(!$link){
		die("Could not connect:".mysqli_connect_error());
		
	}
	
	if (isset($_POST["action"]))
	{
		//delete from participation as well as student_email is foreign key of that table
		$sql = "DELETE FROM participation WHERE student_email='".$_POST["id"]."'";
		mysqli_query($link,$sql);
		$sql = "DELETE FROM student WHERE student_email='".$_POST["id"]."'";
		mysqli_query($link,$sql);
		header('Location: '.$_SERVER["PHP_SELF"], true, 303);		
	}

?>

<!--HTML validated using https://validator.w3.org on 6 Aug-->
<!--Version 1.0 (6 Aug)-->
<!DOCTYPE html>
<html lang="en">
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Student Removal Page</title>
		<link rel="stylesheet" href="Style/reset.css" />
		<link rel="stylesheet" type="text/css" href="Style/18_student_removal.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!--Header is the website logo-->
		<header></header>
		
		<!--Other components in container class
		1. The navigation bar
		2. The student removal panel 
			2.1. The footer
			(Footer placed in application panel to ensure the panel stays at the bottom)-->
		
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
			
			
			<div class="student_removal_menu">
				<h1>Student List</h1>
				
				
				<!-- student_removal_menu_content is to be created dynamically based on the database query. This is sample only.
				Dynamic created div will be appended into student_removal_menu-->
				<?php 
					$sql = "SELECT * FROM student";
					$result=mysqli_query($link,$sql);
					
					if(mysqli_num_rows($result)!=0){
						while($row = mysqli_fetch_array($result)){?>
							<div class="student_removal_menu_content">
								<div class="student_removal_pic">
									<?php 
										echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['student_profile_pic'] ).'" alt="Profile Picture"/>';
									?>
								</div>
								<div class="student_removal_info">
									<?php
										echo "<p><strong>Student Email:</strong><br>"
										.$row["student_email"]."</p>
										<p><strong>Staff_ID: </strong><br>"
										.$row["student_id"]."</p>
										<p><strong>Name:</strong><br>"
										.$row["student_name"]."</p>
										<p><strong>Contact_Num:</strong><br>"
										.$row["student_contact_num"]."</p>";

									?>
									
								</div>
								<div class="student_removal_button_panel">
									<form method="post" onsubmit="return confirm('Are you sure you want to do perform that action?')">
										<input class="button button_reject" name="action" type="submit" value="Remove">
										<input type="hidden" name="id" value=<?php echo $row["student_email"];?>>
									</form>
								</div>
							</div>
					<?php
						}	
					}
					else{
						echo "<div class='student_removal_menu_content'>
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