<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
  	 // $sqin="insert into cheque_tb(cu_id,ch_inst,ch_tran,ch_account,chdate,status,ch_amount,ch_bankname) values('".addslashes($_REQUEST['cu_id'])."','".addslashes($_REQUEST['ch_inst'])."','".addslashes($_REQUEST['ch_tran'])."','".addslashes($_REQUEST['ch_account'])."','".date('Y-m-d')."','".$_REQUEST['status']."','".addslashes($_REQUEST['ch_amount'])."','".addslashes($_REQUEST['ch_bankname'])."')";
	 $sqch="select * from cheque_tb where ch_id='".$_REQUEST['chh_id']."'";
	  $resch=mysql_query($sqch);
	  if(!$resch)
	  {
		  die('error');
	  }
	  $rwch=mysql_fetch_array($resch);
	  
	  //$sqin="insert into cheque_send_tb(chh_id,c_amount,csu_id) values('".addslashes($_REQUEST['chh_id'])."','".addslashes($_REQUEST['c_amount'])."','".addslashes($rwch['cu_id'])."')";
	   $sqin="update cheque_send_tb set chh_id='".addslashes($_REQUEST['chh_id'])."',c_amount='".addslashes($_REQUEST['c_amount'])."',csu_id='".addslashes($rwch['cu_id'])."' where cs_id='".$_REQUEST['id']."'";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error');
	  }
	  header('location:create-cheque-pending.php');
  }
  $sqs="select * from cheque_send_tb where cs_id='".$_REQUEST['id']."'";
  $ress=mysql_query($sqs);
  if(!$ress)
  {
	  die('error in data');
  }
  $rwss=mysql_fetch_array($ress);
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
											        <table width="700" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
					<?php 
													if($_REQUEST['act']=='done')
													{
													?>
                                                      <tr>
                                                        <td height="30" colspan="2" class="warning">Your Details Added..!!</td>
                                                      </tr>
                                                      <?php 
													}
													  ?>						          <tr>
											            <td height="30" colspan="2"><strong>EDIT Issue CHEQUE</strong></td>
										              </tr>
											          <tr>
											            <td width="154" height="30">SELECT CHEQUE PROFILE</td>
											            <td width="526" height="30"><select name="chh_id" id="chh_id" required>
								<option value="" selected>--Select Cheque Profile--</option>	
                                <?php 
								$sqr="select * from cheque_tb,user_tb where user_tb.us_id=cheque_tb.cu_id order by username asc";
								$resr=mysql_query($sqr);
								if(!$resr)
								{
									die('error in data');
								}
								while($rwr=mysql_fetch_array($resr))
								{
								?>
                                <option value="<?php echo $rwr['ch_id']; ?>" <?php if($rwr['ch_id']==$rwss['chh_id']){?> selected<?php } ?>><?php echo $rwr['username']; ?>---<?php echo $rwr['f_name']; ?>&nbsp;<?php echo $rwr['l_name']; ?> [<?php echo $rwr['ch_bankname'];?> (<?php echo $rwr['ch_tran'];?>-<?php echo $rwr['ch_inst'];?>-<?php echo $rwr['ch_account'];?>)]</option>
                                <?php 
								}
								?>	                </select></td>
										              </tr>
											          <tr>
											            <td height="30">Amount : </td>
											            <td height="30"><input name="c_amount" type="text" id="c_amount" size="50" value="<?php echo stripslashes($rwss['c_amount']);?>"></td>
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