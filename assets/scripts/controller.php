<?php
session_start();
require_once 'model.php';
$accountDatabaseAdapter = new accountDatabaseAdapter();


//REGISTER FOR ACCOUNT
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) ){
	
		$firstname = $_POST ['firstname'];
		$lastname = $_POST ['lastname'];
		$email = $_POST ['email'] ;
		$password =  $_POST ['password'];
		
		$existsInDB = $accountDatabaseAdapter -> userExistInDB($email);
		
	if($existsInDB){
		echo "<br><br>The email: " . $email .  " already has an account registered with Bulletin.";
	}else{
		//create account
		$accountDatabaseAdapter -> createAccount($firstname, $lastname, $email, $password);
		//set session variable
		$_SESSION['user_firstname'] = $firstname;
		
		// Redirect to Board Page.
		header ( "Location: ../../board.php" );
		exit();
	}

}

//LOGIN TO ACCOUNT
else if(isset($_POST['email']) && isset($_POST['password'])){
	
	$email = $_POST ['email'] ;
	$password =  $_POST ['password'];
	$existsInDB = $accountDatabaseAdapterg -> userExistInDB($email);
	
	if(!$existsInDB){
		echo "No account found for " . $email;
		
	}else{
		//check password
		$userVerfied = $accountDatabaseAdapter ->verifyLogin($email, $password);
		
		if(!$userVerfied){
			echo "Incorrect Password";
		}
		else{
			//set session variable
			$_SESSION['user_firstname'] = 'Bob';
			
			// Redirect to Board Page.
			header ( "Location: ../../board.php" );
			exit();
		}
		
	}

}


?>