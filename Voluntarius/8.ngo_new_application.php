<?php 
	session_start();
	
	$link = mysqli_connect("localhost","root","","webappassignment2");
	if(!$link){
		die("Could not connect:".mysqli_connect_error());
		
	}
	if (isset($_POST["action"]))
	{
		if($_POST["action"]=="Reject"){
			$sql = "DELETE FROM event WHERE ngo_email='".$_POST["id"]."'";
			if(!mysqli_query($link,$sql)){
				echo "Error".mysqli_error($link);
			}
			$sql = "DELETE FROM banner WHERE ngo_email='".$_POST["id"]."'";
			if(!mysqli_query($link,$sql)){
				echo "Error".mysqli_error($link);
			}
			$sql = "DELETE FROM ngo WHERE ngo_email='".$_POST["id"]."'";
			if(!mysqli_query($link,$sql)){
				echo "Error".mysqli_error($link);
			}
			//header('Location: '.$_SERVER["PHP_SELF"], true, 303);
		}
		else if ($_POST["action"]=="Approve"){	
			$sql = "UPDATE ngo SET ngo_approval_status=1 WHERE ngo_email='".$_POST["id"]."'";
			mysqli_query($link,$sql);
			//header('Location: '.$_SERVER["PHP_SELF"], true, 303);
		}
		else if($_POST["action"]=="Details"){
			$_SESSION['ngo_email'] = $_POST["id"];
			header("Location:8.ngo_new_application_details.php");
			exit();
		}
	}
	

?>

<!--HTML validated using https://validator.w3.org on 6 Aug-->
<!--Version 1.0 (6 Aug)-->
<!--must have at least one "ngo_application_menu_content", if no record found
use javascript to append a div with "no records" text to prevent collapse -->
<!DOCTYPE html>
<html lang="en">
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>NGO Approval Page</title>
		<link rel="stylesheet" href="Style/reset.css" />
		<link rel="stylesheet" type="text/css" href="Style/19_ngo_new_application.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!--Header is the website logo-->
		<header></header>
		
		<!--Other components in container class
		1. The navigation bar
		2. The NGO application panel 
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
			
			
			<div class="ngo_application_menu">
				<h1>New NGO Applications</h1>
				<?php 
					$sql = "SELECT * FROM ngo WHERE ngo_approval_status=0";
					$result=mysqli_query($link,$sql);
					
					if(mysqli_num_rows($result)!=0){
						while($row = mysqli_fetch_array($result)){?>
							<div class="ngo_application_menu_content">
								<div class="ngo_application_pic">
									<?php 
										echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['ngo_logo'] ).'" alt="Profile Picture width=200px height=200px "/>';
									?>
								</div>
								<div class="ngo_application_info">
									<?php
										echo "<p><strong>Name:</strong><br>"
										.$row["ngo_email"]."</p>
										<p><strong>Chairman: </strong><br>"
										.$row["ngo_chairman"]."</p>
										<p><strong>Category:</strong><br>"
										.$row["ngo_category"]."</p>
										<p><strong>Email:</strong><br>"
										.$row["ngo_email"]."</p>
										<p><strong>Contact Number:</strong><br>"
										.$row["ngo_contact_number"]."</p>";

									?>
									
								</div>
								<div class="ngo_application_button_panel">
									<form method="post" onsubmit="return confirm('Are you sure you want to do perform that action?')">
										<input class="button button_details" name="action" type="submit" value="Details">
										<input class="button button_reject" name="action" type="submit" value="Reject">	
										<input class="button" name="action" type="submit" value="Approve">	
										<input type="hidden" name="id" value=<?php echo $row["ngo_email"];?>>
									</form>
								</div>
							</div>
					<?php
						}	
					}
					else{
						echo "<div class='ngo_application_menu_content'>
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