<?php 
	include("8.admin_action.php");
?>


<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Voluntarius - To be the Sun, to warm the world. </title>
   <link rel="stylesheet" href="reset.css"/>
   <link rel="stylesheet" href="admin_profile.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for font awesome-->
</head>
<body>
      <header>
            <img id="logo" src="volun.png" alt="Voluntarius" title="Voluntarius">
         </header>
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
		<main>
         <div class="logo-container">
            <div class="logo"> 	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['admin_profile_pic'] ).'" />' ?> </div>
            <form method="post" enctype="multipart/form-data" class="upload-button">  
				   <input type="file" name="image" required />
					<input type="submit" name="insert" value="UPLOAD"/>
             </form>  
			<div class="id">
			<h1>Email:<?php echo $row['admin_email']?></h1>
			</div>
		 </div>
		 
		  <form action=" " method="post">
         <div class=form>
            
               <fieldset>
                  <legend>Admin Profile</legend>
                     <p>Name:
                        <input type="text" name="adminname" value="<?php echo $row['admin_name']?>">
                     </p>
                     <br>
                     <p>Contact number:
                        <input type="tel" name="hp" value="<?php echo $row['admin_contact_num']?>">
                     </p>
                     <br>
                     <p>Password      :
                        <input type="password" name="password" value="<?php echo $row['admin_password']?>3">
                     </p>
                     <br>
                     <br>
                     <div class="center"><button class="btn" onclick="window.location='8.admin_approval_main.php'" type="button">Back</button>
                        <input class="btn" name="update" type="submit" value="Modify">
                     </div>
               </fieldset>
           
         </div>	
		  </form>
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
   </body>
</html>