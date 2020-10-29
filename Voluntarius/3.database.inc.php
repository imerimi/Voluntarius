<?php
	function setConnectionInfo($values=array()){
		try{
			$connString = $values[0];
			$user = $values[1];
			$password = $values[2];
			$pdo = new PDO($connString,$user,$password);
			$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(PDOException $e){
			die ($e->getMessage());
		}
	}
	function register_NGO(){
		$database = mysqli_connect("localhost","root","","webappassignment2");
		if(isset($_POST['register_ngo'])){
			$ngo_email = $_POST['NGO_email'];
			$ngo_password = $_POST['NGO_password'];
			$ngo_name = $_POST['NGO_name'];
			$ngo_category = $_POST['category'];
			$ngo_chairman = $_POST['Chairman_name'];
			$ngo_description = $_POST['description'];
			$ngo_address = $_POST['NGO_address'];
			$ngo_contact = $_POST['NGO_contact'];
			$ngo_approval_status = 0;			
			$profile_pic = addslashes(file_get_contents($_FILES["logo"]["tmp_name"]));
			$sql = "INSERT INTO ngo(ngo_email, ngo_password, ngo_logo, ngo_name, ngo_category, ngo_chairman, ngo_description, ngo_address, ngo_approval_status, ngo_contact_number) VALUES ('$ngo_email','$ngo_password','$profile_pic','$ngo_name','$ngo_category','$ngo_chairman','$ngo_description','$ngo_address','$ngo_approval_status','$ngo_contact')";
			if (mysqli_query($database,$sql)){
				echo '<script>alert("NGO account register successfully,please wait for approval from the admin")</script>';
			}else{
				echo '<script>alert("NGO already exist")</script>';
			}
		}else{
		
		}
	}
	function register_admin(){
		$database = mysqli_connect("localhost","root","","webappassignment2");
		if(isset($_POST['register_admin'])){
			$admin_fullname = $_POST['staff_name'];
			$admin_ID = $_POST['staff_ID'];
			$admin_email = $_POST['staff_email'];
			$admin_password = $_POST['staff_password'];
			$admin_contact = $_POST['staff_contact'];
			$admin_approval_status = 0;			
			$profile_pic = addslashes(file_get_contents($_FILES["admin_profile"]["tmp_name"]));
			$sql = "INSERT INTO admin(admin_email, admin_password, admin_name, admin_id, admin_contact_num,admin_approval_status, admin_profile_pic) VALUES ('$admin_email','$admin_password','$admin_fullname','$admin_ID','$admin_contact','$admin_approval_status','$profile_pic')";
			
			if (mysqli_query($database,$sql)){
				echo '<script>alert("Admin account register successfully,please wait for approval from the admin")</script>';
			}else{
				echo '<script>alert("Admin already exist")</script>';
			}
	}}
	function register_student(){
		$database = mysqli_connect("localhost","root","","webappassignment2");
		if(isset($_POST['register_student'])){
			$student_fullname = $_POST['student_name'];
			$student_ID = $_POST['student_ID'];
			$student_email = $_POST['student_email'];
			$student_password = $_POST['student_password'];
			$student_contact = $_POST['student_contact'];
			 
			$profile_pic = addslashes(file_get_contents($_FILES["student_profile"]["tmp_name"]));
			$sql = "INSERT INTO student(student_email, student_password, student_name, student_id, student_contact_num, student_profile_pic) VALUES ('$student_email','$student_password','$student_fullname','$student_ID','$student_contact','$profile_pic')";
			
			if (mysqli_query($database,$sql)){
				echo '<script>alert("Student account register successfully")</script>';
			}else{
				echo '<script>alert("Student already exist")</script>';
			}
		}
	}
	function readSelectEvent($event_id){
		$database = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
		$sql = "SELECT * FROM event WHERE event_id LIKE ?";
		try{
			$statement = $database-> prepare($sql);
			$statement-> execute([$event_id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
		$database = null;
		return $statement;
	}
	function readEvent_ngo($event_id){
		$database = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
		$sql = "SELECT * FROM ngo WHERE ngo_email LIKE (SELECT ngo_email FROM event WHERE event_id LIKE ?)";
		try{
			$statement = $database-> prepare($sql);
			$statement-> execute([$event_id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
		$database = null;
		return $statement;
	}
	function readEvent_banner($event_id){
		$database = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
		$sql = "SELECT * FROM banner WHERE ngo_email LIKE (SELECT ngo_email FROM event WHERE event_id LIKE ?)";
		try{
			$statement = $database-> prepare($sql);
			$statement-> execute([$event_id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
		$database = null;
		return $statement;
	}
?>