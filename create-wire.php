<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
	  $sqch="select * from wires_tb where bank_id='".$_REQUEST['wb_id']."'";
	  $resch=mysql_query($sqch);
	  if(!$resch)
	  {
		  die('error');
	  }
	  $rwch=mysql_fetch_array($resch);
	  
	  $sqin="insert into wires_send_tb(wb_id,w_amount,wsu_id,wa_date) values('".addslashes($_REQUEST['wb_id'])."','".addslashes($_REQUEST['w_amount'])."','".addslashes($rwch['wu_id'])."','".date('Y-m-d')."')";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error');
	  }
	  header('location:create-wire-pending.php');
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
											      <form name="form1" method="get" action="" >
											        <p>&nbsp;</p>
											        <table width="690" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong>Create Wire Send</strong></td>
										              </tr>
											          <tr>
											            <td width="115" height="30">Select Receiver</td>
											            <td width="555" height="30"><select name="wb_id" id="wb_id" required>
								<option value="" selected>--Select Receiver--</option>	
                                <?php 
								$sqr="select * from wires_tb,user_tb where user_tb.us_id=wires_tb.wu_id order by username asc";
								$resr=mysql_query($sqr);
								if(!$resr)
								{
									die('error in data');
								}
								while($rwr=mysql_fetch_array($resr))
								{
								?>
                                <option value="<?php echo $rwr['bank_id']; ?>" <?php if($rwr['bank_id']==$_REQUEST['id']){?> selected<?php } ?>><?php echo $rwr['username']; ?>---<?php echo $rwr['ben_name']; ?>[<?php echo $rwr['bank_name'];?>  (<?php echo $rwr['bank_tran'];?>-<?php echo $rwr['bank_inst'];?>-<?php echo $rwr['bank_account'];?>)]</option>
                                <?php 
								}
								?>	                </select></td>
										              </tr>
											          <tr>
											            <td height="30">Amount</td>
											            <td height="30"><input name="w_amount" type="text" id="w_amount" size="50" value="<?php echo stripslashes($_REQUEST['amount']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Create Wire Send"></td>
										              </tr>
										            </table>
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