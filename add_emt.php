<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
  $sqin="insert into emt_tb(eu_id,amount,link,bank_dep,add_date,ac_date,email,comments,nodash,banknot,wrongname,uuser,wrongamount,misc,derror,emailto) values('".addslashes($_REQUEST['eu_id'])."','".addslashes($_REQUEST['amount'])."','".addslashes($_REQUEST['link'])."','".addslashes($_REQUEST['bank_dep'])."','".date('Y-m-d')."','".addslashes($_REQUEST['ac_date'])."','".addslashes($_REQUEST['email'])."','".addslashes($_REQUEST['comments'])."','".addslashes($_REQUEST['nodash'])."','".addslashes($_REQUEST['banknot'])."','".addslashes($_REQUEST['wrongname'])."','".addslashes($_REQUEST['uuser'])."','".addslashes($_REQUEST['wrongamount'])."','".addslashes($_REQUEST['misc'])."','".addslashes($_REQUEST['derror'])."','".addslashes($_REQUEST['emailto'])."')";
  $resin=mysql_query($sqin);
  if(!$resin)
  {
  die('error');
  }
  header('location:add_emt.php?act=done');
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
                                                        <td height="30" colspan="2"><strong>ADD EMT's</strong></td>
                                                      </tr>
                                                    <!--  <tr>
                                                        <td width="142" height="30"> NAME</td>
                                                        <td width="488" height="30"><input name="emt_name" type="text" id="emt_name" size="50" required></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">USER NAME</td>
                                                        <td height="30"><input name="user_name" type="text" id="user_name" size="50" required></td>
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
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rwu['us_id']==$_REQUEST['id']){ ?> selected<?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select></td>
										              </tr>
                                                      <tr>
                                                        <td height="30">AMOUNT</td>
                                                        <td height="30"><select name="amount" id="amount">
                                                          <option value="200" selected>200</option>
                                                          <option value="300">300</option>
                                                          <option value="500">500</option>
                                                          <option value="1000">1000</option>
                                                          <option value="1500">1500</option>
                                                          <option value="2000">2000</option>
                                                          <option value="2500">2500</option>
                                                          <option value="3000">3000</option>
                                                        </select></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Link</td>
                                                        <td height="30"><input name="link" type="text" id="link" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Dep Group</td>
                                                        <td height="30"><input type="radio" name="bank_dep" id="radio" value="Main" checked>
                                                          Main 
                                                            <input type="radio" name="bank_dep" id="radio2" value="CCEC">
CCEC </td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Date of EMT</td>
                                                        <td height="30"><input name="ac_date" type="text" id="ac_date" size="50" value="<?php echo date('Y-m-d H:i:s'); ?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Problems (if any)</td>
                                                        <td height="30">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">No Dashboard Request</td>
                                                        <td height="30"><input name="nodash" type="checkbox" id="nodash" value="No Dashboard Request"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Bank Not in Profile</td>
                                                        <td height="30"><input name="banknot" type="checkbox" id="banknot" value="Bank Not in Profile"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Wrong name</td>
                                                        <td height="30"><input name="wrongname" type="checkbox" id="wrongname" value="Wrong name"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Unknown User</td>
                                                        <td height="30"><input name="uuser" type="checkbox" id="uuser" value="Unknown User"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Wrong Amount</td>
                                                        <td height="30"><input name="wrongamount" type="checkbox" id="wrongamount" value="Wrong Amount"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Deposit Error</td>
                                                        <td height="30"><input name="derror" type="checkbox" id="derror" value="Deposit Error"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Misc</td>
                                                        <td height="30"><input name="misc" type="checkbox" id="misc" value="misc"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Emailed To User</td>
                                                        <td height="30"><input name="emailto" type="checkbox" id="emailto" value="1"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Email Address</td>
                                                        <td height="30"><input name="email" type="text" id="email" size="50"></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="30">Comments</td>
                                                        <td height="30"><textarea name="comments" cols="50" rows="4" id="comments"></textarea></td>
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