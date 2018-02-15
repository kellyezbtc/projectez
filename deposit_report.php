<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  
  
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
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											      <p>&nbsp;</p>
                                                  <?php
			$sdt=date('Y-m-d',mktime(0,0,0,date('m'),date('d')-30,date('Y')));
												 /* $sqrp="select * from emt_tb where date_deposit  between '".$sdt."' and '".date('Y-m-d')."'";
												  $resrp=mysql_query($sqrp);
												  if(!$resrp)
												  {
													  die('error in data');
												  } */
												  
												   ?>
											      <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#AABFFF">
											        <tr>
											          <td height="30" colspan="4" align="left"><strong>Deposit Reports</strong></td>
										            </tr>
											        <tr>
											          <td width="26%" height="30" align="center"><strong>DATE</strong></td>
											          <td width="29%" height="30" align="center"><strong>Total Deposits</strong></td>
											          <td width="28%" height="30" align="center"><strong>Main Total</strong></td>
											          <td width="17%" height="30" align="center"><strong>&nbsp;CCEC Deposit</strong></td>
										            </tr>
                                                    <?php 
													 for($i=0;$i<30;$i++)
												  {
									$sdt=date('Y-m-d',mktime(0,0,0,date('m'),date('d')-$i,date('Y'))); 
									if(strtotime($sdt)>=strtotime('2018-01-11'))
									{
													?>
											        <tr>
											          <td height="30" align="center"><?php echo $sdt; ?></td>
											          <td height="30" align="center"><?php
													  $sqp1="select sum(amount) as sm1 from emt_tb where date_deposit='".$sdt."'";
													  $resp1=mysql_query($sqp1);
													  if(!$resp1)
													  {
														  die('error');
													  }
													$rwrp1=mysql_fetch_array($resp1);
													if($rwrp1['sm1']!='')
													{
													echo '$'.$rwrp1['sm1']; 
													}
													else
													{
														echo '-';
													}
													  
													   ?></td>
											          <td height="30" align="center"><?php
													  $sqp1="select sum(amount) as sm2 from emt_tb where date_deposit='".$sdt."' and bank_dep='Main'";
													  $resp1=mysql_query($sqp1);
													  if(!$resp1)
													  {
														  die('error');
													  }
													$rwrp1=mysql_fetch_array($resp1);
													if($rwrp1['sm2']!='')
													{
													echo '$'.$rwrp1['sm2']; 
													}
													else
													{
														echo '-';
													}
													  
													   ?></td>
											          <td height="30" align="center"><?php
													  $sqp1="select sum(amount) as sm3 from emt_tb where date_deposit='".$sdt."'  and bank_dep='CCEC'";
													  $resp1=mysql_query($sqp1);
													  if(!$resp1)
													  {
														  die('error');
													  }
													$rwrp1=mysql_fetch_array($resp1);
													if($rwrp1['sm3']!='')
													{
													echo '$'.$rwrp1['sm3']; 
													}
													else
													{
														echo '-';
													}
													  
													   ?></td>
										            </tr>
                                                    <?php 
									} // if
													} //for
													?>
										          </table>
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