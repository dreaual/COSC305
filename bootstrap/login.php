<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "UTF-8">
		<title> RentMe </title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="style.css">
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container fill">
			<div id="wrapper">
				<div id="content" sytle="margin: 15px">

		<?php
		session_start();
		if(isset($_SESSION['ID'])){
			echo 'You are already logged in!';
		}
		else{
			if(!empty($_GET)){
				echo 'Login failed!';
			}
			#login
			echo '<form class="form-horizontal well" id="login" action="verify.php" method="post">'; #need to code verify.php to verify user
			echo '<div class="row">';
			echo '<div class="span6"';
			echo '<label>Username</label>';
			echo '<input type="text" class="span3" name="id"/></br>';
			echo '<label>Password</label>';
			echo '<input type="password" class="span3" name="pass" placeholder="Enter your password here"/></br>';
			echo '<button id="button" class="btn btn-primary">Submit</button>';
			echo '<button class="btn">Clear</button>';
			echo '</div>';

			#sign up
			echo '<div class="span3"';
			echo '<form class="form-inline" id="login" action="verify.php" method="post">';
			echo '<label>Email</label>';
			echo '<input type="text" class="span3" name="id"/></br>';
			echo '<label>Username</label>';
			echo '<input type="text" class="span3" name="id"/></br>';
			echo '<label>Password</label>';
			echo '<input type="password" class="span3" name="pass" placeholder="Enter your password here"/></br>';
			echo '<label>Re-enter password</label>';
			echo '<input type="password" class="span3" name="pass" placeholder="Re-enter password here"/></br>';
			echo '<label>D.O.B</label>';
			echo '<button id="button" class="btn btn-primary">Submit</button>';
			echo '<button class="btn">Clear</button>';
			echo '</div></div>';

			echo '</form>';
			echo '<div id="canvasHolder"></div>';
		}
		?>


	</div> <!--content-->
	</div> <!--wrapper-->
	</div> <!--container-->
	</body>
</html>

