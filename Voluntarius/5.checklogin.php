<?php
session_start();
$error=''; 
if(isset($_POST['submit'])){
	if(empty($_POST['id']) || empty($_POST['password'])){
		$error = "Username / Password is Invalid";
	}
	else{
		
		$id=$_POST['id'];
		$pass=$_POST['password'];
		$who=$_POST['category'];
		$conn = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($conn, "webappassignment2");

		if ( $who== "2") {
			$query = mysqli_query($conn, "SELECT * FROM ngo WHERE ngo_email='$id' AND ngo_password='$pass' AND ngo_approval_status=1");
			$query1 = mysqli_query($conn, "SELECT * FROM ngo WHERE ngo_email='$id' AND ngo_password='$pass' AND ngo_approval_status=0");
			
			$rows = mysqli_num_rows($query);
			$rows1 = mysqli_num_rows($query1);
			if($rows == 1){
				$_SESSION['ngo_email']= $_POST['id'];
				header("Location: 7.dashboard_ngo.php"); 
			}
			else if($rows1 == 1){
				$error = "'$id' have not been approved yet";
			}
			else{
				$error = "Username / Password is Invalid";
			}

			

		}
		else if( $who== "1"){
			$query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$id' AND admin_password='$pass' AND admin_approval_status=1");
			$query1 = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$id' AND admin_password='$pass' AND admin_approval_status=0");
			
			$rows = mysqli_num_rows($query);
			$rows1 = mysqli_num_rows($query1);
			if($rows == 1){
				$_SESSION['admin_email']= $_POST['id'];
				header("Location: 8.admin_approval_main.php"); 
			}
			else if($rows1 == 1){
				$error = "'$id' have not been approved yet";
			}
			else{
				$error = "Username / Password is Invalid";
			}	
		}
		else{
			$query = mysqli_query($conn, "SELECT * FROM student WHERE student_email='$id' AND student_password='$pass'");
			$rows = mysqli_num_rows($query);
			if($rows == 1){
			$_SESSION['student_email']= $_POST['id'];
			header("Location: 9.dashboard_student.php"); // Need to be changed
			}
			else{
				$error = "Username / Password is Invalid";
			}
		}
		mysqli_close($conn); 
	}
}
 
?>