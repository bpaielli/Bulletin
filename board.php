<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<?php session_start();

// If user is not logged in
if (!isset($_SESSION['user'])){
	header ("Location: login.php");
}
?>
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
		<div class="dropdown">
			<div id="usersname"><?php echo $_SESSION['user'];?></div>
			<div class="dropdown-content">
					<a href="assets/scripts/logout.php">Logout</a>
				</div>
		</div>
			
		</div>
		<div id="searcharea">
			<div class="mainsearch">
				<input class="searchinput" type="text" name="search" placeholder="Search">
				<select class="categories" name="categories">
					<option value="all">All Categories</option>
					<option value="babysitting">Babysitting</option>
					<option value="landscape">Landscaping</option>
					<option value="softwaredevelopment">Software Development</option>
					<option value="tutor">Tutoring</option>			
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
		<div id="newpostbutton"><button class="mainbuttons">Create Post</button></div>
		
	</div>

	<div id="Offering" class="boardcontent">
	
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I am a <span class="userinputtedfield">OCCUPATION</span> looking for people that need <span class="userinputtedfield">DESCRIPTION</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		
	</div>

	<div id="Seeking" class="boardcontent">
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		<div class="posttemplate">
			<p class="livepostcontent">My name is <span class="userinputtedfield">NAME</span>. I'm looking for a <span class="userinputtedfield">OCCUPATION</span> for help with <span class="userinputtedfield">DESCRIPTION</span> by <span class="userinputtedfield">DATE</span></p>
			<button id="contactbutton" class="USERID">Contact Now</button>	
		</div>
		
		
	</div>

	<div id="MyPosts" class="boardcontent">
		<p>My Posts</p>
	</div>

	<div id="createpostbox" class="cpbox">
		<div class="cp-content">
			<span class="close">&times;</span>


			<div id="createposttypepicker">
				<button class="pickerbutton" onclick="offeringSeekingSelection('createoffering')">Offering</button>
				or
				<button class="pickerbutton" onclick="offeringSeekingSelection('createseeking')">Seeking</button>
			</div>

			<div id="createoffering" class="createposttemplate">
				<p class="postcontentname">My name is <?php echo $_SESSION['user']; ?>. I am a...</p>
				<input class="createpostoccupation" type="text" name="createpostoccupation" placeholder="Your Occupation">
				<p class="postcontenttext">looking for people that need...</p>
				<textarea class="createpostdescription" name="createpostdescription" placeholder="Description"></textarea>
			</div>
			<div id="createseeking" class="createposttemplate">
				<p class="postcontentname">My name is <?php echo $_SESSION['user']; ?>. I'm looking for a...</p>
				<input class="createpostoccupation" type="text" name="createpostoccupation" placeholder="Occupation (Developer)">
				<p class="postcontenttext">for help with...</p>
				<textarea class="createpostdescription" name="createpostdescription" placeholder="Description"></textarea>
				<p class="postcontenttext">by... <input class="createpostduedate" type="date" name="createpostduedate"></p>
			</div>
			
			<div id="createpostoptions">
			<p>
			Category: 
				<select class="createpostcategories" name="createpostcategories">
					<option value="babysitting">Babysitting</option>
					<option value="landscape">Landscaping</option>
					<option value="softwaredevelopment">Software Development</option>
					<option value="tutor">Tutoring</option>			
				</select>
			</p>
			<button id="createpostbutton">Create Post</button>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="assets/js/geolocation.js"></script>
<script type="text/javascript" src="assets/js/tabs.js"></script>
<script type="text/javascript" src="assets/js/createpostbox.js"></script>
</html>