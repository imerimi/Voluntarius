<?php
	session_start();
	require_once('4.config.inc.php');
	require_once('3.database.inc.php');
	
	$admin = register_admin();
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Admin Reg</title>
		<link rel="stylesheet" href="reset.css" />
		<link rel="stylesheet" type="text/css" href="Admin_Reg.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header>
			<div class="logo_banner"></div>
		
		</header>
		<nav class="navigation_bar">
			<a href="5.login.php"	class='login'>Log in</a>	
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
			<div class="form">
				<form method="post" action="6.Admin_Reg.php" enctype="multipart/form-data">
					<p class="headerform">Sign up for administrator</p>
					<br>
					<br>
					<br>
					<p id="required">*Required</p>
					<p class="Question"><label>Full Name <span style="color:red">*</span></label><br><input type="text" name="staff_name" placeholder="Enter Name" required /></p>
					<p class="Question"><label>Staff ID <span style="color:red">*</span></label><br><input type="text" name="staff_ID" placeholder="Enter Staff ID" required /></p>
					<p class="Question"><label>Email <span style="color:red">*</span></label><br><input type="email" name="staff_email" placeholder="Enter Email" required /></p>
					<p class="Question"><label>Password <span style="color:red">*</span></label><br><input type="password" name="staff_password" placeholder="Enter Password" required /></p>
					<p class="Question"><label>Contact <span style="color:red">*</span></label><br><input type="text" name="staff_contact" placeholder="Enter Contact" required /></p>
					<p class="Question"><label>Upload Profile photo <span style="color:red">*</span></label><br>
					<input id="profile" type="file" name="admin_profile" required />
					<div class="buttoncenter">
						<p><input type="reset" value="Clear"><input type="Submit" value="Register" name="register_admin"/></p>
						<p><button type="button" onclick="window.location='5.login.php'" class="button_back">Back</button></p>
					</div>
				</form>
			</div>

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
		
	</body>
</html>