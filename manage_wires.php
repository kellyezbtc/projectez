<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from wires_tb where bank_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}

if($_REQUEST['act']!='')
{
	$squp="update wires_tb set status='".addslashes($_REQUEST['act'])."' where bank_id='".$_REQUEST['id']."'";
	$resup=mysql_query($squp);
	if(!$resup)
	{
		die('error in data');
	}
}
?>


<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Welcome</title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">

</head><body>

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table bgcolor="#999999" border="0" cellpadding="0" cellspacing="1" width="1000">
                        <tbody>
                            <tr>
                                <td colspan="2" id="header"><?php //require_once('header.php'); ?>
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 200px;" width="200"><?php require_once('left-menu.php'); ?></td>
                  <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											    <p>
											      <?php 
$sqs="select * from wires_tb,user_tb where user_tb.us_id=wires_tb.wu_id and status=0 ORDER BY wires_tb.ben_name asc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
											    </p>
											    <table width="800" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="7"><strong>
                                                    Pending Wires</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="116" align="center"><strong>UserName</strong></td>
                                                    <td width="137" align="center"><strong>Beneficiary Name</strong></td>
                                                    <td width="55" align="center"><strong>Amount</strong></td>
                                                    <td width="55" align="center"><strong>Status</strong></td>
                                                    <td width="55" align="center"><strong>View</strong></td>
                                                    <td width="64" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="84" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                  <tr>
                                                    <td align="center"><?php echo $rwc['username'];?></td>
                                                    <td align="center"><?php echo $rwc['ben_name'];?></td>
                                                    <td align="center"><?php echo $rwc['bank_amount'];?></td>
                                                    <td align="center"><?php if($rwc['status']==0)
													{?>
                                                      <a href="manage_wires.php?act=1&id=<?php echo $rwc['bank_id'];?>"> MARK PAID</a>
                                                      <?php
													} ?></td>
                                                    <td align="center"><a href="view_wires.php?id=<?php echo $rwc['bank_id'];?>">View More</a></td>
                                                    <td height="30" align="center"><a href="edit_wires.php?id=<?php echo $rwc['bank_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="manage_wires.php?delid=<?php echo $rwc['bank_id'];?>">Delete</a></td>
                                                  </tr>
                                                  <?php 
  }
  ?>
                                                </table>
											    <p>
                                                  <?php 
} // mysql_no_rows end
else
{
?>
                                                </p>
											    <p>&nbsp;</p>
											    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="30"><strong>No Receiver&nbsp; found..!!</strong></td>
                                                  </tr>
                                                </table>
											    <?php 
}
?>
                                                </p>
                                                <p></p>
                                                <p>&nbsp;</p>
											    <p>&nbsp;</p></td>
											</tr>                                           
                                        </tbody></table>
                                    </div>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody></table>
  
</body></html>