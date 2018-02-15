<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  $squ="select * from user_tb where us_id='".$_REQUEST['id']."'";
  $resu=mysql_query($squ);
  if(!$resu)
  {
	  die('error');
  }
  $rwu=mysql_fetch_array($resu);
  if(isset($_REQUEST['Submitcp']))
  {
	   $sqch="select * from cheque_tb where ch_id='".$_REQUEST['chh_id']."'";
	  $resch=mysql_query($sqch);
	  if(!$resch)
	  {
		  die('error');
	  }
	  $rwch=mysql_fetch_array($resch);
	  
	  $sqin="insert into cheque_send_tb(chh_id,c_amount,csu_id) values('".addslashes($_REQUEST['chh_id'])."','".addslashes($_REQUEST['c_amount'])."','".addslashes($rwch['cu_id'])."')";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error');
	  }
  }
   if(isset($_REQUEST['Submitw']))
  {
	   $sqch="select * from wires_tb where bank_id='".$_REQUEST['wbb_id']."'";
	  $resch=mysql_query($sqch);
	  if(!$resch)
	  {
		  die('error');
	  }
	  $rwch=mysql_fetch_array($resch);
	  
	  $sqin="insert into wires_send_tb(wb_id,w_amount,wsu_id,wa_date) values('".addslashes($_REQUEST['wbb_id'])."','".addslashes($_REQUEST['w_amount'])."','".addslashes($rwch['wu_id'])."','".date('Y-m-d')."')";
	  $resin=mysql_query($sqin);
	  if(!$resin)
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
                                <td colspan="2" id="header"><?php //require_once('header.php'); ?></td>
                          </tr>
                            <tr>
                                <td id="side" style="width: 200px;" width="200">
                                   <?php require_once('left-menu.php'); ?>

                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                <td>
                                                    <!--<strong>Welcome</strong> | <span class="mailing">Site Administrative Area</span>
                                          -->      </td>
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											      <p><span style="font-size:16px; font-weight:bold;"><?php echo $rwu['username'];?> &nbsp;&nbsp;(<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?>)</span></p>
											      <p>&nbsp;</p>
		
											      
											      <span style="font-size:13px; font-weight:bold;">PENDING EMT</span>
											        <?php 
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and emt_tb.eu_id='".$_REQUEST['id']."' ORDER BY emt_id asc";

	
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
												?>
                                    
											      <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
											        <tr>
											          <td width="87" height="30" align="center"><strong>AMOUNT </strong></td>
											          <td width="80" align="center"><strong>BANK DEPT GROUP</strong></td>
											          <td width="73" align="center"><strong>Dep Link&nbsp;</strong></td>
										            </tr>
											        <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
											        <form name="frm1" action="" method="post">
											          <tr>
											            <td height="30" align="center"><?php echo $rwc['amount'];?></td>
											            <td align="center"><?php echo $rwc['bank_dep'];?></td>
											            <td align="center"><a href="<?php echo stripslashes($rwc['link']);?>" target="_blank">LINK</a>&nbsp;
											              <input type="hidden" name="eid" id="eid" value="<?php echo $rwc['emt_id'];?>"></td>
										              </tr>
										            </form>
											        <?php 
  }
  ?>
										          </table>
                                                 
                                                    <?php 
} // mysql_no_rows end
else
{
?>
                                                 
											      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
											        <tr>
											          <td height="10">None </td>
										            </tr>
										          </table>
                                                  <?php 
}
?>
                                                  
                                           <br>  <br>
                                                 
                                                   <span style="font-size:13px; font-weight:bold;">PREVIOUS EMT</span>
                                                    <?php 
$sqs="select * from emt_tb,user_tb,admin_tb where user_tb.us_id=emt_tb.eu_id and emt_tb.ad_id=admin_tb.id and bank_name!='' and emt_tb.eu_id='".$_REQUEST['id']."' ORDER BY date_deposit desc";

	
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
												?>
                                                  
                                                  <br>
                                                  
                                                  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <tr>
                                                      <td width="87" align="center"><strong>Date Deposit</strong></td>
                                                      <td width="87" height="30" align="center"><strong>AMOUNT </strong></td>
                                                      <td width="80" align="center"><strong>BANK NAME</strong></td>
                                                      <td width="73" align="center"><strong>Admin Name</strong></td>
                                                    </tr>
                                                    <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                    <form name="frm1" action="" method="post">
                                                      <tr>
                                                        <td align="center"><?php  $arr=explode("-",$rwc['date_deposit']);
						echo $arr[2]."-".$arr[1].'-'.$arr[0];
														?></td>
                                                        <td height="30" align="center"><?php echo $rwc['amount'];?></td>
                                                        <td align="center"><?php echo $rwc['bank_name'];?></td>
                                                        <td align="center"><?php echo $rwc['uname'];?></td>
                                                      </tr>
                                                    </form>
                                                    <?php 
  }
  ?>
                                                  </table>
                                                 
                                                    <?php 
} // mysql_no_rows end
else
{
?>
                                                  
                                                  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="10">None</td>
                                                    </tr>
                                                  </table>
                                                  <?php 
}
?>
                                                  <table width="600" border="0">
                                                    <tr>
                                                      <td height="30" align="center"><strong><a href="add_emt.php?id=<?php echo $_REQUEST['id'];?>">Add EMT</a></strong></td>
                                                    </tr>
                                                  </table>
                                                  <hr>
                                                   <span style="font-size:13px; font-weight:bold;">PENDING CHEQUES </span>
                                                    <?php 
$sqs="select * from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id and cheque_send_tb.c_status=0 and cheque_send_tb.csu_id='".$_REQUEST['id']."' ORDER BY cheque_send_tb.cs_id desc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
                                                  </p>
                                                  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                                    <tr>
                                                      <td width="116" height="30" align="center"><strong>UserName</strong></td>
                                                      <td width="137" align="center"><strong>First Name - Last Name</strong></td>
                                                      <td width="55" align="center"><strong>Amount</strong></td>
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
                                                      <td height="30" align="center"><?php echo $rwc['username'];?></td>
                                                      <td align="center"><?php echo $rwc['f_name'];?>&nbsp; <?php echo $rwc['l_name'];?></td>
                                                      <td align="center"><?php echo $rwc['c_amount'];?></td>
                                                    </tr>
                                                    <?php 
  }
  ?>
                                                  </table>
                                                 
                                                    <?php 
} // mysql_no_rows end
else
{
?>
                                                 
                                                  
                                                  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="10">None</td>
                                                    </tr>
                                                  </table><br>
<br>

                                                  <?php 
}
?>
                                                   <span style="font-size:13px; font-weight:bold;">PREVIOUS CHEQUES<br>
                                                  </span>
<?php 
$sqs="select * from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id and cheque_send_tb.c_status=1 and cheque_send_tb.csu_id='".$_REQUEST['id']."' ORDER BY cheque_send_tb.cs_id desc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
                                                  
                                                  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                                    <tr>
                                                      <td width="360" height="30" align="center"><strong>BANK PROFILE</strong></td>
                                                      <td width="237" align="center"><strong>Amount</strong></td>
                                                      <td width="195" align="center"><strong>Date Paid</strong></td>
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
                                                      <td height="30" align="center"><?php echo $rwc['ch_bankname'];?> (<?php echo $rwc['ch_tran'];?>-<?php echo $rwc['ch_inst'];?>-<?php echo $rwc['ch_account'];?>)</td>
                                                      <td align="center"><?php echo $rwc['c_amount'];?></td>
                                                      <td align="center"><?php echo $rwc['cd_date'];?></td>
                                                    </tr>
                                                    <?php 
  }
  ?>
                                                  </table>
                                                 
                                                    <?php 
} // mysql_no_rows end
else
{
?>
                                                  
                                                  
                                                  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="10">None</td>
                                                    </tr>
                                                  </table>
                                                  
                                                    <?php 
}
?>
                                        <br><br>
          
                                                  
                                                   <span style="font-size:13px; font-weight:bold;">CHEQUE PROFILES </span>
                                                    <?php
												
$sqs="select * from user_tb,cheque_tb where user_tb.us_id=cheque_tb.cu_id and cheque_tb.cu_id='".$_REQUEST['id']."'  ORDER BY ch_id asc";


$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>
                                                  
                                                  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?><form name="frmcp" id="frmcp" method="post" action="">
                                                <tr>
                                                  <td width="229" height="30" align="center"><?php echo $rwc['ch_bankname'];?> (<?php echo $rwc['ch_tran'];?>-<?php echo $rwc['ch_inst'];?>-<?php echo $rwc['ch_account'];?>)</td>
                                                  <td width="400" align="center">Amount : 
                                                    <input name="chh_id" id="chh_id" type="hidden" value="<?php echo $rwc['ch_id'];?>"><input name="c_amount" id="c_amount" type="text" required>&nbsp;<input name="Submitcp" type="submit" value="Issue Cheque"><!--<a href="add_cheque_send.php?id=<?php echo $rwc['ch_id'];?>">Issue Cheque</a>--></td>
                                                  <td width="163" align="center"><a href="edit_cheque.php?id=<?php echo $rwc['ch_id'];?>">Edit</a></td>
                                                </tr></form>
                                                <?php 
  }
  ?>
                                              </table>
                                              
                                                <?php 
} // mysql_no_rows end
else
{
?>
                                              
                                              <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="10">None</td>
                                                </tr>
                                              </table>
                                              
                                                <?php 
}
?>
                                                <br><br>
                                                
                                              <table width="600" border="0">
                                                <tr>
                                                  <td height="30" align="center"><strong><a href="add_cheque.php?id=<?php echo $_REQUEST['id'];?>">Add CHEQUE PRFOILE</a></strong></td>
                                                </tr>
                                              </table>
                                             
                                              <hr>
                                              <p>   <span style="font-size:13px; font-weight:bold;">INCOMING WIRES (TO EZBTC)</span>
<?php
												
$sqs="select * from user_tb,incoming_wires_tb where user_tb.us_id=incoming_wires_tb.iu_id and i_status=0 and incoming_wires_tb.iu_id='".$_REQUEST['id']."' ORDER BY incoming_wires_tb.iw_id asc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>

                                              <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr>
                                                  <td width="120" height="30" align="center"><strong>Username</strong></td>
                                                  <td width="118" height="30" align="center"><strong> Name</strong></td>
                                                  <td width="110" height="30" align="center"><strong>Amount</strong></td>
                                                  <td width="90" align="center"><strong>Sent To Bank</strong></td>
                                                </tr>
                                                <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                <tr>
                                                  <td height="30" align="center"><?php echo $rwc['username'];?>&nbsp;</td>
                                                  <td height="30" align="center"><?php echo stripslashes($rwc['f_name']);?>&nbsp;<?php echo $rwc['l_name'];?></td>
                                                  <td height="30" align="center"><?php echo $rwc['i_amount'];?></td>
                                                  <td align="center"><?php echo $rwc['i_bank'];?></td>
                                                </tr>
                                                <?php 
  }
  ?>
                                              </table>
                                              
                                                <?php 
} // mysql_no_rows end
else
{
?>
                                          
											    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="10">None</td>
                                                  </tr>
                                                </table>
											    <?php 
}
?>
								<br>			   
											      <span style="font-size:13px; font-weight:bold;">OUTGOING WIRES (TO USER) </span>
<?php 
$sqs="select * from wires_send_tb,wires_tb,user_tb where wires_tb.bank_id=wires_send_tb.wb_id and wires_send_tb.wsu_id=user_tb.us_id and wires_send_tb.wsu_id='".$_REQUEST['id']."' and wires_send_tb.w_status=0 ORDER BY wires_tb.ben_name asc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
                                              </p>
											    <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr>
                                                  <td width="246" height="30" align="center"><strong>Bank Details</strong></td>
                                                  <td width="402" align="center"><strong>Beneficiary Name</strong></td>
                                                  <td width="144" align="center"><strong>Amount</strong></td>
                                                  <td width="144" align="center"><strong>Posted Date</strong></td>
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
                                                  <td height="30" align="center"><?php echo $rwc['bank_name'];?>(<?php echo stripslashes($rwc['bank_account']);?>-<?php echo $rwc['bank_scode'];?>)&nbsp;</td>
                                                  <td align="center"><?php echo $rwc['ben_name'];?></td>
                                                  <td align="center"><?php echo $rwc['w_amount'];?></td>
                                                  <td align="center"><?php echo $rwc['wa_date'];?></td>
                                                </tr>
                                                <?php 
  }
  ?>
                                              </table>
                                              
                                                <?php 
} // mysql_no_rows end
else
{
?>
                                             
                                             
                                              <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="10">None</td>
                                                </tr>
                                              </table>
                                       								    <?php 
}
?>       
                                      
                                              <br>
                                              
                                              
                                              
                                               <span style="font-size:13px; font-weight:bold;"> OUTGOING WIRE PROFILE<br>
                                                </span>
<?php 
$sqs="select * from wires_tb,user_tb where user_tb.us_id=wires_tb.wu_id and wires_tb.wu_id='".$_REQUEST['id']."'  ORDER BY wires_tb.ben_name asc";


$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
                                              </p>
                                              <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
       <form name="frmw" id="frmw" method="post" action="">                                         <tr>
                                                  <td width="195" height="30" align="center"><?php echo $rwc['bank_name'];?>(<?php echo stripslashes($rwc['bank_account']);?>-<?php echo $rwc['bank_scode'];?>)&nbsp;</td>
                                                  <td width="484" height="30" align="center">Amount : 
                                <input name="wbb_id" id="wbb_id" type="hidden" value="<?php echo $rwc['bank_id'];?>"><input name="w_amount" id="w_amount" type="text" required>&nbsp;<input name="Submitw" type="submit" value="Wire Send"><!--<a href="add_cheque_send.php?id=<?php echo $rwc['ch_id'];?>">Issue Cheque</a>--></td>
                                                  <td width="113" height="30" align="center"><a href="edit_wires.php?id=<?php echo $rwc['bank_id'];?>">Edit</a></td>
                                                </tr>
         </form>                                       <?php 
  }
  ?>
                                              </table>
                                        
                                                <?php 
} // mysql_no_rows end
else
{
?>
                                             
                                              <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="10">None</td>
                                                </tr>
                                              </table>
                                              
                                                <?php 
}
?>
                                              
                                              <table width="600" border="0">
                                                <tr>
                                                  <td height="30" align="center"><strong><a href="add_wires.php?id=<?php echo $_REQUEST['id'];?>">Add WIRE PROFILE</a></strong></td>
                                                </tr>
                                              </table>
                                              <p>&nbsp;</p>
                                              <p>&nbsp; </p></td>
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