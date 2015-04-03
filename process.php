<?php  

	session_start();

	include('new-connection.php');

	$_SESSION['errors'] = array();
	$_SESSION['success'] = array();

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['success'] = 'The email address you entered ( ' . $_POST['email'] . ' ) is a VALID email address! Thank you!';
		// header('location: success.php');
		// die();
	}
	else
	{
		$_SESSION['errors'] = 'The email address you entered ( ' . $_POST['email'] . ' ) is NOT a valid email address!';
		header('location: index.php');
		die();
	}

	$esc_email = escape_this_string($_POST['email']);
	$query = "INSERT INTO users (email_address, created_at, updated_at)
				VALUES('{$esc_email}', NOW(), NOW())";
	//for some reason this adds two rows to my DB, and I'm not quite sure why that is...
	run_mysql_query($query);
	if(run_mysql_query($query))
	{
		header('location: success.php');
		die();	
	}
	else
	{
		$_SESSION['errors'] = 'Sorry I could not process this info currently. Try back when I become a better programmer :)';
		header('location: index.php');
		die();
	}

?>