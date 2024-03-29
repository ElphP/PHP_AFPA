<?php session_start(); 
$_SESSION["user"]=$_POST["id"];
$_SESSION["pwd"]=$_POST["mdp"];
header("Location: loginSuite.php")
?>