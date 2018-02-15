<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
	  $sqin="insert into admin_tb(uname,pass,e1,e2,e3,e4,e5,e6,e7,e8,e9,w1,w2,w3,w4,w5,c1,c2,c3,c4,c5,i1,i2,i3,u1) values('".addslashes($_REQUEST['uname'])."','".addslashes($_REQUEST['pass'])."','".addslashes($_REQUEST['e1'])."','".addslashes($_REQUEST['e2'])."','".addslashes($_REQUEST['e3'])."','".addslashes($_REQUEST['e4'])."','".addslashes($_REQUEST['e5'])."','".addslashes($_REQUEST['e6'])."','".addslashes($_REQUEST['e7'])."','".addslashes($_REQUEST['e8'])."','".addslashes($_REQUEST['e9'])."','".addslashes($_REQUEST['w1'])."','".addslashes($_REQUEST['w2'])."','".addslashes($_REQUEST['w3'])."','".addslashes($_REQUEST['w4'])."','".addslashes($_REQUEST['w5'])."','".addslashes($_REQUEST['c1'])."','".addslashes($_REQUEST['c2'])."','".addslashes($_REQUEST['c3'])."','".addslashes($_REQUEST['c4'])."','".addslashes($_REQUEST['c5'])."','".addslashes($_REQUEST['i1'])."','".addslashes($_REQUEST['i2'])."','".addslashes($_REQUEST['i3'])."','".addslashes($_REQUEST['u1'])."')";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error in data');
	  }
	 header('location:manage_admin_user.php'); 
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
                                   <?php require_once('left-menu.php'); 
								     if($rwckf['sadmin']!=1)
{
	header('location:welcome.php');
}
								   ?>

                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											      <form name="form1" method="post" action="">
											        <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong>ADD ADMIN USER</strong></td>
										              </tr>
											          <tr>
											            <td width="158" height="30">USER NAME</td>
											            <td width="422" height="30"><input name="uname" type="text" id="uname" size="50"></td>
										              </tr>
											          <tr>
											            <td height="30">PASSWORD</td>
											            <td height="30"><input name="pass" type="password" id="pass" size="50"></td>
										              </tr>
											          <tr>
											            <td height="30"><strong>PERMISSION LINK</strong></td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30"><span class="special">EMT's</span></td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30">Add EMT's</td>
											            <td height="30"><input name="e1" type="checkbox" id="e1" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Pending EMT's</td>
											            <td height="30"><input name="e2" type="checkbox" id="e2" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Pending EMT's (EDIT/DELETE/DEPOSIT)</td>
											            <td height="30"><input name="e8" type="checkbox" id="e8" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Dave 10k</td>
											            <td height="30"><input name="e3" type="checkbox" id="e3" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Edit EMT's</td>
											            <td height="30"><input name="e4" type="checkbox" id="e4" value="1"></td>
										              </tr>
					 <tr>
											            <td height="30">Flagged Words</td>
											            <td height="30"><input name="e5" type="checkbox" id="e5" value="1"></td>
										              </tr>
                                                       <tr>
											            <td height="30">Deposit Reports</td>
											            <td height="30"><input name="e6" type="checkbox" id="e6" value="1"></td>
										              </tr>	
                                                       <tr>
											            <td height="30">Problem EMT's</td>
											            <td height="30"><input name="e7" type="checkbox" id="e7" value="1"></td>
										              </tr>					          
                                                      <tr>
                                                         <td height="30">Problem EMT's (EDIT/DELETE)</td>
                                                         <td height="30"><input name="e9" type="checkbox" id="e9" value="1"></td>
                                                      </tr>
                                                      <tr>
											            <td height="30"><span class="special">WIRES</span></td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30">Create Wire Send</td>
											            <td height="30"><input name="w1" type="checkbox" id="w1" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Pending Wires</td>
											            <td height="30"><input name="w2" type="checkbox" id="w2" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Search Wires</td>
											            <td height="30"><input name="w3" type="checkbox" id="w3" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Add Wire Receiver (Profile)</td>
											            <td height="30"><input name="w4" type="checkbox" id="w4" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Manage Wire Receiver(Profile)</td>
											            <td height="30"><input name="w5" type="checkbox" id="w5" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30"><span class="special">CHEQUE</span></td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30">Issue Cheque</td>
											            <td height="30"><input name="c1" type="checkbox" id="c1" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Pending Cheque</td>
											            <td height="30"><input name="c2" type="checkbox" id="c2" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Search Cheque</td>
											            <td height="30"><input name="c3" type="checkbox" id="c3" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Add Cheque Profile</td>
											            <td height="30"><input name="c4" type="checkbox" id="c4" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Search Cheques Profile</td>
											            <td height="30"><input name="c5" type="checkbox" id="c5" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30"><span class="special">Incoming Wires</span></td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30">Incoming Wires</td>
											            <td height="30"><input name="i1" type="checkbox" id="i1" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Pending Incoming Wires</td>
											            <td height="30"><input name="i2" type="checkbox" id="i2" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">Search Incoming Wires</td>
											            <td height="30"><input name="i3" type="checkbox" id="i3" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30" class="special">Users</td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30">Manage Users/add</td>
											            <td height="30"><input name="u1" type="checkbox" id="u1" value="1"></td>
										              </tr>
											          <tr>
											            <td height="30">&nbsp;</td>
											            <td height="30">&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="ADD"></td>
										              </tr>
										            </table>
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