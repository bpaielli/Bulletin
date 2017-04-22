<!-- 

This file will retrieve user info,
salt the password,
and make a new row in the database.

-->


<?php

class accountRegister{
	
	
function createAccount(){
	// Error Handling for empty field
	if(empty($_POST['firstname'])){
		$this->HandleError("ERROR: First Name Field is empty");
		return false;
	}else if(empty($_POST['lastname'])){
		$this->HandleError("ERROR: Last Name Field is empty");
		return false;
	}else if(empty($_POST['email'])){
		$this->HandleError("ERROR: Email Field is empty");
		return false;
	}else if(empty($_POST['password'])){
		$this->HandleError("ERROR: Password Field is empty");
		return false;
	}
	
	//trim and set all variables
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	//Check if the user exists in database
	
	
	
	//Add user into database
	
	
}


} // end class accountRegister
?>