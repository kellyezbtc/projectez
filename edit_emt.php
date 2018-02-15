<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
 // $sqin="insert into emt_tb(emt_name,user_name,amount,link,bank_dep,add_date) values('".addslashes($_REQUEST['emt_name'])."','".addslashes($_REQUEST['user_name'])."','".addslashes($_REQUEST['amount'])."','".addslashes($_REQUEST['link'])."','".addslashes($_REQUEST['bank_dep'])."','".date('Y-m-d')."')";
 $sqin="update emt_tb set eu_id='".addslashes($_REQUEST['eu_id'])."',amount='".addslashes($_REQUEST['amount'])."',link='".addslashes($_REQUEST['link'])."',bank_dep='".addslashes($_REQUEST['bank_dep'])."',ac_date='".addslashes($_REQUEST['ac_date'])."',email='".addslashes($_REQUEST['email'])."',comments='".addslashes($_REQUEST['comments'])."',nodash='".addslashes($_REQUEST['nodash'])."',wrongname='".addslashes($_REQUEST['wrongname'])."',banknot='".addslashes($_REQUEST['banknot'])."',uuser='".addslashes($_REQUEST['uuser'])."',wrongamount='".addslashes($_REQUEST['wrongamount'])."',misc='".addslashes($_REQUEST['misc'])."',derror='".addslashes($_REQUEST['derror'])."',emailto='".addslashes($_REQUEST['emailto'])."' where emt_id='".$_REQUEST['id']."'";
  $resin=mysql_query($sqin);
  if(!$resin)
  {
  die('error');
  }
  header('location:manage_emt.php');
  }
  $sqs="select * from emt_tb where emt_id='".$_REQUEST['id']."'";
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
                                                        <td height="30" colspan="2"><strong>EDIT EMT's</strong></td>
                                                      </tr>
                                                      <!--<tr>
                                                        <td width="142" height="30"> NAME</td>
                                                        <td width="488" height="30"><input name="emt_name" type="text" id="emt_name" size="50" required value="<?php echo stripslashes($rws['emt_name']);?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">USER NAME</td>
                                                        <td height="30"><input name="user_name" type="text" required id="user_name" value="<?php echo stripslashes($rws['user_name']);?>" size="50"></td>
                                                      </tr>-->
         <tr>
											            <td width="134" height="30">SELECT USERNAME</td>
											            <td width="396" height="30"><select name="eu_id" id="eu_id">
             <?php 
			 $squ="select * from user_tb order by username asc";
			 $resu=mysql_query($squ);
			 if(!$resu)
			 {
				 die('error in data');
			 }
			 while($rwu=mysql_fetch_array($resu))
			 {
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rwu['us_id']==$rws['eu_id']){?> selected <?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select></td>
										              </tr>                                             <tr>
                                                        <td height="30">AMOUNT</td>
                                                        <td height="30"><select name="amount" id="amount">
                                                          <option value="200" <?php if($rws['amount']=='200'){?>selected<?php } ?>>200</option>
                                                          <option value="300" <?php if($rws['amount']=='300'){?>selected<?php } ?>>300</option>
                                                          <option value="500" <?php if($rws['amount']=='500'){?>selected<?php } ?>>500</option>
                                                          <option value="1000" <?php if($rws['amount']=='1000'){?>selected<?php } ?>>1000</option>
                                                          <option value="1500" <?php if($rws['amount']=='1500'){?>selected<?php } ?>>1500</option>
                                                          <option value="2000" <?php if($rws['amount']=='2000'){?>selected<?php } ?>>2000</option>
                                                          <option value="2500" <?php if($rws['amount']=='2500'){?>selected<?php } ?>>2500</option>
                                                          <option value="3000" <?php if($rws['amount']=='3000'){?>selected<?php } ?>>3000</option>
                                                        </select></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Link</td>
                                                        <td height="30"><input name="link" type="text" id="link" value="<?php echo stripslashes($rws['link']);?>" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Dep Group</td>
                                                        <td height="30"><input type="radio" name="bank_dep" id="radio" value="Main" <?php if($rws['bank_dep']=='Main'){?> checked <?php } ?>>
                                                          Main 
                                                            <input type="radio" name="bank_dep" id="radio2" value="CCEC"  <?php if($rws['bank_dep']=='CCEC'){?> checked <?php } ?>>
CCEC </td>
                                                      </tr>
                                                        <tr>
                                                        <td height="30">Date of EMT</td>
                                                        <td height="30"><input name="ac_date" type="text" id="ac_date" size="50" value="<?php echo stripslashes($rws['ac_date']);?>"></td>
                                                      </tr>
                                                     <tr>
                                                        <td height="30">Problems (if any)</td>
                                                        <td height="30">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">No Dashboard Request</td>
                                                        <td height="30"><input name="nodash" type="checkbox" id="nodash" value="No Dashboard Request" <?php if($rws['nodash']=='No Dashboard Request'){?> checked <?php } ?> ></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Not in Profile</td>
                                                        <td height="30"><input name="banknot" type="checkbox" id="banknot" value="Bank Not in Profile"  <?php if($rws['banknot']=='Bank Not in Profile'){?> checked <?php } ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Wrong name</td>
                                                        <td height="30"><input name="wrongname" type="checkbox" id="wrongname" value="Wrong name"  <?php if($rws['wrongname']=='Wrong name'){?> checked <?php } ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Unknown User</td>
                                                        <td height="30"><input name="uuser" type="checkbox" id="uuser" value="Unknown User"  <?php if($rws['uuser']=='Unknown User'){?> checked <?php } ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Wrong Amount</td>
                                                        <td height="30"><input name="wrongamount" type="checkbox" id="wrongamount" value="Wrong Amount"  <?php if($rws['wrongamount']=='Wrong Amount'){?> checked <?php } ?>></td>
                                                      </tr>
                                                       <tr>
                                                        <td height="30">Deposit Error</td>
                                                        <td height="30"><input name="derror" type="checkbox" id="derror" value="Deposit Error" <?php if($rws['derror']=='Deposit Error'){?> checked <?php } ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Misc</td>
                                                        <td height="30"><input name="misc" type="checkbox" id="misc" value="misc" <?php if($rws['misc']=='misc'){?> checked <?php } ?>></td>
                                                      </tr>
                                                           <tr>
                                                        <td height="30">Emailed To User</td>
                                                        <td height="30"><input name="emailto" type="checkbox" id="emailto" value="1"  <?php if($rws['emailto']=='1'){?> checked <?php } ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Email Address</td>
                                                        <td height="30"><input name="email" type="text" id="email" value="<?php echo stripslashes($rws['email']);?>" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Comments</td>
                                                        <td height="30"><textarea name="comments" cols="50" rows="4" id="comments"><?php echo stripslashes($rws['comments']);?></textarea></td>
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