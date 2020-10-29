<?php
	session_start();
	require_once('4.config.inc.php');
	require_once('3.database.inc.php');
	
	$NGO = register_NGO();
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>NGO Reg</title>
		<link rel="stylesheet" href="reset.css" />
		<link rel="stylesheet" type="text/css" href="NGO_Reg.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header>
			<div class="logo_banner"></div>
		
		</header>
		<nav class="navigation_bar">
			<a href="5.login.php"	 class='login'>Log in</a>	
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
				<form method="post" action="6.NGO_Reg.php" enctype="multipart/form-data">
						<p class="headerform">Sign up for NGO<span>Be  part of us to create a better world</span></p>
						<br>
						<br>
						<br>
						<p id="required">*Required</p>
						<p class="Question"><label>NGO Name <span style="color:red">*</span></label><br><input type="text" name="NGO_name" placeholder="Enter NGO Name" required /></p>
						<p class="Question"><label>Category <span style="color:red">* </span></label><select name="category" required >
							<option disabled selected value> -- Select an option -- </option>
							<optgroup label="Animal Charities">
							<option>Wildlife Conservation Organization</option>
							<option>Pet and Animal Welfare Organization</option>
							<option>Hunting & Fishing Conservation Groups</option>
							<option>Zoos and Aquariums</option>
							<optgroup label="Environmental Charities">
							<option>Environmental Conservation & Protection</option>
							<option>Parks and Nature Centers</option>
							<optgroup label="International NGOs">
							<option>International Development NGOs</option>
							<option>Disaster Relief & Humanitarian NGOs</option>
							<option>Peace & Human Rights NGOs</option>
							<option>Conservation NGOs</option>
							<optgroup label="Health Charities">
							<option>Disease & Disorder Charities</option>
							<option>Medical Services & Treatment</option>
							<option>Medical Research Charities</option>
							<option>Patient and Family Support Charities</option>
							<optgroup label="Education Charities">
							<option>Private Elementary, JR High and High Schools</option>
							<option>Universities and Colleges</option>
							<option>Scholarship and financial aid services</option>
							<option>School Reform and Experimental Education</option>
							<option>Support for students, teachers & parents</option>
							<optgroup label="Arts & Culture Charities">
							<option>Museums & Art Galleries</option>
							<option>Performing Arts</option>
							<option>Libraries & Historical Societies</option>
							<option>Public Broadcasting and Media</option>
							<option>Poverty Alleviation</option>
							<option>Others</option>
						</select></p>
						<p class="Question"><label>Chairman Full Name <span style="color:red">*</span></label><br><input type="text" name="Chairman_name" placeholder="Enter Name" required /></p>
						<p class="Question"><label>Description <span style="color:red">*</span></label><br><textarea rows="3" cols="60" placeholder="Enter description" name= "description" required /></textarea></p>
						<p class="Question"><label>Email <span style="color:red">*</span></label><br><input type="email" name="NGO_email" placeholder="Enter Email" required /></p>
						<p class="Question"><label>NGO Address <span style="color:red">*</span></label><br><textarea rows="3" name="NGO_address" cols="60" placeholder="Enter Address" required ></textarea></p>
						<p class="Question"><label>Password <span style="color:red">*</span></label><br><input type="password" name="NGO_password" placeholder="Enter Password" required /></p>
						<p class="Question"><label>Contact <span style="color:red">*</span></label><br><input type="text" name="NGO_contact" placeholder="Enter Contact" required /></p>
						<p class="Question"><label>Upload NGO Logo <span style="color:red">*</span></label><br>
						<input id="profile" type="file" name="logo" required />
						<div class="buttoncenter">
							<p><input type="reset" value="Clear"><input type="Submit" value="Register" name="register_ngo"/></p>
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