<!-- Programmers: Austin Mutschler & Brittany Paielli -->

<?php

session_start ();

// If user is logged in
if (isset ( $_SESSION ['user'] )) {
	header ( "Location: board.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bulletin - Login</title>
<link href="assets/style/start.css" type="text/css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300"
	rel="stylesheet">
</head>
<body>
	<div id="overlay">
		<div id="logincontainer">
			<p id="loginheader">Bulletin</p>
			
			<form action="assets/scripts/controller.php" method="post">
				<div id="formblock">
					<input type="email" name="email" placeholder="Email" autofocus
						required> <input type="password" name="password"
						placeholder="Password" required>
					<div id="loginErrMessage"><?php 
					
					if(isset($_GET['error']) && ($_GET['error'] == 'badCreds')){
						echo "Incorrect Email or Password";
					}
					?></div>
					<p>
						<input class="mainbuttons" type="submit" name="login"
							value="Login"> <a class="elsetext"> or </a> <a class="orhyper"
							href="register.php">Register</a>
					</p>
				</div>
			</form>

		</div>

	</div>

	<script type="text/javascript" src="assets/js/errorMessage.js"></script>
</body>
</html>

