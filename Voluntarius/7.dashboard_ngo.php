<?php  
 session_start(); 
 
 $connect = mysqli_connect("localhost", "root", "", "webappassignment2");    
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		$my_date = date('Y-m-d H:i:s', strtotime($_POST['startDate']));
		$my_date1 = date('Y-m-d H:i:s', strtotime($_POST['endDate']));
      $query = "INSERT INTO `banner` (`banner_id`,`banner_start_datetime`, `banner_end_datetime`, `banner_file`, `banner_approval_status`, `ngo_email`) VALUES (NULL,'".$my_date."', '".$my_date1."','".$file."' , '0', '".$_SESSION["ngo_email"]."')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 if (isset($_POST["action"]))
{
	if($_POST["action"]=="Remove"){
		$sql = "DELETE FROM participation WHERE event_id='".$_POST["event_id"]."'";
		mysqli_query($connect,$sql);
		
		$sql = "DELETE FROM event WHERE event_id='".$_POST["event_id"]."'";
		mysqli_query($connect,$sql);
		header("Refresh:0");
	}
	
}
 ?>  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NGO Dashboard</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="dashboard_ngo.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class=container>
			<header>
				<img src="volun.png" alt="Your logo" >
			</header>
			<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;">NGO dashboard</h1>
			<nav class="navigation_bar">
			<a href="5.login.php" class='login'>Logout</a>
			<a href="7.ngo_profile.php" class='login'>Profile</a>			
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
									<img class="mySlides" src="data:image/jpeg;base64,'.base64_encode($row['banner_file'] ).'" height="200" width="200" class="img-thumnail" />  
							   </td>  
						  </tr>  
					 ';  
				}  
				?> 
			
			<button id=slideShowRight onclick="plusDivs(1)">&#10095;</button>
		</div>
			<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Submit new banner</h1>
			<form  method="post" enctype="multipart/form-data" style="text-align:center;" id="bannerForm">
				Select image to upload:
				 <input type="file" required name="image" />
				 <br>
				 <br>
				 Start date:<input type="datetime-local" name="startDate" required id="startDate">
				 End date:<input type="datetime-local" name="endDate" required id="endDate">
				<input type="submit" name="insert" id="insert" value="Upload Image" />
			</form>
			<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Event</h1>
			<div class=inforBoxContainer>
				<?php  
				$query = "SELECT * FROM event,ngo WHERE event.ngo_email=ngo.ngo_email AND CURRENT_TIMESTAMP< event.event_reg_deadline";  
				$result = mysqli_query($connect, $query); 
				
				while($row = mysqli_fetch_array($result))  
				{  
					 $query2 = "SELECT * FROM `participation` WHERE event_id='".$row['event_id']."'";  
					$result2 = mysqli_query($connect, $query2);
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
								<form method="post" action="7.Volunteer_Detail_NGO_View.php">
									<input type = "submit" name="submit" value="Details">
									<input type="hidden" name="event_id" value='.$row['event_id'].'>
								</form>
								<form method="post">';		
								$sql3 = "SELECT * FROM event WHERE ngo_email='".$_SESSION['ngo_email']."' AND event_id='".$row['event_id']."'";
								$result3 = mysqli_query($connect,$sql3);
								if(mysqli_num_rows($result3)!=0)
								{
									echo "<input  name='action' type='submit' value='Remove' id='buttonjoin'></p>";
									
												
								}
								
								echo '<input type="hidden" name="event_id" value='.$row['event_id'].'>
								</form>
							</div><hr>	
						</div>';
				}  
				?>
			</div>
			<div id=volBtn>
				<button type="button" onclick="window.location='7.createVolunteerPage.php'">Create Event</button>	
			</div>
			 <footer>
		<div class="footer-block">
		  <div class="footer_option">
				<a href="0.about_us.php" ><strong> About Us </strong></a>
				<a href="0.tnc.php" ><strong> Terms&nbsp;and&nbsp;Conditions </strong></a>
		  </div>
		  <div class="footer-social-media">
		    <strong> Connect with Us: </strong>
				<a href="https://www.facebook.com" class="footer_icon_color"><i class="fa fa-facebook big"></i></a>
				<a href="https://www.instagram.com/" class="footer_icon_color"><i class="fa fa-instagram big"></i></a>
				<a href="https://twitter.com/?lang=en" class="footer_icon_color"><i class="fa fa-twitter big"></i></a>
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
	
	var mainForm = document.getElementById("bannerForm");
	mainForm.onsubmit = function(e){
		var x = document.getElementById("startDate").value;
		var y = document.getElementById("endDate").value;
			if (x>y){
				e.preventDefault(); //tell browser not to submit the form.
				document.getElementById("startDate").style.backgroundColor = "red";
				window.alert("Your banner start date is later than your banner end date");
			}

	}
	</script>
</body>

</html>