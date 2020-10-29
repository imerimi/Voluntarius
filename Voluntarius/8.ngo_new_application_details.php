<?php 
	session_start();
	
	$link = mysqli_connect("localhost","root","","webappassignment2");
	if(!$link){
		die("Could not connect:".mysqli_connect_error());
		
	}
	if (isset($_POST["action"]))
	{
		if($_POST["action"]=="Back"){
			unset ($_SESSION["ngo_email"]);
			header("Location:8.ngo_new_application.php");
			exit();
		}
		else if($_POST["action"]=="Reject"){
			$sql = "SELECT event_id FROM event WHERE ngo_email='".$_SESSION["ngo_email"]."'";
			$result = mysqli_query($link,$sql);
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
			}
			if(mysqli_num_rows($result)!=0){
				while($row = mysqli_fetch_array($result)){
					$sql = "DELETE FROM participation WHERE event_id='".$row['event_id']."'";
					
					if (!mysqli_query($link,$sql))
					{
						echo("Error description: " . mysqli_error($link));
					}
				}
				
			}
			$sql = "DELETE FROM banner WHERE ngo_email='".$_SESSION["ngo_email"]."'";
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
			}
			$sql = "DELETE FROM event WHERE ngo_email='".$_SESSION["ngo_email"]."'";
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
			}
		
			$sql = "DELETE FROM ngo WHERE ngo_email='".$_SESSION["ngo_email"]."'";
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
			}

			unset ($_SESSION["ngo_email"]);
			header("Location:8.ngo_new_application.php");
			exit();
		}
		else if($_POST["action"]=="Approve"){
			$sql = "UPDATE ngo SET ngo_approval_status=1 WHERE ngo_email = '".$_SESSION["ngo_email"]."'";
			if (!mysqli_query($link,$sql))
			{
				echo("Error description: " . mysqli_error($link));
				
			}
			unset ($_SESSION["ngo_email"]);
			header("Location:8.ngo_new_application.php");
			exit();
			
		}
		
	}
?>

<!--must have at least one "ngo_details_content", if no record found
use javascript to append a div with "no records" text to prevent collapse-->

<!DOCTYPE html>
<html lang="en">
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Non-Governmental Organisation (NGO) Details Page</title>
		<link rel="stylesheet" href="Style/reset.css" />
		<link rel="stylesheet" type="text/css" href="Style/19_ngo_new_application_details.css"/>
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
				
			<?php 
			$sql = "SELECT * FROM ngo WHERE ngo_email='".$_SESSION["ngo_email"]."'";
			$result=mysqli_query($link,$sql);
			if(mysqli_num_rows($result)!=0)
			{
				while($row = mysqli_fetch_array($result)){?>
				<div class="ngo_details_menu">
					<div class="ngo_details_content">
			
					<?php
					
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['ngo_logo'] ).'" alt="NGO Logo width=200px height=200px "/>';
						
						echo "<p><strong>NGO Name:</strong><br>"
						.$row["ngo_name"]."</p>
						<p><strong>Chairman: </strong><br>"
						.$row["ngo_chairman"]."</p>
						<p><strong>Category:</strong><br>"
						.$row["ngo_category"]."</p>
						<p><strong>Email:</strong><br>"
						.$row["ngo_email"]."</p>
						<p><strong>Contact Number:</strong><br>"
						.$row["ngo_contact_number"]."</p>
						<p><strong>Address:</strong><br>"
						.$row["ngo_address"]."</p>
						<p><strong>Description:</strong><br>"
						.$row["ngo_description"]."</p>"
								
					?>
						<form method="post">
							<input class="button button_back" name="action" type="submit" value="Back">
							<input class="button button_reject" name="action" type="submit" value="Reject">	
							<input class="button" name="action" type="submit" value="Approve">							
							<input type="hidden" name="id" value=<?php echo $row["ngo_email"];?>>

						</form>
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
				
			<?php
					}
			}
			?>
	
		</div>
		
	
	
		
		

	</body>
</html>