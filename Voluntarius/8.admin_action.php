<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($conn, "webappassignment2");   
	$user= $_SESSION['admin_email'];

	
	if(! $conn ) {
       die('Could not connect: ' . mysql_error());
	}
    else{
		$query1 = "SELECT * FROM admin WHERE admin_email='".$user."'";  
		$result1= mysqli_query($conn, $query1); 
		$row = mysqli_fetch_array($result1);		
	   
		if (isset($_POST['update'])){
			
			
			$name = $_POST['adminname'];
			$hp = $_POST['hp'];                 
			$password = $_POST['password'];
		
			$query3 = "UPDATE admin SET admin_name= '$name',admin_contact_num='$hp',admin_password='$password' WHERE admin_email='".$user."'";
	   
			$result3= mysqli_query($conn,$query3);
			header("Refresh:0");
		}
			
		 if(isset($_POST["insert"]))  
		 {
			$email= $row['admin_email'];
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
			$query6 = "UPDATE admin SET admin_profile_pic = '".$imgContent. "'WHERE admin_email='".$email."'";
			$result6= mysqli_query($conn, $query6);
			header("Refresh:0");
		 }  
		
		mysqli_close($conn);   
   }

?>