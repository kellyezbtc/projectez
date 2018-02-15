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
											    <p>&nbsp;</p><form name="form1" method="post" action="">
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
                                                <?php
												
$sqs="select * from user_tb,cheque_tb where user_tb.us_id=cheque_tb.cu_id  ORDER BY ch_id asc";
if(isset($_REQUEST['Submit']))
{
$sqs="select * from user_tb,cheque_tb where user_tb.us_id=cheque_tb.cu_id and (username like '%".addslashes($_REQUEST['usrch'])."%' or l_name like '%".addslashes($_REQUEST['usrch'])."%') ORDER BY ch_id asc LIMIT 0,20";
	}

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>
											    <table width="800" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="9"><strong>search  Cheque </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="71" height="30" align="center"><strong>Username</strong></td>
                                                    <td width="71" height="30" align="center"><strong>First Name</strong></td>
                                                    <td width="72" align="center"><strong>Last Name</strong></td>
                                                    <td width="64" height="30" align="center"><strong>Account</strong></td>
                                                    <td width="62" align="center"><strong>Transit </strong></td>
                                                    <td width="78" align="center"><strong>Institution </strong></td>
                                                    <td width="53" align="center"><strong>Bank Name</strong></td>
                                                    <td width="45" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="66" height="30" align="center"><strong>Delete</strong></td>
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
                                                    <td align="center"><?php echo $rwc['ch_bankname'];?></td>
                                                    <td height="30" align="center"><a href="edit_cheque.php?id=<?php echo $rwc['ch_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="search_cheque.php?delid=<?php echo $rwc['ch_id'];?>">Delete</a></td>
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