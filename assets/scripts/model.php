<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<!-- 

This file will retrieve user info,
salt the password,
and make a new row in the database.

-->


<?php


class accountDatabaseAdapter {
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
			echo ('Error Establishing Connection');
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
		$stmt1 = $this->DB->prepare ( "INSERT into user_account values(:uniqueID, :firstname, :lastname, :email, :hashed_pwd);" );
		
		$stmt1->bindParam('uniqueID', $uniqueID);
		$stmt1->bindParam('firstname', $firstname);
		$stmt1->bindParam('lastname', $lastname);
		$stmt1->bindParam('email', $email);
		$stmt1->bindParam('hashed_pwd', $hashed_pwd);
		
		$stmt1->execute ();
		
		return true;
	}
	
	
	public function userExistInDB($email) {
		$stmt = $this->DB->prepare ( "SELECT email FROM user_account WHERE email= :email" );
		$stmt->bindParam ( 'email', $email );
		$stmt->execute ();
		
		$result = $stmt->rowCount();
		if ($result == 0) {
			return false; // no duplicate
		} else {
			return true; // email address in db
		}
	}
	
	public function verifyLogin($email, $pwd){
		//verify credenials
		$stmt = $this->DB->prepare ( "SELECT password FROM user_account WHERE email= :email" );
		$stmt->bindParam ('email', $email );
		$stmt->execute ();
		$db_pwd = $stmt->fetchColumn();
		
		$isValid = password_verify($pwd, $db_pwd);
		
		if(!$isValid){
			return false; //password not valid.
		}
		else{
			return true;
		}

	}
	
	public function getUserName($email){
		$stmt = $this->DB->prepare ( "SELECT first_name FROM user_account WHERE email= :email" );
		$stmt->bindParam ('email', $email );
		$stmt->execute ();
		$name = $stmt->fetchColumn();
		
		return $name;
	}
	
	public function createOfferingPost(){
		
		//increment unique ID
		$stmt = $this->DB->prepare ( "SELECT MAX(ID) FROM post;" );
		$stmt->execute ();
		$uniqueID = $stmt->fetchColumn ();
		$uniqueID ++;
		
		//set remaining variables
		$type = 'offering';
		$user_id = $_SESSION['user'];
		$location = '85719';
		$category = $_POST['createpostcategories'];
		$occupation = $_POST['createpostoccupationoffering'];
		$description = $_POST['createpostdescriptionoffering'];
		$due_date = '';
		$contact = $_SESSION['user_email'];

		
		//INSERT into DB
		$stmt = $this->DB->prepare ("INSERT into post values(:uniqueID, :type, :name, :location, :category, :occupation, :description, :dueDate, :contact);");
		$stmt->bindParam('uniqueID', $uniqueID);
		$stmt->bindParam('type', $type);
		$stmt->bindParam('name', $user_id);
		$stmt->bindParam('location', $location);
		$stmt->bindParam('category', $category);
		$stmt->bindParam('occupation', $occupation);
		$stmt->bindParam('description', $description);
		$stmt->bindParam('dueDate', $due_date);
		$stmt->bindParam('contact', $contact);
		$stmt->execute ();
		
		return true;
	}
	
	public function createSeekingPost(){
		//increment unique ID
		$stmt = $this->DB->prepare ( "SELECT MAX(ID) FROM post;" );
		$stmt->execute ();
		$uniqueID = $stmt->fetchColumn ();
		$uniqueID ++;
		
		//set remaining variables
		$type = 'seeking';
		$user_id = $_SESSION['user'];
		$date = '05-01-2017';
		$location = '85719';
		$category = $_POST['createpostcategories2'];
		$occupation = $_POST['createpostoccupationseeking'];
		$description = $_POST['createpostdescriptionseeking'];
		$due_date = $_POST['createpostduedate'];
		$contact = $_SESSION['user_email'];
		
		//INSERT into DB
		$stmt = $this->DB->prepare ("INSERT into post values(:uniqueID, :type, :name, :location, :category, :occupation, :description, :dueDate, :contact);");
		$stmt->bindParam('uniqueID', $uniqueID);
		$stmt->bindParam('type', $type);
		$stmt->bindParam('name', $user_id);
		$stmt->bindParam('location', $location);
		$stmt->bindParam('category', $category);
		$stmt->bindParam('occupation', $occupation);
		$stmt->bindParam('description', $description);
		$stmt->bindParam('dueDate', $due_date);
		$stmt->bindParam('contact', $contact);
		$stmt->execute ();
	
		//
	
	}
	
	
	public function getAllOfferingPosts(){
		$stmt = $this->DB->prepare ( "SELECT * FROM post WHERE type='offering';" );
		$stmt->execute ();
		
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
	
	public function getAllSeekingPosts(){
		$stmt = $this->DB->prepare ( "SELECT * FROM post WHERE type='seeking';" );
		$stmt->execute ();
		
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
	
	
	public function getAllPersonalPosts($currUser){
		$query = 'Select user_account.email, post.type, post.name, post.category, post.occupation, post.body_description, post.due_date, post.contact FROM post JOIN user_account ON user_account.email = post.contact WHERE user_account.email = "' . $currUser . '";';
		
		$stmt = $this->DB->prepare($query);
		$stmt->execute ();
		
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
	
	public function searchOfferingPosts($category){
		$query = "SELECT * FROM post WHERE type ='offering' AND category='" . $category . "';";
		$stmt = $this->DB->prepare ( $query ); 
		$stmt->execute ();
		
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
	
	public function searchSeekingPosts($category){
		$query = "SELECT * FROM post WHERE type ='seeking' AND category='" . $category . "';";
		$stmt = $this->DB->prepare ( $query );
		$stmt->execute ();
		
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
	
	public function searchPersonalPosts($currUser, $category){
		$query = 'Select user_account.email, post.type, post.name, post.category, post.occupation, post.body_description, post.due_date, post.contact FROM post JOIN user_account ON user_account.email = post.contact WHERE user_account.email = "' . $currUser . '" AND post.category="' . $category . '";';
		
		$stmt = $this->DB->prepare($query);
		$stmt->execute ();
		$arr = $stmt->fetchAll();
		
		return $arr;
	}
} // end class acccountDatabaseAdapter
?>