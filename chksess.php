<?php 
@session_start();
if($_SESSION['uid']=="" or $_SESSION['uname']=="")
{
header('location:index.php');
}
?>