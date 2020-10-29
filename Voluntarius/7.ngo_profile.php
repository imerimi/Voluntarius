<?php 
	include("7.ngo_action.php");
?>



<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>NGO Profile</title>
      <link rel="stylesheet" href="reset.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="ngo_profile.css" />
   </head>
   <body>
   
      <header>
         <img id="logo" src="volun.png" alt="Voluntarius" title="Voluntarius">
         <p id="slogan"><em>To be the <i class="fa fa-sun-o slow-spin sun-icon" title="Sun"></i> , to warm the <i class="fa fa-globe slow-spin2 earth-icon" title="World"></i></em></p>
      </header>
	  
      <ul>
         <li><a href="5.login.php"><strong> Logout </strong></a></li>    <!-----CONNECT---->
         <li><a href="7.dashboard_ngo.php"><strong> Dashboard</strong></a></li>    <!-----CONNECT---->
         <li><a href="7.createVolunteerPage.php"><strong> Upload Event </strong></a></li>   <!-----CONNECT---->
      </ul>
	  
	  
      <main>
         <div class="logo-container">
            <div class="logo"> 	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['ngo_logo'] ).'" />' ?> </div>
            <form method="post" enctype="multipart/form-data" class="upload-button">  
				   <input type="file" name="image" required />
					<input type="submit" name="insert" value="UPLOAD"/>
             </form>  
			<div class="id">
			<h1>Email:<?php echo $row['ngo_email']?></h1>
			</div>
		 </div>
		 
		 <form action=" " method="post">
         <div class=form>

               <fieldset>
                  <legend>NGO Profile</legend>
                     <p>NGO Name:
                        <input type="text" id="ngoname" name="ngoname" value="<?php echo $row['ngo_name']?>">
                     </p>
                     <br>
                     <p>NGO Description:<br>
                        <textarea rows="4" name="desc"><?php echo $row['ngo_description'] ?></textarea>
                     </p>
                     <br>
                     <p>
                        Category:
                        <select name= "category">
							<option value="Wildlife Conservation Organization" <?php if($row['ngo_category']=="Wildlife Conservation Organization"){echo 'selected';}?>>Wildlife Conservation Organization</option>
							<option value="Pet and Animal Welfare Organization" <?php if($row['ngo_category']=="Pet and Animal Welfare Organization"){echo 'selected';}?>>Pet and Animal Welfare Organization</option>
							<option value="Hunting & Fishing Conservation Groups" <?php if($row['ngo_category']=="Hunting & Fishing Conservation Groups"){echo 'selected';}?>> Hunting & Fishing Conservation Groups</option>
							<option value="Zoos and Aquariums" <?php if($row['ngo_category']=="Zoos and Aquariums"){echo 'selected';}?>>Zoos and Aquariums</option>
							<option value="Environmental Conservation & Protection" <?php if($row['ngo_category']=="Environmental Conservation & Protection"){echo 'selected';}?>>Environmental Conservation & Protection</option>
							<option value="Parks and Nature Centers" <?php if($row['ngo_category']=="Parks and Nature Centers"){echo 'selected';}?>> Parks and Nature Centers</option>
							<option value="International Development NGOs" <?php if($row['ngo_category']=="International Development NGOs"){echo 'selected';}?>>International Development NGOs</option>
							<option value="Disaster Relief & Humanitarian NGOs" <?php if($row['ngo_category']=="Disaster Relief & Humanitarian NGOs"){echo 'selected';}?>>Disaster Relief & Humanitarian NGOs</option>
							<option value="Peace & Human Rights NGOs" <?php if($row['ngo_category']=="Peace & Human Rights NGOs"){echo 'selected';}?>>Peace & Human Rights NGOs</option>						
							<option value="Conservation NGOs" <?php if($row['ngo_category']=="Conservation NGOs"){echo 'selected';}?>>Conservation NGOs</option>
							<option value="Disease & Disorder Charities" <?php if($row['ngo_category']=="Disease & Disorder Charities"){echo 'selected';}?>>Disease & Disorder Charities</option>
							<option value="Medical Services & Treatment" <?php if($row['ngo_category']=="Medical Services & Treatment"){echo 'selected';}?>> Medical Services & Treatment</option>						
							<option value="Medical Research Charities" <?php if($row['ngo_category']=="Medical Research Charities"){echo 'selected';}?>>Medical Research Charities</option>
							<option value="Patient and Family Support Charities" <?php if($row['ngo_category']=="Patient and Family Support Charities"){echo 'selected';}?>>Patient and Family Support Charities</option>
							<option value="Private Elementary, JR High and High Schools" <?php if($row['ngo_category']=="Private Elementary, JR High and High Schools"){echo 'selected';}?>> Private Elementary, JR High and High Schools</option>						
							<option value=">Universities and Colleges" <?php if($row['ngo_category']==">Universities and Colleges"){echo 'selected';}?>>>Universities and Colleges</option>
							<option value="Scholarship and financial aid services" <?php if($row['ngo_category']=="Scholarship and financial aid services"){echo 'selected';}?>>Scholarship and financial aid services</option>
							<option value="School Reform and Experimental Education" <?php if($row['ngo_category']=="School Reform and Experimental Education"){echo 'selected';}?>> School Reform and Experimental Education</option>					
							<option value="Support for students, teachers & parents" <?php if($row['ngo_category']=="Support for students, teachers & parents"){echo 'selected';}?>>Support for students, teachers & parents</option>
							<option value="Museums & Art Galleries" <?php if($row['ngo_category']=="Museums & Art Galleries"){echo 'selected';}?>>Museums & Art Galleries</option>
							<option value="Performing Arts" <?php if($row['ngo_category']=="Performing Arts"){echo 'selected';}?>>Performing Arts</option>							
							<option value="Libraries & Historical Societies" <?php if($row['ngo_category']=="Libraries & Historical Societies"){echo 'selected';}?>>Libraries & Historical Societies</option>
							<option value="Public Broadcasting and Media" <?php if($row['ngo_category']=="Public Broadcasting and Media"){echo 'selected';}?>>Public Broadcasting and Media</option>
							<option value="Poverty Alleviation" <?php if($row['ngo_category']=="Poverty Alleviation"){echo 'selected';}?>> Poverty Alleviation</option>
							<option value="Others" <?php if($row['ngo_category']=="Others"){echo 'selected';}?>> Others </option>
                        </select>
                     </p>
                     <br>
                     <p>Chairman      :
                        <input type="text" name="chairman" value="<?php echo $row['ngo_chairman']?>">
                     </p>
                     <br>
                     <br>
                     <p>NGO Address:<br>
                        <textarea rows="4"   name="address" ><?php echo $row['ngo_address'] ?></textarea>
                     </p>
                     <br>
                     <p>Password      :
                        <input type="password" name="password" value="<?php echo $row['ngo_password'] ?>">
                     </p>
                     <br>
                     <br>
                     <div class="center"><button class="btn" onclick="window.location='7.dashboard_ngo.php'" type="button">Back</button>
                       <input class="btn" name="update" type="submit" value="Modify">
                     </div>
               </fieldset>
            
         </div>
		 </form>
		 
         <div class="event-list-table-box">
            
            <table>
				<div class="title">Event Held by <?php echo $row['ngo_name']  ?></div>
               <tr>
                  <th>No.</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Location</th>
				  <th>Date</th>
				  <th>Pax</th>
				  <th>Action</th>
				   
               </tr>
			   <?php
			   $x= 1;
			   while($row1 = mysqli_fetch_array($result2))  
				{  
					 echo   
						  "<tr>  
							   <td>".$x."</td>  
								<td> ".$row1['event_id']." </td>
								<td>".$row1['event_title']. "</td>  
								<td>".$row1['event_location']."</td>  
								<td>".$row1['event_start_datetime']."<br>to<br>".$row1['event_end_datetime']."</td>  
								<td>".$row1['event_max_volunteer']."</td> ";    
					 $x++;
				  
				?> 
					<form method='post' onsubmit='return confirm('Delete?')'>
						<td>
						<input class='fa fa-close close-icon' type="submit" name="action" value='Delete'></td>
						<input type='hidden' name="id" value="<?php echo $row1["event_id"]; ?>"></td>
					</form></tr>
				<?php
				} 
				?>
            </table>
         </div>
		 
      </main>	  
       <footer>
		<div class="footer-block">
		  <div class="footer_option">
			<a href="0.about_us.php" ><strong> About Us </strong></a>
			<a href="0.tnc.php" ><strong> Terms and Conditions </strong></a>  <!-----CONNECT---->
		  </div>
		  <div class="footer-social-media">
		    <strong> Connect with Us: </strong>
            <a href="https://www.facebook.com"><i class="fa fa-facebook big"></i></a>
				<a href="https://www.instagram.com/"><i class="fa fa-instagram big"></i></a>
				<a href="https://twitter.com/?lang=en"><i class="fa fa-twitter big"></i></a> <!----------DUMMY ??--------->
          </div>
		 </div>
		  <div class="footer-copyright">
			<p id="copyright"><em>Copyright &copy; 2019 Voluntarius. All Rights Reserved. </em></p>
		  </div>
      </footer>
   </body>
</html>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  