<?php
session_start();  
 $connect = mysqli_connect("localhost", "root", "", "webappassignment2");   
$query = "SELECT * FROM student WHERE student_email='".$_SESSION['student_email']."' ";  
$result = mysqli_query($connect, $query); 
$row = mysqli_fetch_array($result)
 ?> 
<?php  
$query1 = "SELECT * FROM participation,event WHERE participation.event_id=event.event_id AND student_email='".$_SESSION['student_email']."' ";  
$result1 = mysqli_query($connect, $query1); 
$row1 = mysqli_fetch_array($result1)
 ?>
<?php 
if (isset($_POST["action"]))
{ 
	if(isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"]))
	{
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

		$query2 = "UPDATE `student` SET student_profile_pic='".$file."',student_name='".$_POST["name"]."',student_id='".$_POST["id"]."',student_password='".$_POST["password"]."' ,student_contact_num='".$_POST["contactNum"]."' WHERE student_email='".$_SESSION['student_email']."'";  
		mysqli_query($connect, $query2); 
		if(mysqli_query($connect, $query2))  
		  {  
			   echo '<script>alert("Updated Database")</script>'; 
				header("Refresh:0");
		  }  
	}
	else
	{
		$query2 = "UPDATE `student` SET student_name='".$_POST["name"]."',student_id='".$_POST["id"]."',student_password='".$_POST["password"]."' ,student_contact_num='".$_POST["contactNum"]."' WHERE student_email='".$_SESSION['student_email']."'";  
		mysqli_query($connect, $query2); 
		if(mysqli_query($connect, $query2))  
		  {  
			   echo '<script>alert("Updated Database")</script>'; 
				header("Refresh:0");
		  }
	}
}
 ?>  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Profile</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="student_profile.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class=container>
		<header>
			<img src="volun.png" alt="Your logo" >
		</header>
		<h1 style="color:blue;text-align:center;background-color: lightblue;margin:0;font-family: 'Times New Roman', Times, serif;";>Student profile page</h1>
		<nav class="navigation_bar">
			<a href="5.login.php" class='login'>Logout</a>		
			<a href="9.student_profile.php" class='login'>Profile</a>		
			</nav>
		<div class=form>			
			<form method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Profile</legend>
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['student_profile_pic'] ).'" />' ?>
					<br>
					<br>
					Upload new profile image:
					<input type="file"  name="image" />
					<br>
					Name:<br>
					<input type="text" name="name" value="<?php echo $row['student_name']?>">
					<br>
					ID:<br>
					<input type="text" name="id" value="<?php echo $row['student_id']?>">
					<br>
					Email:<br>
					<input type="email" name="email" value="<?php echo $row['student_email']?>">
					<br>
					Contact number:<br>
					<input type="tel" name="contactNum" value="<?php echo $row['student_contact_num']?>">
					<br>
					Password:<br>
					<input type="password" name="password" value="<?php echo $row['student_password']?>">
					<br>
					<br>
					<button class="button" onclick="window.location='9.dashboard_student.php'" type="button">Back</button>
					<input class="button" name="action" type="submit" value="Modify">
				</fieldset>
			</form>
		</div>
		<div class=table>
			<table>
				<thead>
					<tr>
						<th colspan=2>List of event you are participating</th>
					</tr>
				</thead>
				<tbody>
				<?php  
				$query = "SELECT * FROM participation,event WHERE participation.event_id=event.event_id AND student_email='".$_SESSION['student_email']."' ";  
				$result = mysqli_query($connect, $query);  
				while($row = mysqli_fetch_array($result))  
				{  
					 echo '<tr>
						<td>'.$row['event_start_datetime'].'</td>
						<td>'.$row['event_title'].'</td>
					</tr>';
				}  
				?>
				
					
				</tbody>
			</table>
		</div>
		<footer>
		<div class="footer-block">
		  <div class="footer_option">
			<a href="#" ><strong> About Us </strong></a>
			<a href="#" ><strong> Terms and Conditions </strong></a>
			<a href="#" ><strong> FAQs </strong></a>
		  </div>
		  <div class="footer-social-media">
		    <strong> Connect with Us: </strong>
            <a href="#"><i class="fa fa-facebook big"></i></a>
            <a href="#"><i class="fa fa-instagram big"></i></a>
            <a href="#"><i class="fa fa-twitter big"></i></a>
          </div>
		 </div>
		  <div class="footer-copyright">
			<p id="copyright"><em>Copyright &copy; 2019 Voluntarius. All Rights Reserved. </em></p>
		  </div>
      </footer>
	</div>
</body>
</html>