<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($conn, "webappassignment2");   
	$user= $_SESSION['ngo_email'];

	
	if(! $conn ) {
       die('Could not connect: ' . mysql_error());
	}
    else{
		$query1 = "SELECT * FROM ngo WHERE ngo_email='".$user."'";  
		$result1 = mysqli_query($conn, $query1); 
		$row = mysqli_fetch_array($result1);
		
		$query2 = "SELECT * FROM event WHERE ngo_email='".$user."'";  
		$result2= mysqli_query($conn, $query2); 

	   
		if (isset($_POST['update'])){
			
			
			$name = $_POST['ngoname'];
			$desc = $_POST['desc'];
			$cat = $_POST['category'];
			$chairman = $_POST['chairman'];
			$email = $_POST['email'];                     
			$address = $_POST['address'];
			$password = $_POST['password'];
		
			$query3 = "UPDATE ngo SET ngo_name= '$name',ngo_description='$desc',
			ngo_category='$cat',ngo_chairman='$chairman',
			ngo_address='$address',ngo_password='$password' WHERE ngo_email='".$user."'";
	   
			mysqli_query($conn,$query3);
			header("Refresh:0");
		}
		
		
		 if(isset($_POST["insert"]))  
		 {
			$email= $row['ngo_email'];
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
			$query6 = "UPDATE ngo SET ngo_logo = '".$imgContent. "'WHERE ngo_email='".$email."'";
			$result6= mysqli_query($conn, $query6);
			header("Refresh:0");

		 }  
		 
		 
		if(isset($_POST["action"])){
			echo $_POST['id'];
			$delete= $_POST['id'];
			$query4 = "DELETE FROM participation WHERE event_id='".$delete."'";
			$query5 = "DELETE FROM event WHERE event_id='".$delete."'";
			$result4= mysqli_query($conn,$query4);
			$result5= mysqli_query($conn,$query5);
			header("Refresh:0");
		}
		
		mysqli_close($conn);   
   }

?>