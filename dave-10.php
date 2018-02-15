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
                                <td id="side" style="width: 250px;" width="250">
                                   <?php require_once('left-menu.php'); ?>

                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
	<?php 
		$sqs="select * from emt_tb,user_tb where bank_dep='CCEC' and amount='3000' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc LIMIT 0,3";
				$resc=mysql_query($sqs);
				if(!$resc)
				{
					die('error'.mysql_error());
				}
				if(mysql_num_rows($resc)==3)
				{
	?>										      <table width="450" border="0" align="center">
				<tr>
                  <td height="35" align="center"><strong>Dave 10k</strong></td>
                </tr>
                <?php 
			
				while($rws=mysql_fetch_array($resc))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				}
					 ?>	
											      
										          </table>
                                                  <?php
				}
				if(mysql_num_rows($resc)==2)
				{
				
												   ?>
                                                   <table width="450" border="0" align="center">
				<tr>
                  <td height="35" align="center"><strong>Dave 10k</strong></td>
                </tr>
                <?php 
			
				while($rws=mysql_fetch_array($resc))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				}
					 ?>	
											      
										          </table>
                                         <?php 
										 $sqf="select * from emt_tb,user_tb where amount='3000' and bank_dep='Main' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc LIMIT 0,1";
										$resf=mysql_query($sqf);
										if(!$resf)
										{
											die('error');
										}
										 ?>
                                         
                                          <table width="450" border="0" align="center">
                                          
                                          
                                           <?php 
			
				while($rws=mysql_fetch_array($resf))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				} // while
					 ?>	
                                          </table>         
                                                  
                                                   <?php
				} //2?>
                                                   <?php
				//}
				if(mysql_num_rows($resc)==1)
				{
				
												   ?>
                                                   <table width="450" border="0" align="center">
				<tr>
                  <td height="35" align="center"><strong>Dave 10k</strong></td>
                </tr>
                <?php 
			
				while($rws=mysql_fetch_array($resc))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				}
					 ?>	
											      
										          </table>
                                         <?php 
										 $sqf="select * from emt_tb,user_tb where amount='3000' and bank_dep='Main' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc LIMIT 0,2";
										$resf=mysql_query($sqf);
										if(!$resf)
										{
											die('error');
										}
										 ?>
                                         
                                          <table width="450" border="0" align="center">
                                          
                                          
                                           <?php 
			
				while($rws=mysql_fetch_array($resf))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				} // while
					 ?>	
                                          </table>         
                                                  
                                                   <?php
				} //1?>
                <?php 
				if(mysql_num_rows($resc)==0)
				{
				?>
                 <?php 
										 $sqf="select * from emt_tb,user_tb where amount='3000' and bank_dep='Main' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc LIMIT 0,3";
										$resf=mysql_query($sqf);
										if(!$resf)
										{
											die('error');
										}
										 ?>
                                         
                                          <table width="450" border="0" align="center">
                                          
                                          
                                           <?php 
			
				while($rws=mysql_fetch_array($resf))
				{
				?>							        
                
                <tr>
											          <td height="20">$<?php echo stripslashes($rws['amount']);?> - <?php echo stripslashes($rws['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rws['link']);?>" target="_blank"><?php echo stripslashes($rws['link']);?></a></td>
										            </tr>
													
  <tr>
											          <td height="20"><hr></td>
										            </tr>													<?php
				} // while
					 ?>	
                                          </table>         
                                                  
                                                   <?php
				} //0?>
                
											   
                  <!-- new -->
                  <?php 
				  $sqo="select * from emt_tb,user_tb where amount='1000' and  bank_dep='CCEC' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc";
				  $reso=mysql_query($sqo);
				  if(!$reso)
				  {
					  die('error in data');
				  }
				  if(mysql_num_rows($reso)>0)
				  {
					  $rwso=mysql_fetch_array($reso); ?>
				             <table width="450" border="0" align="center">  <tr>
											          <td height="20">$<?php echo stripslashes($rwso['amount']);?> - <?php echo stripslashes($rwso['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rwso['link']);?>" target="_blank"><?php echo stripslashes($rwso['link']);?></a></td>
										            </tr></table>                            
							<?php 
				  }
				  else
				  {
					    $sqo1="select * from emt_tb,user_tb where amount='1000' and  bank_dep='Main' and bank_name='' and user_tb.us_id=emt_tb.eu_id order by emt_id asc";
				  $reso1=mysql_query($sqo1);
				  if(!$reso1)
				  {
					  die('error in data');
				  }
					   $rwso1=mysql_fetch_array($reso1);
							?>
                            
                            	<table width="450" border="0" align="center">  <tr>
											          <td height="20">$<?php echo stripslashes($rwso1['amount']);?> - <?php echo stripslashes($rwso1['username']);?></td>
										            </tr>
										        <tr>
										          <td height="20"><a href="<?php echo stripslashes($rwso1['link']);?>" target="_blank"><?php echo stripslashes($rwso1['link']);?></a></td>
										            </tr></table>                           
                            <?php 
				  }
							?>
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