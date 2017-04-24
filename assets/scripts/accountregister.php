<!-- 

This file will retrieve user info,
salt the password,
and make a new row in the database.

-->


<?php
// start session
session_start ();
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
	public function createAccount($firstname, $lastname, $email, $pwd) {
		
		// trim all variables, except password
		$firstname = trim ( $firstname );
		$lastname = trim ( $lastname );
		$email = trim ( $email );
		
		// hashed and salted password
		$hashed_pwd = password_hash ( $pwd, PASSWORD_DEFAULT );
		
		// increment unique ID
		$stmt = $this->DB->prepare ( "SELECT MAX(ID) FROM user_account;" );
		$stmt->execute ();
		$uniqueID = $stmt->fetchColumn ();
		$uniqueID ++;
		
		// insert new account user in DB
		$stmt1 = $this->DB->prepare ( "INSERT into user_account values(" . $uniqueID . ", '" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $password . "');" );
		$stmt1->execute ();
		
		// Redirect to Board Page.
		header ( "Location: ../../board.php" );
		exit();
		return true;
	}
	
	// Check if there already exists a user email.
	public function userExistInDB($email) {
		$stmt = $this->DB->prepare ( "SELECT email FROM user_account WHERE email='" . $email . "';" );
		$stmt->execute ();
		
		$result = $stmt->rowCount();
		if ($result == 0) {
			return false; // no duplicate
		} else {
			return true; // email address in db
		}
	}
} // end class accountRegister
?>