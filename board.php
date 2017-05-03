<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<?php
session_start ();
include 'assets/scripts/model.php';
$accountDatabaseAdapter = new accountDatabaseAdapter ();

// If user is not logged in
if (! isset ( $_SESSION ['user'] )) {
	header ( "Location: login.php" );
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
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300"
	rel="stylesheet">
</head>
<body>
	<div id="head">
		<div class="logo">
			<h1 class="textlogo">Bulletin</h1>
		</div>
		<div class="headright">
			<div class="dropdown">
				<div id="usersname">Hello, <?php echo $_SESSION['user'];?></div>
				<div class="dropdown-content">
					<a href="assets/scripts/logout.php">Logout</a>
				</div>
			</div>

		</div>
		<div id="searcharea">
			<div class="mainsearch">
				<input class="searchinput" type="text" name="search"
					placeholder="Search"> <select class="categories" name="categories">
					<option value="all">All Categories</option>
					<option value="automotive">Automotive</option>
					<option value="beauty">Beauty</option>
					<option value="babysitting">Babysitting</option>
					<option value="cell-mobile">Cell/Mobile</option>
					<option value="computer">Computer</option>
					<option value="creative">Creative</option>
					<option value="event">Event</option>
					<option value="education">Education</option>
					<option value="farm-garden">Farm/Garden</option>
					<option value="financial">Financial</option>
					<option value="career">Career/Job</option>
					<option value="household">Household</option>
					<option value="landscape">Landscaping</option>
					<option value="labor-move">Labor/Move</option>
					<option value="legal">Legal</option>
					<option value="marketing">Marketing</option>
					<option value="medical">Medical/Health</option>
					<option value="pet">Pet</option>
					<option value="real estate">Real Estate</option>
					<option value="skilled trade">Skilled Trade</option>
					<option value="sm biz ads">Small Biz Ads</option>
					<option value="softwaredevelopment">Software Development</option>
					<option value="therapeutic">Therapeutic</option>
					<option value="travel">Travel</option>
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

		<div id="newpostbutton">
			<button class="mainbuttons">Create Post</button>
		</div>
	</div>


	<div id="Offering" class="boardcontent">
	<?php
	$arr = $accountDatabaseAdapter->getAllOfferingPosts ();
	$result = '';
	
	foreach ( array_reverse ( $arr ) as $item ) {
		
		$result = '<div class="offeringposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am a <span class="userinputtedfield">' . $item ['category'] . '</span> looking for people that need <span class="userinputtedfield">' . $item ['body_description'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br></button></div>';
		
		echo $result;
	}
	?>
	</div>

	<div id="Seeking" class="boardcontent">
	<?php
	$arr = $accountDatabaseAdapter->getAllSeekingPosts ();
	$result = '';
	
	foreach ( array_reverse ( $arr ) as $item ) {
		$result = '<div class="seekingposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am looking for a <span class="userinputtedfield">' . $item ['category'] . '</span> for help with <span class="userinputtedfield">' . $item ['body_description'] . '</span> by <span class="userinputtedfield"><br>' . $item ['due_date'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br>' . '</button></div>';
		echo $result;
	}
	?>
	</div>

	<div id="MyPosts" class="boardcontent">
	<?php
	$arr = $accountDatabaseAdapter->getAllPersonalPosts ( $_SESSION ['user_email'] );
	$result = '';
	
	if (sizeof ( $arr ) == 0) {
		echo "You currently have no active posts.";
	}
	
	foreach ( array_reverse ( $arr ) as $item ) {
		if ($item ['type'] === 'seeking') {
			$result = '<div class="myposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am looking for a <span class="userinputtedfield">' . $item ['category'] . '</span> for help with <span class="userinputtedfield">' . $item ['body_description'] . '</span> by <span class="userinputtedfield"><br>' . $item ['due_date'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br></button></div>';
		} else {
			$result = '<div class="myposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am a <span class="userinputtedfield">' . $item ['category'] . '</span> looking for people that need <span class="userinputtedfield">' . $item ['body_description'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br></button></div>';
		}
		echo $result;
	}
	?>
	</div>

	<div id="createpostbox" class="cpbox">
		<div class="cp-content">
			<span class="close">&times;</span>


			<div id="createposttypepicker">
				<button class="pickerbutton"
					onclick="offeringSeekingSelection('createoffering')">Offering</button>
				or
				<button class="pickerbutton"
					onclick="offeringSeekingSelection('createseeking')">Seeking</button>
			</div>

			<form id="formOffering" action="assets/scripts/controller.php"
				method="post">
				<input type="hidden" name="form" value="formOffering" />
				<div id="createoffering" class="createposttemplate">
					<p class="postcontentname">My name is <?php echo $_SESSION['user']; ?>. I am a...</p>
					<input id="createpostoccupationoffering" type="text"
						name="createpostoccupationoffering" placeholder="Your Occupation"
						required>
					<p class="postcontenttext">looking for people that need...</p>
					<textarea id="createpostdescriptionoffering"
						name="createpostdescriptionoffering" placeholder="Description"
						required></textarea>


					<div id="createpostoptions">
						<p>
							Category: <select id="createpostcategories"
								name="createpostcategories">
								<option value="automotive">Automotive</option>
								<option value="beauty">Beauty</option>
								<option value="babysitting">Babysitting</option>
								<option value="cell-mobile">Cell/Mobile</option>
								<option value="computer">Computer</option>
								<option value="creative">Creative</option>
								<option value="event">Event</option>
								<option value="education">Education</option>
								<option value="farm-garden">Farm/Garden</option>
								<option value="financial">Financial</option>
								<option value="career">Career/Job</option>
								<option value="household">Household</option>
								<option value="landscape">Landscaping</option>
								<option value="labor-move">Labor/Move</option>
								<option value="legal">Legal</option>
								<option value="marketing">Marketing</option>
								<option value="medical">Medical/Health</option>
								<option value="pet">Pet</option>
								<option value="real estate">Real Estate</option>
								<option value="skilled trade">Skilled Trade</option>
								<option value="sm biz ads">Small Biz Ads</option>
								<option value="softwaredevelopment">Software Development</option>
								<option value="therapeutic">Therapeutic</option>
								<option value="travel">Travel</option>
							</select>
						</p>
						<button id="createpostbutton">Create Post</button>
					</div>
				</div>
			</form>

			<form id="formSeeking" action="assets/scripts/controller.php"
				method="post">

				<input type="hidden" name="form" value="formSeeking" />

				<div id="createseeking" class="createposttemplate">
					<p class="postcontentname">My name is <?php echo $_SESSION['user']; ?>. I'm looking for a...</p>
					<input id="createpostoccupationseeking" type="text"
						name="createpostoccupationseeking"
						placeholder="Occupation (Developer)" required>
					<p class="postcontenttext">for help with...</p>
					<textarea id="createpostdescriptionseeking"
						name="createpostdescriptionseeking" placeholder="Description"
						required></textarea>
					<p class="postcontenttext">
						by... <input id="createpostduedate" type="date"
							name="createpostduedate" required>
					</p>

					<p>
						Category: <select id="createpostcategories2"
							name="createpostcategories2">
							<option value="automotive">Automotive</option>
								<option value="beauty">Beauty</option>
								<option value="babysitting">Babysitting</option>
								<option value="cell-mobile">Cell/Mobile</option>
								<option value="computer">Computer</option>
								<option value="creative">Creative</option>
								<option value="event">Event</option>
								<option value="education">Education</option>
								<option value="farm-garden">Farm/Garden</option>
								<option value="financial">Financial</option>
								<option value="career">Career/Job</option>
								<option value="household">Household</option>
								<option value="landscape">Landscaping</option>
								<option value="labor-move">Labor/Move</option>
								<option value="legal">Legal</option>
								<option value="marketing">Marketing</option>
								<option value="medical">Medical/Health</option>
								<option value="pet">Pet</option>
								<option value="real estate">Real Estate</option>
								<option value="skilled trade">Skilled Trade</option>
								<option value="sm biz ads">Small Biz Ads</option>
								<option value="softwaredevelopment">Software Development</option>
								<option value="therapeutic">Therapeutic</option>
								<option value="travel">Travel</option>
						</select>
					</p>

					<div id="buttonCreate">
						<button id="createpostbutton2">Create Post</button>
					</div>

				</div>
			</form>

		</div>
	</div>
</body>


<script type="text/javascript" src="assets/js/geolocation.js"></script>
<script type="text/javascript" src="assets/js/tabs.js"></script>
<script type="text/javascript" src="assets/js/createpostbox.js"></script>
</html>