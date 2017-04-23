<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bulletin - Board</title>
<link href="assets/style/main.css" type="text/css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300" rel="stylesheet">
</head>
<body>
	<div id="head">
		<div class="logo">
			<h1 class="textlogo">Bulletin</h1>
		</div>
		<div class="headright">
			<div id="usersname">Austin</div>
			
		</div>
		<div id="searcharea">
			<div class="mainsearch">
				<input class="searchinput" type="text" name="search" placeholder="Search">
				<select class="categories" name="categories">
					<option value="all">All Categories</option>
					<option value="tutor">Tutoring</option>
					<option value="landscape">Landscaping</option>
					<option value="babysitter">Babysitter</option>
				</select>
				<button id="searchbutton">Search</button>
			</div>
			<div id="location"></div>
		</div>
	</div>

	<div class="tab">
		<button id="home" class="sectionl" onclick="openPage('Offering')">Offering</button>
		<button class="sectionl" onclick="openPage('Seeking')">Seeking</button>
		<button class="sectionl" onclick="openPage('MyPosts')">My Posts</button>
		<div id="newpostbutton"><button class="mainbuttons" name="newpostbutton">Create Post</button></div>
	</div>

	<div id="Offering" class="boardcontent">
		<p>Offering</p>
	</div>

	<div id="Seeking" class="boardcontent">
		<p>Seeking</p>
	</div>

	<div id="MyPosts" class="boardcontent">
		<p>My Posts</p>
	</div>
</body>
<script type="text/javascript" src="assets/js/geolocation.js"></script>
<script type="text/javascript" src="assets/js/tabs.js"></script>
</html>