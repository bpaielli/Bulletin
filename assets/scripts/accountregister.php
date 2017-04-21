<!-- 

This file will get user info,
salt the password,
and make a new row in the database.

-->


<?php

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




?>