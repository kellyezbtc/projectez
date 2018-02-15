<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from cheque_send_tb where cs_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}

if($_REQUEST['act']!='')
{
	$squp="update cheque_send_tb set c_status='".addslashes($_REQUEST['act'])."' where cs_id='".$_REQUEST['id']."'";
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
												<td style="line-height: 16px;"><p>&nbsp;</p><form name="form1" method="post" action="">
										          <table width="600" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong> SEARCH BY Username / Last Name</strong></td>
										              </tr>
											          <tr>
											            <td width="141" height="30">Enter search :</td>
											            <td width="446" height="30"><input name="usrch" type="text" id="usrch" size="50"></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Search"></td>
										              </tr>
									              </table>
										          </form>
												  <p>&nbsp;</p>
											    <p>
											      <?php 
$sqs="select * from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id ORDER BY cheque_send_tb.cs_id desc";

if(isset($_REQUEST['Submit']))
{
$sqs="select * from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id and (username like '%".addslashes($_REQUEST['usrch'])."%' or l_name like '%".addslashes($_REQUEST['usrch'])."%') ORDER BY cheque_send_tb.cs_id desc LIMIT 0,20";
	}

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
                                                    <td height="30" colspan="6"><strong>
                                                    Search Pending Cheque</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="116" align="center"><strong>UserName</strong></td>
                                                    <td width="137" align="center"><strong>First Name - Last Name</strong></td>
                                                    <td width="55" align="center"><strong>Amount</strong></td>
                                                    <td width="55" align="center"><strong>Status</strong></td>
                                                    <td width="64" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="84" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
	  $squ="select * from user_tb where us_id='".$rwc['wu_id']."'";
	  $resu=mysql_query($squ);
	  if(!$resu)
	  {
		  die('error in data');
	  }
	  $rwsu=mysql_fetch_array($resu);
  ?>
                                                  <tr>
                                                    <td align="center"><?php echo $rwc['username'];?></td>
                                                    <td align="center"><?php echo $rwc['f_name'];?>&nbsp; <?php echo $rwc['l_name'];?></td>
                                                    <td align="center"><?php echo $rwc['c_amount'];?></td>
                                                    <td align="center"><?php if($rwc['c_status']==0)
													{
														echo 'Pending';
													}
													else
													{
														echo 'PAID';
													}
														?>
                                                      
                                                      </td>
                                                    <td height="30" align="center"><a href="edit_create_cheque.php?id=<?php echo $rwc['cs_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="search-create-cheque-pending.php?delid=<?php echo $rwc['cs_id'];?>">Delete</a></td>
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