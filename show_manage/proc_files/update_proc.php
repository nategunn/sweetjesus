<?php
	session_start();
	require_once('../connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'choose')
	{
		choose($_POST);
	}
	else if(isset($_POST['action']) && $_POST['action'] == 'update')
	{
		update($_POST);
	}
	else{ //malicious navigations to process.php or user log off
		session_destroy();
		header('location: ../index.php');
		die();
	}

	function choose($post){
		$_SESSION['errors'] = array();
		if(empty($post['show']))
		{
			$_SESSION['errors'][]='You must choose a show to edit!';
			header('location: ../update.php');
			die();
		}
		else
		{
			$id = $post['show'];

			$query = "SELECT * FROM shows WHERE id = $id";
			$chosen = fetch_record($query);

			$_SESSION['chosen']=$chosen;
			header('location: ../update.php');
			die();
		}

	}

	function update($post){
		$_SESSION['errors'] = array();
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
			$display_date=escape_this_string($post['date']);
		}

		$details = ($post['details']);
		$id = ($post['id']);

		if(count($_SESSION['errors'])>0)
		{
			header('location: ../update.php');
			die();
		}
		else
		{
			$query = "UPDATE shows SET venue='$venue', details='$details', show_date='$show_date', display_date='$display_date', updated_at=NOW() WHERE id=$id";
			$updated_show = run_mysql_query($query);
			header('location: ../update.php');
			die();
		}



	}