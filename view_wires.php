<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');

   $sqs="select * from wires_tb,user_tb where user_tb.us_id=wires_tb.wu_id and bank_id='".$_REQUEST['id']."'";
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
                                                    <table width="650" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6"><?php 
													if($_REQUEST['act']=='done')
													{
													?>
                                                      <tr>
                                                        <td height="30" colspan="2" class="warning">Your Details Added..!!</td>
                                                      </tr>
                                                      <?php 
													}
													  ?>
                                                      <tr>
                                                        <td height="30" colspan="2"><strong>View  Receiver&nbsp; - <a href="#" onClick="history.back();">BACK</a></strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Username</td>
                                                        <td height="30"><?php echo stripslashes($rws['username']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td width="170" height="30">Beneficiary Bank Name:</td>
                                                        <td width="460" height="30"><?php echo stripslashes($rws['bank_name']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Bank Address: </td>
                                                        <td height="30"><?php echo stripslashes($rws['bank_address']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Institution #: </td>
                                                        <td height="30"><?php echo stripslashes($rws['bank_inst']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Transit #:</td>
                                                        <td height="30"><?php echo stripslashes($rws['bank_tran']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Account #: </td>
                                                        <td height="30"><?php echo stripslashes($rws['bank_account']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Swift Code #: </td>
                                                        <td height="30"><?php echo stripslashes($rws['bank_scode']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Name: </td>
                                                        <td height="30"><?php echo stripslashes($rws['ben_name']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Benefciary Address:</td>
                                                        <td height="30"><?php echo stripslashes($rws['ben_address']);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Phone #: </td>
                                                        <td height="30"><?php echo stripslashes($rws['ben_phone']);?></td>
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