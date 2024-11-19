<?php

include 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD']==='POST'){
	$email = trim($_POST['email']);
	$password = $_POST['password'];

	// validate inputs

	if(empty($email)|| empty($password)){
		echo json_encode(['status'=>'error','message'=>'All Fields are Required']);
		exit;
	}

	// Retrieve user

	$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
	$stmt->execute([$email]);
	$user = $stmt->fetch();

	if($user){
		// combine salt with entered password

		$salted_password = $password . $user['salt'];

		// verify the hashed password

		if(password_verify($salted_password, $user['password_hash'])){
			  // set session data

			$_SESSION['user'] = [
				'id'=>$user['id'],
				'username'=>$user['username'],
				'email'=>$user['email'],
				'profile_image'=>$user['profile_image']

			];


			// redirect to home page

			echo json_encode(['status'=>'success','redirect'=>'home.php']);

		}else{

			echo json_encode(['status'=>'error','message'=>'Invalid email or password']);
		}

	}else{

		echo json_encode(['status'=>'error','message'=>'User not found']);

	}
}










?>