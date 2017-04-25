<?php
session_start();
require_once 'model.php';
$accountDatabaseAdapter = new accountDatabaseAdapter();


//REGISTER FOR ACCOUNT
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) ){
	
		$firstname =  htmlspecialchars($_POST ['firstname']);
		$lastname = htmlspecialchars($_POST ['lastname']);
		$email = htmlspecialchars($_POST ['email']) ;
		$password =  htmlspecialchars($_POST ['password']);
		
		$existsInDB = $accountDatabaseAdapter -> userExistInDB($email);
		
	if($existsInDB){
		echo "<br><br>The email: " . $email .  " already has an account registered with Bulletin.";
	}else{
		//create account
		$accountDatabaseAdapter -> createAccount($firstname, $lastname, $email, $password);
		//set session variable
		$_SESSION['user'] = $firstname;
		
		// Redirect to Board Page.
		header ( "Location: ../../board.php" );
		exit();
	}

}

//LOGIN TO ACCOUNT
else if(isset($_POST['email']) && isset($_POST['password'])){
	
	$email = htmlspecialchars($_POST ['email']) ;
	$password =  htmlspecialchars($_POST ['password']);
	$existsInDB = $accountDatabaseAdapter -> userExistInDB($email);
	
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
			$user_firstname = $accountDatabaseAdapter ->getUserName($email);
			$_SESSION['user'] = $user_firstname ;
			
			// Redirect to Board Page.
			header ( "Location: ../../board.php" );
			exit();
		}
		
	}

}


?>