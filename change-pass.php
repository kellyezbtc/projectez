<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  
  if(isset($_REQUEST['Submit']))
  {
  if($_REQUEST['txtnpass']==$_REQUEST['txtcnpass'])
  {
  $squp="update admin_tb set pass='".$_REQUEST['txtnpass']."' where id='".$_SESSION['uid']."'";
  $resup=mysql_query($squp);
  if(!$resup)
  {
  die('error');
  }
  $flag=2;
  }
  else
  {
  $flag=3;
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
                                                  <table width="550" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                   <?php 
												  if($flag==2)
												  {
												  ?>
                                                  
                                                    <tr>
                                                      <td height="30" colspan="2" class="warning02">Your Password Changed..!!</td>
                                                    </tr>
                                                  
                                                  <?php
												  } 
												  if($flag==3)
												  {
												  ?>
                                                    <tr>
                                                      <td height="30" colspan="2" class="warning02">Please Enter Valid Confirm Password</td>
                                                    </tr>
                                                    <?php 
													}
													?>
                                                    <tr>
                                                      <td height="30" colspan="2"><strong>Change Password</strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="155" height="30">New Password</td>
                                                      <td width="333" height="30"><input type="password" name="txtnpass" id="txtnpass"></td>
                                                    </tr>
                                                    <tr>
                                                      <td height="30">Confirm New password</td>
                                                      <td height="30"><input type="password" name="txtcnpass" id="txtcnpass"></td>
                                                    </tr>
                                                    <tr>
                                                      <td height="30">&nbsp;</td>
                                                      <td height="30">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Change Password"></td>
                                                    </tr>
                                                  </table>
                                                  <p>&nbsp;</p>
                                                  <p>&nbsp;</p>
                                                  <p>&nbsp;</p>
											    </form>
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