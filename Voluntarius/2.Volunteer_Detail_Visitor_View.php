<?php
	session_start();

	$_SESSION['event_id'] = $_POST['eventID'];
	require_once('4.config.inc.php');
	require('3.database.inc.php');
	
	$event_detail = readSelectEvent($_SESSION['event_id']);
	$event_detail1 = readSelectEvent($_SESSION['event_id']);
	$event_detail2 = readSelectEvent($_SESSION['event_id']);
	$event_detail3 = readSelectEvent($_SESSION['event_id']);
	$event_ngo = readEvent_ngo($_SESSION['event_id']);
	$event_ngo1 = readEvent_ngo($_SESSION['event_id']);
	$event_banner =readEvent_banner($_SESSION['event_id']);
	
	if (isset($_POST["action"]))
	{
		if($_POST["action"]=="Back"){
			unset ($_SESSION["event_id"]);
			header("Location:1.dashboard_visitor.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Volunteer Detail (Visitor View)</title>
		<link rel="stylesheet" href="reset.css" />
		<link rel="stylesheet" type="text/css" href="Volunteer Detail Visitor View.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header>
			<div class="logo_banner"></div>
		
		</header>
		<nav class="navigation_bar">
			<a href="5.login.php" class='login'>Log in</a>	
				<div class="dropdown">
				<button class="dropbtn">Sign Up 
				  <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="6.Admin_Reg.php" >Admin sign up</a>
					<a href="6.Student_Reg.php" >Student sign up</a>
					<a href="6.NGO_Reg.php" >NGO sign up</a>
				</div>
			  </div> 		
		</nav>
			
		<div class="container">
			<div class="content">
			<table>
				<tbody>
					<?php
				
						foreach($event_ngo as $row)
						echo '<tr><td colspan="2"><img src="data:image/jpeg;base64,'.base64_encode($row['ngo_logo']).'" alt="NGO Logo" id="image"></td></tr>';
					
						foreach($event_detail as $event_det)
						{
							echo'<tr><td class="title">Event ID</td><td>'.$event_det[0].'</td></tr>';
							echo'<tr><td class="title">Event Title</td><td>'.$event_det[1].'</td></tr>';
							echo'<tr><td class="title">Event Address</td><td>'.$event_det[3].'</td></tr>';
							echo'<tr><td class="title">Start Day&Time</td><td>'.$event_det[5].'</td></tr>';
							echo'<tr><td class="titleend">End Day&Time</td><td>'.$event_det[6].'</td></tr>';
						}
					?>
				</tbody>
			</table>
				<details open #id="details">
					<summary>Description</summary>
					<?php
						foreach($event_detail1 as $event)
							echo '<p>'.$event[2].'</p>';
					?>
				</details>
				<details open #id="details">
					<summary>Organized by</summary>
						<?php
						foreach($event_ngo1 as $ngo_name)
							echo '<p>'.$ngo_name[3].'</p>';
						?>
				</details>
				<details open #id="details">
					<summary>Volunteer Needed</summary>
					<?php
						foreach($event_detail2 as $event_det)
							echo '<p>'.$event_det[4].'</p>';
					?>
				</details>
				<details open #id="details">
					<summary>Closing Registration Date</summary>
					 <?php
						foreach($event_detail3 as $event_det)
							echo '<p>'.$event_det[7].' volunteer </p>';
					?>
				</details>
			</div>
			<p id="signup">*Sign Up to join</p>
			<form method="post">
			<div class="buttoncenter">
				<p><input class="button button_back" name="action" type="submit" value="Back" id="buttonback">
				<input type="hidden" name="id" value=<?php echo $_SESSION['event_id'];?>>
			</div>
			</form>
		</div>
		
		<footer>
		<div class="footer-block">
		  <div class="footer_option">
				<a href="0.about_us.php" ><strong> About Us </strong></a>
				<a href="0.tnc.php" ><strong> Terms and Conditions </strong></a>
		  </div>
		  <div class="footer-social-media">
		    <strong> Connect with Us: </strong>
				<a href="https://www.facebook.com"><i class="fa fa-facebook big"></i></a>
				<a href="https://www.instagram.com/"><i class="fa fa-instagram big"></i></a>
				<a href="https://twitter.com/?lang=en"><i class="fa fa-twitter big"></i></a>
          </div>
		 </div>
		  <div class="footer-copyright">
			<p id="copyright"><em>Copyright &copy; 2019 Voluntarius. All Rights Reserved. </em></p>
		  </div>
      </footer>
		
	</body>
</html>