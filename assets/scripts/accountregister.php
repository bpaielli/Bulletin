<!-- 

This file will retrieve user info,
salt the password,
and make a new row in the database.

-->


<?php
class accountRegister {
	private $DB;
	
	// establish connection to the database named 'bulletin_db'
	public function __construct() {
		$db = 'mysql:dbname=bulletin_db;host=127.0.0.1;charset=utf8';
		$user = 'root';
		$password = '';
		
		try {
			$this->DB = new PDO ( $db, $user, $password );
			$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo 'ERROR: establishing Connection';
			exit ();
		}
	}
	
	public function createAccount($firstname, $lastname, $email, $password) {
		
		// trim variables
		$firstname = trim ( $firstname );
		$lastname = trim ( $lastname );
		$email = trim ( $email );
		$password = trim ( $password );
		
		// Check if the user exists in database
		$duplicate = checkUserInDB( $email );
		
		if ($duplicate) {
			echo "ERROR: This email address is already registered with Bulletin.";
			return false;
		} 		

		// Add user into database
		else {
			
			// TODO: salt password
			
			
			//Insert Query
			$query_str1 = "INSERT into user_account values( 1, " . $firstname .", " . $lastname . ", " . $email . ", " . $password . ")";
			mysql_query($query_str1, $DB);
			return true;
		}
		
		header("../board.php"); /* Redirect browser to board after successful login */
		exit();
		
	}
	
	// Check if there already exists a user email.
	public function checkUserInDB($email) {
		
	 	$query_str = "SELECT email FROM user_account WHERE email='" . $email . "'";
		$query = mysql_query ( $query_str, $DB);
		
		if (mysql_num_rows ( $query ) != 0) {
			return true; //user does exist in DB.
		} else {
			return false;
		}
	}
} // end class accountRegister
?>