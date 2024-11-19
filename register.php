<?php

include 'config.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	$profile_image = $_FILES['profile_image'];

	// validate inputs

	if(empty($username)|| empty($email) || empty($password)){
		echo json_encode(['status'=>'error', 'message'=>'All Fields are Required']);
		exit;
	}

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		 echo json_encode(['status'=>'error','message'=>'Invalid Email Format']);
		 exit;
	}

	if(strlen($password) < 8){
		echo json_encode(['status'=>'error','message'=>'Password must be at least 8 characters']);
		exit;
	}

	// Handle profile image upload

	$image_path = 'uploads/';
	$image_name = $username.'_'.time().'.jpg';
	$full_image_path = $image_path.$image_name;

	if(!move_uploaded_file($profile_image['tmp_name'], $full_image_path)){
		echo json_encode(['status'=>'error','message'=>'Faild to upload profile image']);
		exit;
	}


	//generate a random salt

	$salt = bin2hex(random_bytes(16));

	//combine salt with password
	$salted_password = $password . $salt;



	//hash password

	$password_hash = password_hash($salted_password,PASSWORD_BCRYPT);

	// INSERT DATA INTO DATABASE

	$stmt = $pdo->prepare('INSERT INTO users(username,email,password_hash,salt,profile_image) VALUES(?,?,?,?,?)');
	if($stmt->execute([$username,$email,$password_hash, $salt,$image_name])){

		echo json_encode(['status'=>'success','message'=>'Registration successful']);

	}else{

		echo json_encode(['status'=>'error','message'=>'Registration failed']);


	}




}



?>