<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submitd']))
  {
	  $squp="update flag_tb set word_disp='".addslashes(trim($_REQUEST['word_disp']))."'";
	  $resup=mysql_query($squp);
	  if(!$resup)
	  {
		  die('error updated');
	  }
	  $flag=1;
  }
   $sqs="select * from flag_tb";
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
											        <table width="550" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6"><?php 
													if($flag==1)
													{
													?>
											          <tr>
											            <td height="30" colspan="2" class="warning">Details Updated....!!</td>
										              </tr>
                                                      <?php 
													}
													  ?>
											          <tr>
											            <td height="30" colspan="2"><strong>Flagged Words</strong></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><textarea name="word_disp" id="word_disp" cols="60" rows="8"><?php echo stripslashes($rws['word_disp']);?></textarea></td>
										              </tr>
											          <tr>
											            <td height="30">&nbsp;</td>
											            <td>&nbsp;</td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submitd" id="Submitd" value="Update"></td>
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