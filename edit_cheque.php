<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
  	  //$sqin="insert into cheque_tb(cu_id,ch_inst,ch_tran,ch_account,chdate) values('".addslashes($_REQUEST['cu_id'])."','".addslashes($_REQUEST['ch_inst'])."','".addslashes($_REQUEST['ch_tran'])."','".addslashes($_REQUEST['ch_account'])."')";
	  $sqin="update cheque_tb set cu_id='".addslashes($_REQUEST['cu_id'])."',ch_inst='".addslashes($_REQUEST['ch_inst'])."',ch_tran='".addslashes($_REQUEST['ch_tran'])."',ch_account='".addslashes($_REQUEST['ch_account'])."',ch_bankname='".addslashes($_REQUEST['ch_bankname'])."' where ch_id='".$_REQUEST['id']."'";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error');
	  }
	  header('location:manage_cheque.php');
  }
   $sqs="select * from cheque_tb where ch_id='".$_REQUEST['id']."'";
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
											        <table width="550" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong>EDIT CHEQUE</strong></td>
										              </tr>
											          <tr>
											            <td width="134" height="30">SELECT USERNAME</td>
											            <td width="396" height="30"><select name="cu_id" id="cu_id">
             <?php 
			 $squ="select * from user_tb order by username asc";
			 $resu=mysql_query($squ);
			 if(!$resu)
			 {
				 die('error in data');
			 }
			 while($rwu=mysql_fetch_array($resu))
			 {
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rwu['us_id']==$rws['cu_id']){?> selected <?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select></td>
										              </tr>
											          <tr>
											            <td height="30">Transit #</td>
											            <td height="30"><input name="ch_tran" type="text" id="ch_tran" size="50" value="<?php echo stripslashes($rws['ch_tran']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">Institution #</td>
											            <td height="30"><input name="ch_inst" type="text" id="ch_inst" size="50" value="<?php echo stripslashes($rws['ch_inst']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">Account #</td>
											            <td height="30"><input name="ch_account" type="text" id="ch_account" size="50" value="<?php echo stripslashes($rws['ch_account']);?>"></td>
										              </tr>
                                                        <tr>
											            <td height="30">Bank Name :</td>
											            <td height="30"><input name="ch_bankname" type="text" id="ch_bankname" size="50"  value="<?php echo stripslashes($rws['ch_bankname']);?>"></td>
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