<?php
	$database = mysqli_connect("localhost","root","","webappassignment2");
	session_start();
	if(isset($_POST['event_id'])){
		$_SESSION['event_id'] = $_POST['event_id'];
	}
	
	
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
			header("Location:9.dashboard_student.php");
			
		}
		else if($_POST["action"]=="Join"){
			$sql = "INSERT INTO participation (student_email, event_id) VALUES ('".$_SESSION['student_email']."','".$_SESSION['event_id']."')";
			if(mysqli_query($database,$sql)){
				
			}
			else{
				echo "Error:".mysqli_error($database);
			}
			
		}
		else if($_POST["action"]=="Unjoin")
		{
			$sql = "DELETE FROM `participation` WHERE student_email='".$_SESSION['student_email']."' AND event_id='".$_SESSION['event_id']."'";
			mysqli_query($database,$sql);
		}
		
	}
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Volunteer Detail (Student View)</title>
		<link rel="stylesheet" href="reset.css" />
		<link rel="stylesheet" type="text/css" href="Volunteer Detail Student View.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header>
			<div class="logo_banner"></div>
		
		</header>
		<nav class="navigation_bar">
					
				<div id="nav_right">
					<a href="5.login.php" class='login'>Logout</a>		
					<a href="9.student_profile.php" class='login'>Profile</a>
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
			<div #id="details">
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
					<summary>Volunteer Joined</summary>
					<?php
						 $query2 = "SELECT * FROM `participation` WHERE event_id='".$_SESSION['event_id']."'";  
						 $result2 = mysqli_query($database, $query2);
						 echo '<p>'.mysqli_num_rows($result2).'</p>';
						 
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
			</div>
			<form method="post">
				<div class="buttoncenter">
					<p><input class="button button_back" name="action" type="submit" value="Back" id="buttonback">
					<?php
						if(mysqli_num_rows($result2)==$event_det[4]){
							$query1 = "select * from event, participation where event.event_id=participation.event_id and participation.student_email='".$_SESSION['student_email']."' and event.event_id=".$_SESSION['event_id']."";  
							$result1 = mysqli_query($database, $query1);
							if(mysqli_num_rows($result1)==0)
							{		
								
								
											
							}
							else
							{

								echo '<input class="button button_reject" name="action" type="submit" value="Unjoin" id="buttonjoin"></p>';
								
							}
						}
						else
						{
							$query1 = "select * from event, participation where event.event_id=participation.event_id and participation.student_email='".$_SESSION['student_email']."' and event.event_id=".$_SESSION['event_id']."";  
							$result1 = mysqli_query($database, $query1);
							if(mysqli_num_rows($result1)==0)
							{		
								echo '<input class="button button_reject" name="action" type="submit" value="Join" id="buttonjoin"></p>';
								
											
							}
							else
							{

								echo '<input class="button button_reject" name="action" type="submit" value="Unjoin" id="buttonjoin"></p>';
								
							}
						}
					?>
					<input type="hidden" name="id" value=<?php echo $_SESSION['event_id']; ?>>
					<input type="hidden" name="id" value=<?php echo $_SESSION['student_email'];?>>
				</div>
			</form>
		</div>
		
		<footer>
		<div class="footer-block">
		  <div class="footer_option">
			<a href="0.about_us.php" ><strong> About Us </strong></a>          
			<a href="0.tnc.php" ><strong> Terms&nbspand&nbspConditions </strong></a>   
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