<?php
	session_start();
	require_once('../connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'login'){
		login_user($_POST);

	}else{ //malicious navigations to process.php or user log off
		session_destroy();
		header('location: ../index.php');
		die();
	}


	function login_user($post){
		$_SESSION['errors'] = array();
		$username=escape_this_string($post['username']);
		$password=escape_this_string($post['password']);
		$user_query="SELECT * FROM users WHERE users.username = '{$username}'";
		$user=fetch_record($user_query);

		if (!empty($user)){


			if($user['password']==$password){
				//success
				$_SESSION['user']=$user['username'];
				$_SESSION['logged_in']=TRUE;
				header('location: ../add.php');
			
			}else{
				//invalid password
				$_SESSION['errors'][]="you have entered an invalid password";
				header('location: ../index.php');
				die();
			}

		}else{
			//invalid email
			$_SESSION['errors'][]="your username is invalid";
			header('location: ../index.php');
			die();
		}
	} 
?>