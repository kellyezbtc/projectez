<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from user_tb where us_id='".$_REQUEST['delid']."'";
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
                                <td id="side" style="width: 250px;" width="250"><?php require_once('left-menu.php'); ?></td>
                  <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											    <p>&nbsp;</p><form name="form1" method="post" action="">
											        <table width="600" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong> SEARCH</strong></td>
										              </tr>
											          <tr>
											            <td width="90" height="30">Username</td>
											            <td width="497" height="30"><input name="usrch" type="text" id="usrch" size="50"></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Search"></td>
										              </tr>
										            </table>
										          </form>
											    <p>&nbsp;</p>
                                                <?php
												
$sqs="select * from user_tb  ORDER BY username asc";
if(isset($_REQUEST['Submit']))
{
	
$sqs="select * from user_tb where username like '%".addslashes($_REQUEST['usrch'])."%' ORDER BY username asc";
	}
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>
											    <table width="754" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="6"><strong>Manage User</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="162" height="30" align="center"><strong>Username</strong></td>
                                                    <td width="146" height="30" align="center"><strong>Firstname</strong></td>
                                                    <td width="96" height="30" align="center"><strong>Lastname</strong></td>
                                                    <td width="96" align="center"><strong>VIEW MORE DETAILS</strong></td>
                                                    <td width="96" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="106" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                  <tr>
                                                    <td height="30" align="center"><?php echo $rwc['username'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo stripslashes($rwc['f_name']);?></td>
                                                    <td height="30" align="center"><?php echo $rwc['l_name'];?></td>
                                                    <td align="center"><a href="user_details.php?id=<?php echo $rwc['us_id'];?>">VIEW</a></td>
                                                    <td height="30" align="center"><a href="edit_user.php?id=<?php echo $rwc['us_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="manage_user.php?delid=<?php echo $rwc['us_id'];?>">Delete</a></td>
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
											    <table width="500" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="35"><strong>No match for -</strong> " <?php echo trim($_REQUEST['usrch']);?> " - <a href="add_user.php?user=<?php echo trim($_REQUEST['usrch']);?>">ADD USER</a></td>
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