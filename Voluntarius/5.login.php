<?php 
	
	include("5.checklogin.php");
 ?>

<!DOCTYPE html>
<html lang="en">
   <head lang="en">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Voluntarius - To be the Sun, to warm the world. </title>
      <link rel="stylesheet" href="reset.css"/>
      <link rel="stylesheet" type="text/css" href="login.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="5.login.js"></script>
   </head>
   <body>
      <header>
         <img id="logo" src="volun.png" alt="Voluntarius" title="Voluntarius">
         <p id="slogan"><em>To be the <i class="fa fa-sun-o slow-spin sun-icon" title="Sun"></i> , to warm the <i class="fa fa-globe slow-spin2 earth-icon" title="World"></i></em></p>
      </header>
      <ul>
         <li><a href="6.Student_Reg.php"><strong> Sign Up for Free </strong></a></li>    
      </ul>
      <main>
         <div class="main">
            <p class="greet"><strong> Hello!</strong></p>
			<form method="post" id="mainForm">
            <div class="container">
               <br>
			      <p>
                        Log in as?<br> 
                        <select name= "category">
                           <option value="3">Student</option>
                           <option value="2">NGO</option>
                           <option value="1">Admin</option>
                        </select>
                     </p><br>
               <p><i class="fa fa-user icon"></i>
                  <input type="text" placeholder="Email" id="id" name="id" class="required">
               </p>
               <p><i class="fa fa-lock icon"></i>
                  <input type="password" placeholder="Password" id="password" name="password" class="required">
               </p>
               <p><input value="LOGIN" name="submit" class="button" type="submit"></p>
               <p><button type="button" onclick="window.location='1.dashboard_visitor.php'" class="button">Proceed as Visitor</button></p>
			   
			   
               <span><?php echo $error ?></span>
            </div>
			</form>
         </div>
      </main>
   <footer>
		<div class="footer-block">
		  <div class="footer_option">
			<a href="0.about_us.php" ><strong> About Us </strong></a>   
			<a href="0.tnc.php" ><strong> Terms&nbsp;and&nbsp;Conditions </strong></a>  
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