<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
	//  $sqin="insert into user_tb(username,f_name,l_name) values('".addslashes($_REQUEST['username'])."','".addslashes($_REQUEST['f_name'])."','".addslashes($_REQUEST['l_name'])."')";
	$sqck="select * from user_tb where username='".addslashes(trim($_REQUEST['username']))."' and us_id!='".$_REQUEST['id']."'";
	  $resck=mysql_query($sqck);
	  if(!$resck)
	  {
		  die('error');
	  }
	 if(mysql_num_rows($resck)==0)
	  {
	$sqin="update user_tb set username='".addslashes(trim($_REQUEST['username']))."',f_name='".addslashes($_REQUEST['f_name'])."',l_name='".addslashes($_REQUEST['l_name'])."' where us_id='".$_REQUEST['id']."'";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error');
	  }
	  header('location:manage_user.php');
	  }
	  else
	  {
		  $fg=3;
	  }
  }
   $sqs="select * from user_tb where us_id='".$_REQUEST['id']."'";
  $ress=mysql_query($sqs);
  if(!$ress)
  {
  die('error');
  }
  $rws=mysql_fetch_array($ress);
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
                                <td colspan="2" id="header"><?php //require_once('header.php'); ?></td>
                          </tr>
                            <tr>
                                <td id="side" style="width: 250px;" width="250">
                                   <?php require_once('left-menu.php'); ?>

                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											      <form name="form1" method="post" action="">
											        <p>&nbsp;</p>
											        <table width="550" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#E6E6E6">  <?php if($fg==3){?>
											          <tr>
											            <td height="30" colspan="2" class="warning">Username Already Exists</td>
										              </tr>
                                                      <?php 
													}
													  ?>
											          <tr>
											            <td height="30" colspan="2"><strong>EDIT USERS</strong></td>
										              </tr>
											          <tr>
											            <td width="147" height="30">USERNAME</td>
											            <td width="383" height="30"><input name="username" type="text" id="username" size="50" required value="<?php echo stripslashes($rws['username']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">FIRST NAME</td>
											            <td height="30"><input name="f_name" type="text" id="f_name" size="50" value="<?php echo stripslashes($rws['f_name']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">LAST NAME</td>
											            <td height="30"><input name="l_name" type="text" id="l_name" size="50" value="<?php echo stripslashes($rws['l_name']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">&nbsp;</td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="EDIT"></td>
										              </tr>
										            </table>
											        <p>&nbsp;</p>
											        <p>&nbsp;</p>
											        <p>&nbsp;</p>
											        <p>&nbsp;</p>
										          </form>
											      <p>&nbsp;</p>
											      <p></p>
											      <br>
											      <br>
											      <p>&nbsp;</p>
											    <p>&nbsp;</p>
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