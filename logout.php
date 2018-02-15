<?php 
@session_start();
$_SESSION['uid']=""; 
$_SESSION['uname']="";
header('location:index.php');
?>