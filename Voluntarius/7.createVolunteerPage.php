<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "webappassignment2");    

if(isset($_POST["insert"]))  
 { 
	  $my_date = date('Y-m-d H:i:s', strtotime($_POST['startDate']));
	  $my_date1 = date('Y-m-d H:i:s', strtotime($_POST['endDate']));
	  $my_date2 = date('Y-m-d H:i:s', strtotime($_POST['registrationEndDate']));
	  $query ="INSERT INTO`event` (`event_id`, `event_title`, `event_description`, `event_location`, `event_max_volunteer`, `event_start_datetime`, `event_end_datetime`, `event_reg_deadline`, `ngo_email`) VALUES (NULL, '".$_POST['title']."', '".$_POST['description']."', '".$_POST['eventAddress']."', ".$_POST['volunteerNum'].", '".$my_date."', '".$my_date1."', '".$my_date2."', '".$_SESSION["ngo_email"]."')";

	  if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Volunteer event inserted into Database")</script>';  
      }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Volunteer Page</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="createVolunteerPage.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class=container>
		<header>
			<img src="volun.png" alt="Your logo" >
		</header>
		<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Create event page</h1>
			<nav class="navigation_bar">
			<a href="5.login.php" class='login'>Logout</a>
			<a href="7.ngo_profile.php" class='login'>Profile</a>			
			</nav>
			<div class=form>
				<form method="post" id="eventForm">
					<fieldset>
						<legend>Create Event</legend>
						Title:<br>
						<input type="text" name="title" required>
						<br>
						Description:<br>
						<textarea rows="4" cols="50" name="description" form="eventForm" placeholder="Enter description here..." required></textarea>
						<br>
						Event address:<br>
						<textarea rows="4" cols="50" name="eventAddress" form="eventForm" placeholder="Enter address here..." required></textarea>
						<br>
						Start date time:<br>
						<input type="datetime-local" name="startDate" required id="startDate">
						<br>
						End date time:<br>
						<input type="datetime-local" name="endDate" required id="endDate">
						<br>

						Number of volunteer:<br>
						<input type="number" name="volunteerNum" required min="1" max="999">
						<br>
						registration deadline:<br>
						<input type="datetime-local" name="registrationEndDate" required id="registrationEndDate">
						<br>
						<br>
						<button type="button" onclick="window.location='7.dashboard_ngo.php'">Cancel</button>
						<input type="submit" name="insert" id="insert" value="Create" />
					</fieldset>
				</form>
			</div>
			<footer>
		<div class="footer-block">
		  <div class="footer_option">
			<a href="0.about_us.php" ><strong> About Us </strong></a>          <!----------CONNECT TO ABOUT US--------->
			<a href="0.tnc.php" ><strong> Terms&nbspand&nbspConditions </strong></a>   <!----------CONNECT TO TNC--------->
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
	</div>
<script>

	var mainForm = document.getElementById("eventForm");
	mainForm.onsubmit = function(e){
		var x = document.getElementById("startDate").value;
		var y = document.getElementById("endDate").value;
		var z = document.getElementById("registrationEndDate").value;
			if (x>y){
				e.preventDefault(); //tell browser not to submit the form.
				document.getElementById("startDate").style.backgroundColor = "red";
				window.alert("Your event start date is later than your event end date");
			}
			else if(z>y)
			{
				document.getElementById("startDate").style.backgroundColor = "white";
			}
			if(z>y)
			{
				e.preventDefault(); //tell browser not to submit the form.
				document.getElementById("registrationEndDate").style.backgroundColor = "red";
				window.alert("Your event dateline is later than your event start date");
			}
			else
			{
				document.getElementById("registrationEndDate").style.backgroundColor = "white";
			}

	}
</script>
</body>
</html>