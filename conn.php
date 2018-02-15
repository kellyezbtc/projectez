<?php 
//error_reporting(1);
//$conn=mysql_connect('localhost','dsarch_root','admin@12345#');
/*
$conn=mysql_connect('localhost','ktvegas1_emtroot','admin@12345##');
if(!$conn)
{
die('error in connection');
}
mysql_select_db('ktvegas1_ezemtdb',$conn); 
$path="/home2/ktvegas1/public_html/ezfaq.xyz/upload/";
$dispath="http://ezfaq.xyz/upload/";
*/
$conn=mysql_connect('localhost','root','');
if(!$conn)
{
die('error in connection');
}
mysql_select_db('18-kellyemtdb',$conn); 
$path="D:/wamp/www/18-kelly-emt/upload/";
$dispath="http://localhost/18-kelly-emt/upload/";
?>