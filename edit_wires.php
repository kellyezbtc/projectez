<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
  $sqin="update  wires_tb set wu_id='".addslashes($_REQUEST['wu_id'])."',bank_name='".addslashes($_REQUEST['bank_name'])."',bank_address='".addslashes($_REQUEST['bank_address'])."',bank_inst='".addslashes($_REQUEST['bank_inst'])."',bank_tran='".addslashes($_REQUEST['bank_tran'])."',bank_account='".addslashes($_REQUEST['bank_account'])."',bank_scode='".addslashes($_REQUEST['bank_scode'])."',ben_name='".addslashes($_REQUEST['ben_name'])."',ben_address='".addslashes($_REQUEST['ben_address'])."',ben_phone='".addslashes($_REQUEST['ben_phone'])."' where bank_id='".$_REQUEST['id']."'";
  $resin=mysql_query($sqin);
  if(!$resin)
  {
  die('error');
  }
  header('location:manage_wires.php');
  }
   $sqs="select * from wires_tb where bank_id='".$_REQUEST['id']."'";
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
                                                        <td height="30" colspan="2"><strong>Edit  Wire Receiver</strong></td>
                                                      </tr>
                                                    <!--  <tr>
                                                        <td height="30">Username :</td>
                                                        <td height="30"><input name="wuser_name" type="text" id="wuser_name" size="50" required  value="<?php echo stripslashes($rws['wuser_name']);?>"></td>
                                                      </tr>-->
                                                      <tr>
											            <td width="170" height="30">SELECT USERNAME</td>
											            <td width="460" height="30"><select name="wu_id" id="wu_id">
             <?php 
			 $squ="select * from user_tb order by username asc";
			 $resu=mysql_query($squ);
			 if(!$resu)
			 {
				 die('error in data');
			 }
			 while($rwu=mysql_fetch_array($resu))
			 {
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rwu['us_id']==$rws['wu_id']){?> selected <?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select></td>
										              </tr>
                                                      
                                                      <tr>
                                                        <td width="170" height="30">Beneficiary Bank Name:</td>
                                                        <td width="460" height="30"><input name="bank_name" type="text" id="bank_name" size="50" required value="<?php echo stripslashes($rws['bank_name']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Bank Address: </td>
                                                        <td height="30"><textarea name="bank_address" cols="50" id="bank_address"><?php echo stripslashes($rws['bank_address']);?></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Institution #: </td>
                                                        <td height="30"><input name="bank_inst" type="text" id="bank_inst" size="50" value="<?php echo stripslashes($rws['bank_inst']);?>" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Transit #:</td>
                                                        <td height="30"><input name="bank_tran" type="text" id="bank_tran" size="50" value="<?php echo stripslashes($rws['bank_tran']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Account #: </td>
                                                        <td height="30"><input name="bank_account" type="text" id="bank_account" size="50" value="<?php echo stripslashes($rws['bank_account']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Swift Code #: </td>
                                                        <td height="30"><input name="bank_scode" type="text" id="bank_scode" size="50" value="<?php echo stripslashes($rws['bank_scode']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Name: </td>
                                                        <td height="30"><input name="ben_name" type="text" id="ben_name" size="50" value="<?php echo stripslashes($rws['ben_name']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Benefciary Address:</td>
                                                        <td height="30"><textarea name="ben_address" cols="50" id="ben_address"><?php echo stripslashes($rws['ben_address']);?></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Phone #: </td>
                                                        <td height="30"><input name="ben_phone" type="text" id="ben_phone" size="50" value="<?php echo stripslashes($rws['ben_phone']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">&nbsp;</td>
                                                        <td height="30">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="EDIT">&nbsp;&nbsp;</td>
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