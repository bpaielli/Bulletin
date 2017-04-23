<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bulletin - Register</title>
<link href="assets/style/start.css" type="text/css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300" rel="stylesheet">

</head>
<body>
	<div id="overlay">
		<div id="registercontainer">
			<p id="registerheader">Bulletin</p>
			<form id="formblock" action="assets/scripts/controller.php" method="post">
				<input type="text" name="firstname" placeholder="First Name"
					autofocus required> <input type="text" name="lastname"
					placeholder="Last Name" required> <input type="email" name="email"
					placeholder="Email" required> <input type="password"
					name="password" placeholder="Password" required>

				<p>
					<input class="mainbuttons" type="submit" name="register" value="Register"> <a class="elsetext"> or </a> <a class="orhyper" href="login.php">Login</a>
				</p>
			</form>
		</div>
	</div>
</body>
</html>