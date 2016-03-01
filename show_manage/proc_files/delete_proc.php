<?php
	session_start();
	require_once('../connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'delete'){
		delete($_POST);

	}else{ //malicious navigations to process.php or user log off
		session_destroy();
		header('location: ../index.php');
		die();
	}

	function delete($post){

		if(!empty($post['options']))
		{
			$shows = implode("','",$post['options']);
			$sql = "DELETE FROM shows WHERE shows.id in ('$shows')";
			$removed=run_mysql_query($sql);
			header('location: ../delete.php');
			die();
		}
		else
		{
			$_SESSION['errors'][]="You did not choose any shows to be deleted";
			header('location: ../delete.php');
			die();
		}
	}