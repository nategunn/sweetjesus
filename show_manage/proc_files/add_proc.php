<?php
	session_start();
		require_once('../connection.php');

		if(isset($_POST['action']) && $_POST['action'] == 'add'){
			add($_POST);

		}else{ //malicious navigations to process.php or user log off
			session_destroy();
			header('location: ../index.php');
			die();
		}

	function add($post){
		$_SESSION['add_errors'] = array();
		if(empty($post['venue']))
		{
			$_SESSION['errors'][]='Venue cannot be blank';
		}
		else
		{
			$venue=escape_this_string($post['venue']);
		}

		if(empty($post['date']))
		{
			$_SESSION['errors'][]='A date must be chosen';
		}
		else
		{
			$show_date=($post['date']).' 23:59:59';
		}

		$display_date=($post['date']);
		$details=($post['details']);

		if(count($_SESSION['errors'])>0)
		{
			header('location: ../add.php');
			die();
		}
		else
		{
			$query = "INSERT INTO shows(venue,details,display_date,show_date,created_at,updated_at)
					  VALUES('$venue','$details','$display_date','$show_date',NOW(),NOW())";
			$new_show = run_mysql_query($query);
			header('location: ../add.php');
			die();
		}

	}