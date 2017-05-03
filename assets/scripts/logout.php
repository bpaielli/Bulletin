<!-- Programmers: Austin Mutschler & Brittany Paielli -->
<?php
session_start();

//End Session
unset($_SESSION['user']);
unset($_SESSION['user_email']);


//Redirect to Login Page
header ( "Location: ../../login.php" );
exit();
?>