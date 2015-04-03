<?php 

	session_start();

	include('new-connection.php');

	$query = "SELECT * FROM users";
	$result = fetch_all($query);

	if(!empty($_POST['delete']))
	{
		$delete = "DELETE FROM users
				WHERE id = {$_POST['delete']}";
		run_mysql_query($delete);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUCCESS!!!!</title>
	<style>
		#success
		{
			margin-left: auto;
			margin-right: auto;
			width: 40em;
			padding: .5em .5em;
			background-color: green;
			border: 2px solid black;
		}
		#emails
		{
			margin-left: auto;
			margin-right: auto;
			width: 40em;
		}
		.underlined
		{
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div id='success'>
		<h2>
<?php
	echo $_SESSION['success'];
?>
		</h2>
	</div>
	<div id='emails'>
		<h1 class='underlined'>Email Addresses Entered:</h1>
		<form action="success.php" method="post">
		<?php  
			foreach ($result as $value)
			{
				$id = $value['id'];
				echo $id." ".$value['email_address']." - ".$value['created_at']."<br>";
			} 
			echo '<p>Enter the number associated with the email that you want to delete (one at a time, please!)</p><input type="text" name="delete">';
			echo '<input type="submit" value="PURGE!" />';
		?>
		</form>
	</div>
</body>
</html>