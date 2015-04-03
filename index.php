<?php  

	session_start();

	include('new-connection.php');


	// var_dump($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email validation with DB</title>
	<style>
		body
		{
			margin-top: 4em;
		}
		h1
		{
			text-align: center;
		}
		form input
		{
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 1em;
		}
<?php
	if (!empty($_SESSION['errors']))
	{
		echo 	'#wrong
				{
					width: 40em;
					margin-left: auto;
					margin-right: auto;
					background-color: red;
					padding: .5em .5em;
					border: 2px solid black;
				}';
	}
?>
	</style>
</head>
<body>
<?php  
	if (!empty($_SESSION['errors']))
	{
		echo 	'<div id="wrong">
					<h2>' . $_SESSION['errors'] . '</h2>
				</div>';
	}
?>
	<form action="process.php" method="post">
		<label for="email"><h1>Please enter your email address</h1></label>
		<input type="text" name="email">
		<input type="submit" value="Submit">
	</form>
</body>
</html>