<?php  
 session_start(); 

 $connect = mysqli_connect("localhost", "root", "", "webappassignment2");  
if (isset($_POST["action"]))
	{
	
		if($_POST["action"]=="Join"){
			$sql = "INSERT INTO participation (student_email, event_id) VALUES ('".$_SESSION['student_email']. "',".$_POST["evenID"].")";
			mysqli_query($connect,$sql);
		}
		else if ($_POST["action"]=="Unjoin"){	
			$sql = "DELETE FROM `participation` WHERE student_email='".$_SESSION['student_email']."' AND event_id='".$_POST["evenID"]."'";
			mysqli_query($connect,$sql);
		}
	}
 ?> 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="dashboard_student.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class=container>
			<header>
				<img src="volun.png" alt="Your logo" >
			</header>
					<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Student dashboard</h1>
			<nav class="navigation_bar">
			<a href="5.login.php" class='login'>Logout</a>
			<a href="9.student_profile.php" class='login'>Profile</a>		
			</nav>
					<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Banner</h1>

			<div id=slideShow>
			<button id=slideShowLeft onclick="plusDivs(-1)">&#10094;</button>
				<?php  
				$query = "SELECT * FROM banner WHERE banner_approval_status=1 AND CURRENT_TIMESTAMP>=`banner_start_datetime` AND CURRENT_TIMESTAMP<`banner_end_datetime`";  
				$result = mysqli_query($connect, $query);  
				while($row = mysqli_fetch_array($result))  
				{  
					 echo '  
						  <tr>  
							   <td>  
									<img class="mySlides" src="data:image/jpeg;base64,'.base64_encode($row['banner_file'] ).'" height="200" width="200" class="img-thumnail" alt='.$row['banner_id'].'/>  
							   </td>  
						  </tr>  
					 ';  
				}  
				?> 
			
			<button id=slideShowRight onclick="plusDivs(1)">&#10095;</button>
		</div>
					<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Event</h1>

			<div class=inforBoxContainer>
				<?php  
				$query = "SELECT * FROM event,ngo WHERE event.ngo_email=ngo.ngo_email AND CURRENT_TIMESTAMP< event.event_reg_deadline";  
				$result = mysqli_query($connect, $query); 
				  
				while($row = mysqli_fetch_array($result))  
				{  
					 $query2 = "SELECT * FROM `participation` WHERE event_id='".$row['event_id']."'";  
					$result2 = mysqli_query($connect, $query2);
					 if(mysqli_num_rows($result2)==$row['event_max_volunteer'])
					{
						echo '<div class="displayInfoPackageRight">
								<div class="displayInfoBox">
									<div class="infoBoxImage">
										<img src="data:image/jpeg;base64,'.base64_encode($row['ngo_logo'] ).'" alt='.$row['event_id'].'/>
									</div>
									<div class="infoBoxWord">
										<p>Event Name:'.$row['event_title'].'<br>Date:'.$row['event_start_datetime'].' to '.$row['event_end_datetime'].'<br>Event Location:'.$row['event_location'].'<br>Number of people joined:'.mysqli_num_rows($result2).'/'.$row['event_max_volunteer'].'</p>
									</div>
									
								</div>
								<div class="infoBoxButton">
									<form method="post" action="9.Volunteer_Detail_Student_View.php">
										<input type = "submit" name="submit" value="Details">
										<input type="hidden" name="event_id" value='.$row['event_id'].'>
										<input type="hidden" name="student_email" value='.$_SESSION['student_email'].'>
									</form>	
									<form method="post">';		
								$query1 = "select * from event, participation where event.event_id=participation.event_id and participation.student_email='".$_SESSION['student_email']."' and event.event_id=".$row['event_id']."";  
								$result1 = mysqli_query($connect, $query1);
								if(mysqli_num_rows($result1)==0)
								{
									
									
												
								}
								else
								{

									echo '<input class="button" name="action" type="submit" value="Unjoin">';
									echo '<input type="hidden" name="evenID" value='.$row['event_id'].'>';
									
								}
								
								echo '</form><hr>
								</div>	
							</div>';
									
					}
					else	 
					{ 
						 echo '<div class="displayInfoPackageRight">
								<div class="displayInfoBox">
									<div class="infoBoxImage">
										<img src="data:image/jpeg;base64,'.base64_encode($row['ngo_logo'] ).'" />
									</div>
									<div class="infoBoxWord">
										<p>Event Name:'.$row['event_title'].'<br>Date:'.$row['event_start_datetime'].' to '.$row['event_end_datetime'].'<br>Event Location:'.$row['event_location'].'<br>Number of people joined:'.mysqli_num_rows($result2).'/'.$row['event_max_volunteer'].'</p>
									</div>
									
								</div>
								<div class="infoBoxButton">
									<form method="post" action="9.Volunteer_Detail_Student_View.php">
										<input type = "submit" name="submit" value="Details">
										<input type="hidden" name="event_id" value='.$row['event_id'].'>
										<input type="hidden" name="student_email" value='.$_SESSION['student_email'].'>
									</form>
									<form method="post">';		
								
								$query1 = "select * from event, participation where event.event_id=participation.event_id and participation.student_email='".$_SESSION['student_email']."' and event.event_id=".$row['event_id']."";  
								$result1 = mysqli_query($connect, $query1);
								if(mysqli_num_rows($result1)==0)
								{		
									echo '<input class="button" name="action" type="submit" value="Join">';
									echo '<input type="hidden" name="evenID" value='.$row['event_id'].'>';
									
												
								}
								else
								{

									echo '<input class="button" name="action" type="submit" value="Unjoin">';
									echo '<input type="hidden" name="evenID" value='.$row['event_id'].'>';
									
								}
								
								echo '</form><hr>
								</div>	
							</div>';
					}
				}  
				?> 
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
	</div>
	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}    
	  x[myIndex-1].style.display = "block";  
	  setTimeout(carousel, 2000); // Change image every 2 seconds
	}
	</script>

	<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
		 x[i].style.display = "none";  
	  }
	  x[slideIndex-1].style.display = "block";  
	}
	</script>
</body>
</html>