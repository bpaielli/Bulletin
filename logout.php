<?php
session_start();

//End Session
unset($_SESSION['user']);

//Redirect to Login Page
header ( "Location: ../../login.php" );
exit();
?>