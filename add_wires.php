<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
  $sqin="insert into wires_tb(bank_name,bank_address,bank_inst,bank_tran,bank_account,bank_scode,ben_name,ben_address,ben_phone,reg_date,wu_id) values('".addslashes($_REQUEST['bank_name'])."','".addslashes($_REQUEST['bank_address'])."','".addslashes($_REQUEST['bank_inst'])."','".addslashes($_REQUEST['bank_tran'])."','".addslashes($_REQUEST['bank_account'])."','".addslashes($_REQUEST['bank_scode'])."','".addslashes($_REQUEST['ben_name'])."','".addslashes($_REQUEST['ben_address'])."','".addslashes($_REQUEST['ben_phone'])."','".date('Y-m-d')."','".addslashes($_REQUEST['wu_id'])."')";
  $resin=mysql_query($sqin);
  if(!$resin)
  {
  die('error');
  }
  header('location:add_wires.php?act=done');
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
                                                        <td height="30" colspan="2"><strong>Add Wire Receiver</strong></td>
                                                      </tr>
                                                      <!--<tr>
                                                        <td height="30">Username :</td>
                                                        <td height="30"><input name="wuser_name" type="text" id="wuser_name" size="50" required></td>
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
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rwu['us_id']==$_REQUEST['id']){ ?> selected<?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select></td>
										              </tr>
                                                      <tr>
                                                        <td width="170" height="30">Beneficiary Bank Name:</td>
                                                        <td width="460" height="30"><input name="bank_name" type="text" id="bank_name" size="50" required></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Bank Address: </td>
                                                        <td height="30"><textarea name="bank_address" cols="50" id="bank_address"></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Institution #: </td>
                                                        <td height="30"><input name="bank_inst" type="text" id="bank_inst" size="50" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Transit #:</td>
                                                        <td height="30"><input name="bank_tran" type="text" id="bank_tran" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Account #: </td>
                                                        <td height="30"><input name="bank_account" type="text" id="bank_account" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Swift Code #: </td>
                                                        <td height="30"><input name="bank_scode" type="text" id="bank_scode" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Name: </td>
                                                        <td height="30"><input name="ben_name" type="text" id="ben_name" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Benefciary Address:</td>
                                                        <td height="30"><textarea name="ben_address" cols="50" id="ben_address"></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Beneficiary Phone #: </td>
                                                        <td height="30"><input name="ben_phone" type="text" id="ben_phone" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">&nbsp;</td>
                                                        <td height="30">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="ADD">&nbsp;&nbsp;</td>
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