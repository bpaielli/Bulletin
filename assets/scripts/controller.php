<?php

require_once 'accountregister.php';


if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) ){
	
		$firstname = $_POST ['firstname'];
		$lastname = $_POST ['lastname'];
		$email = $_POST ['email'] ;
		$password =  $_POST ['password'];
	
	$accountReg = new accountRegister(); 
	$result = $accountReg -> userExistInDB($email);
	
	if($result){
		echo "<br><br>The email: " . $email .  " already has an account registered with Bulletin.";
	}else{
		$accountReg -> createAccount($firstname, $lastname, $email, $password);
	}

}


?>