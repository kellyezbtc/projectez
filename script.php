<?php require_once('conn.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$sqs="select * from user_tb";
$ress=mysql_query($sqs);
while($rws=mysql_fetch_array($ress))
{
	$squp="update emt_tb set eu_id='".$rws['us_id']."' where user_name='".$rws['username']."'";
	$resup=mysql_query($squp);
	if(!$resup)
	{
		die('error');
	}
}
?>
</body>
</html>