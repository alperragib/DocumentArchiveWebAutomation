<?php
session_start();

if(isset($_GET['u'])){
	session_destroy();
	header("Location:login.php");
	exit();
}

if(isset($_SESSION['username'])){
    header("Location:home.php");
    exit();
}
else
{
  header("Location:login.php");
    exit();
}



?>