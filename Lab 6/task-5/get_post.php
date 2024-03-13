<!DOCTYPE html>
 <html>
	<head>
		<title>Lab06 - Task 5</title>
	</head>
 <body>

		<?php

			if ($_SERVER['REQUEST_METHOD'] == 'GET')
			{
				if (isset($_GET['name']) && $_GET['email'] );
				{
					print_r($_GET);
				}
			}


			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if (isset($_POST['name']) && $_POST['email'] );
				{
					print_r($_POST);
				}
			}




		?>	
	

	<h1>Get Form</h1>
	<form method="GET" action="get_post.php">
		<div>
			<label>Name</label><br>
			<input type="text" name="name">
		</div>
		<div>
			<label>Email</label><br>
			<input type="text" name="email">
		</div>	
		<input type="submit" value="Submit">
	</form>

	<h1>Post Form</h1>
	<form method="POST" action="get_post.php">
		<div>
			<label>Name</label><br>
			<input type="text" name="name">
		</div>
		<div>
			<label>Email</label><br>
			<input type="text" name="email">
		</div>	
		<input type="submit" value="Submit">
	</form>

 </body>
 </html> 
