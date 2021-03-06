<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<?php
session_start ();
include 'model.php';
$accountDatabaseAdapter = new accountDatabaseAdapter ();

$_POST ['form'] = '';

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
<link href="../style/main.css" type="text/css" rel="stylesheet">
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
					<a href="logout.php">Logout</a>
				</div>
			</div>

		</div>

		<form id="searchForm" action="controller.php" method="post">

			<input type="hidden" name="form" value="searchSeekingOffering" />

			<div id="searcharea">
				<div class="mainsearch">
					<select id="categories" class="categories" name="categories">
					<?php
					if (isset ( $_GET ['category'] ) && $_GET ['category'] === 'All Categories') {
						echo file_get_contents ( '../txt/categories.txt', true );
					} else if (isset ( $_GET ['category'] )) {
						echo '<option selected="selected" value="' . $_GET ['category'] . '">' . $_GET ['category'] . '</option>';
						echo file_get_contents ( '../txt/categories.txt', true );
					} 

					else {
						echo '<option selected="selected" disabled="disabled">Select a Category</option>';
						echo file_get_contents ( '../txt/categories.txt', true );
					}
					
					?>
				</select>
					<button id="searchbutton">Search</button>
				</div>
				<div id="location"></div>
			</div>
		</form>
	</div>

	<div class="tab">
		<button id="home" class="sectionl" onclick="openPage('Offering')">Offering</button>
		<button class="sectionl" onclick="openPage('Seeking')">Seeking</button>
		<button class="sectionl" onclick="openPage('MyPosts')">My Posts</button>
	</div>
	
	<div id="newpostbutton">
		<button class="mainbuttons">Create Post</button>
	</div>

	<div id="Offering" class="boardcontent">
	<?php
	if (isset ( $_GET ['category'] ) && ($_GET ['category'] !== 'All Categories')) {
		$arr = $accountDatabaseAdapter->searchOfferingPosts ( $_GET ['category'] );
	} else {
		$arr = $accountDatabaseAdapter->getAllOfferingPosts ();
	}
	
	if (sizeof ( $arr ) == 0) {
		$result = 'There are currently no offering posts for ' . $_GET ['category'];
		echo $result;
	} else {
		$result = '';
		
		foreach ( array_reverse ( $arr ) as $item ) {
			
			$result = '<div class="offeringposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am a <span class="userinputtedfield">' . $item ['occupation'] . '</span> looking for people that need <span class="userinputtedfield">' . $item ['body_description'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br></button></div>';
			
			echo $result;
		}
	}
	?>
	</div>

	<div id="Seeking" class="boardcontent">
	<?php
	if (isset ( $_GET ['category'] ) && ($_GET ['category'] !== 'All Categories')) {
		$arr = $accountDatabaseAdapter->searchSeekingPosts ( $_GET ['category'] );
	} else {
		$arr = $accountDatabaseAdapter->getAllSeekingPosts ();
	}
	
	if (sizeof ( $arr ) == 0) {
		$result = 'There are currently no seeking posts for ' . $_GET ['category'];
		echo $result;
	} else {
		$result = '';
		
		foreach ( array_reverse ( $arr ) as $item ) {
			$result = '<div class="seekingposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am looking for a <span class="userinputtedfield">' . $item ['occupation'] . '</span> for help with <span class="userinputtedfield">' . $item ['body_description'] . '</span> by <span class="userinputtedfield"><br>' . $item ['due_date'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br>' . '</button></div>';
			echo $result;
		}
	}
	?>
	</div>

	<div id="MyPosts" class="boardcontent">
	<?php
	if (isset ( $_GET ['category'] ) && ($_GET ['category'] !== 'All Categories')) {
		$arr = $accountDatabaseAdapter->searchPersonalPosts ( $_SESSION ['user_email'], $_GET ['category'] );
	} else {
		$arr = $accountDatabaseAdapter->getAllPersonalPosts ( $_SESSION ['user_email'] );
	}
	
	if (sizeof ( $arr ) == 0 && isset ( $_GET ['category'] )) {
		$result = 'You have no seeking or offering posts for ' . $_GET ['category'];
		echo $result;
	} else {
		$result = '';
		
		if (sizeof ( $arr ) == 0) {
			echo "You currently have no active posts.";
		}
		
		foreach ( array_reverse ( $arr ) as $item ) {
			if ($item ['type'] === 'seeking') {
				$result = '<div class="seekingposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am looking for a <span class="userinputtedfield">' . $item ['occupation'] . '</span> for help with <span class="userinputtedfield">' . $item ['body_description'] . '</span> by <span class="userinputtedfield"><br>' . $item ['due_date'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br>' . '</button></div>';
			} else {
				$result = '<div class="offeringposttemplate"><p class="livepostcontent">My name is <span class="userinputtedfield">' . $item ['name'] . '</span>. I am a <span class="userinputtedfield">' . $item ['occupation'] . '</span> looking for people that need <span class="userinputtedfield">' . $item ['body_description'] . '</span></p><button id="contactbutton" class="USERID" onclick="window.location.href=\'mailto:' . $item ['contact'] . '\'">Contact Now<br></button></div>';
			}
			echo $result;
		}
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

			<form id="formOffering" action="controller.php" method="post">
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
								<?php echo file_get_contents('../txt/categories.txt', true);?>
							</select>
						</p>
						<button id="createpostbutton">Create Post</button>
					</div>
				</div>
			</form>

			<form id="formSeeking" action="controller.php" method="post">

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
							   <?php echo file_get_contents('../txt/categories.txt', true);?>
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


<script type="text/javascript" src="../js/geolocation.js"></script>
<script type="text/javascript" src="../js/tabs.js"></script>
<script type="text/javascript" src="../js/createpostbox.js"></script>
</html>