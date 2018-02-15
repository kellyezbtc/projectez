<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from cheque_tb where ch_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}
if($_REQUEST['act']!='')
{
	$squp="update cheque_tb set status='".addslashes($_REQUEST['act'])."' where ch_id='".$_REQUEST['id']."'";
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
											    <p>&nbsp;</p>
											    <p>&nbsp;</p>
                                                <?php
												
$sqs="select * from user_tb,cheque_tb where user_tb.us_id=cheque_tb.cu_id and status=0  ORDER BY ch_id asc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>
											    <table width="800" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="11"><strong>View Pending cheques - </strong><a href="pdf-pending-cheque.php" target="_blank"><strong>Display Pending Report</strong></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="66" height="30" align="center"><strong>Username</strong></td>
                                                    <td width="71" height="30" align="center"><strong>First Name</strong></td>
                                                    <td width="71" align="center"><strong>Last Name</strong></td>
                                                    <td width="63" height="30" align="center"><strong>Account</strong></td>
                                                    <td width="61" align="center"><strong>Transit </strong></td>
                                                    <td width="77" align="center"><strong>Institution </strong></td>
                                                    <td width="62" align="center"><strong>Amount</strong></td>
                                                    <td width="52" align="center"><strong>Bank Name</strong></td>
                                                    <td width="78" align="center"><strong>Status</strong></td>
                                                    <td width="43" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="64" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                  <tr>
                                                    <td height="30" align="center"><?php echo $rwc['username'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo stripslashes($rwc['f_name']);?>&nbsp;</td>
                                                    <td align="center"><?php echo $rwc['l_name'];?></td>
                                                    <td height="30" align="center"><?php echo $rwc['ch_account'];?></td>
                                                    <td align="center"><?php echo $rwc['ch_tran'];?></td>
                                                    <td align="center"><?php echo $rwc['ch_inst'];?></td>
                                                    <td align="center"><?php echo $rwc['ch_amount'];?></td>
                                                    <td align="center"><?php echo $rwc['ch_bankname'];?></td>
                                                    <td align="center"><?php if($rwc['status']==0)
													{?>
                                                      <a href="manage_cheque.php?act=1&id=<?php echo $rwc['ch_id'];?>"> MARK PAID</a>
                                                      <?php
													}
													else
													{
													?>
                                                      <a href="manage_cheque.php?act=0&id=<?php echo $rwc['ch_id'];?>"> <img src="images/accepted_48.png"  border='0'/></a>
                                                    <?php
													}
													?></td>
                                                    <td height="30" align="center"><a href="edit_cheque.php?id=<?php echo $rwc['ch_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="manage_cheque.php?delid=<?php echo $rwc['ch_id'];?>">Delete</a></td>
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
                                                    <td>No cheque found..!!</td>
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