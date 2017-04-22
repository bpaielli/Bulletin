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
			echo ('Error establishing Connection');
			exit ();
		}
	}
	public function createAccount() {
		// Error Handling for empty field
		if (empty ( $_POST ['firstname'] )) {
			$this->HandleError ( "ERROR: First Name Field is empty" );
			return false;
		} else if (empty ( $_POST ['lastname'] )) {
			$this->HandleError ( "ERROR: Last Name Field is empty" );
			return false;
		} else if (empty ( $_POST ['email'] )) {
			$this->HandleError ( "ERROR: Email Field is empty" );
			return false;
		} else if (empty ( $_POST ['password'] )) {
			$this->HandleError ( "ERROR: Password Field is empty" );
			return false;
		}
		
		// trim and set all variables
		$firstname = trim ( $_POST ['firstname'] );
		$lastname = trim ( $_POST ['lastname'] );
		$email = trim ( $_POST ['email'] );
		$password = trim ( $_POST ['password'] );
		
		// Check if the user exists in database
		
		$duplicate = checkUserInDB ( $email );
		
		if (duplicate) {
			echo "This email address: " . $email . " already has an account.";
			return false;
		} 		

		// Add user into database
		else {
			
			// salt password
		}
	}
	
	// Check if there already exists a user email.
	public function checkUserInDB($email) {
		$query = mysql_query ( "SELECT email FROM user_account WHERE email='" . $email . "'" );
		
		if (mysql_num_rows ( $query ) != 0) {
			return true; //user does exist in DB.
		} else {
			return false;
		}
	}
} // end class accountRegister
?>