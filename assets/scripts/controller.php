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
		header("Location: ../../register.php?error=duplicateCreds");
	}else{
		//create account
		$accountDatabaseAdapter -> createAccount($firstname, $lastname, $email, $password);
		//set session variable
		$_SESSION['user'] = $firstname;
		$_SESSION['user_email'] = $email;
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
	
	//wrong username
	if(!$existsInDB){
		header("Location: ../../login.php?error=badCreds");
		
	}
	else{
		//check password
		$userVerfied = $accountDatabaseAdapter ->verifyLogin($email, $password);
		
		//wrong password
		if(!$userVerfied){
			header("Location: ../../login.php?error=badCreds");
		}
		else{
			//set session variable
			$user_firstname = $accountDatabaseAdapter ->getUserName($email);
			$_SESSION['user'] = $user_firstname ;
			$_SESSION['user_email'] = $email;
			
			// Redirect to Board Page.
			header ( "Location: ../../board.php" );
			exit();
		}
		
	}

}

//OFFERING POST
else if($_POST['form'] === 'formOffering'){

	$accountDatabaseAdapter ->createOfferingPost();
	
	header ( "Location: ../../board.php" );
}

//SEEKING POST
else if($_POST['form'] === 'formSeeking'){

	$accountDatabaseAdapter ->createSeekingPost();
	
	
	

	header ( "Location: ../../board.php" );

}






?>