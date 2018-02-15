<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from emt_tb where emt_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}
if(isset($_REQUEST['Submitd']))
{
	$squp="update emt_tb set bank_name='".addslashes($_REQUEST['bank_name'])."',date_deposit='".date('Y-m-d')."',date_dd='".date('Y-m-d H:i:s')."',ad_id='".$_SESSION['uid']."' where emt_id='".$_REQUEST['eid']."'";
	$resup=mysql_query($squp);
	if(!$resup)
	{
		die('error in data');
	}
}
?>


<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Welcome</title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
<script language="javascript">
function ckbank()
{
	//alert('hi');

if(document.getElementById("bank_name").value=='')
{
	//alert(document.frm1.bank_name.value);
	alert('Please Select Bank');
	document.getElementById("bank_name").focus();
	return false;
}

}
</script>
</head><body>

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table bgcolor="#999999" border="0" cellpadding="0" cellspacing="1" width="1000">
                        <tbody>
                            <tr>
                                <td colspan="2" id="header"><?php //require_once('header.php'); ?>
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 200px;" width="200"><?php require_once('left-menu.php'); ?></td>
                  <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											      <form name="form1" method="post" action="">
											        <table width="600" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong> SEARCH</strong></td>
										              </tr>
											          <tr>
											            <td width="90" height="30">BANK GROUP :</td>
											            <td width="497" height="30"><input type="radio" name="bank_dep" id="radio" value="Main">
											              Main
                                                          <input type="radio" name="bank_dep" id="radio" value="CCEC">
											              CCEC
                                                          <input type="radio" name="bank_dep" id="radio" value="all" checked>
											              BOTH</td>
										              </tr>
											          <tr>
											            <td height="30">Amount : </td>
											            <td height="30"><input name="amount" type="radio" value="all" checked> All
        <input name="amount" type="radio" value="200"> 200 <input name="amount" type="radio" value="300"> 300
        <input name="amount" type="radio" value="500"> 500
        <input name="amount" type="radio" value="1000"> 1000
        <input name="amount" type="radio" value="1500"> 1500<input name="amount" type="radio" value="2000"> 2000
        <input name="amount" type="radio" value="2500"> 2500
        <input name="amount" type="radio" value="3000"> 3000                                                
                                                        
                                                        </td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Search"></td>
										              </tr>
										            </table>
										          </form>
											      <p>&nbsp;</p><?php 
		 $sqfw="select * from flag_tb";
  $resfw=mysql_query($sqfw);
  if(!$resfw)
  {
  die('error');
  }
  $rwfw=mysql_fetch_array($resfw);
	$ar=explode(",",$rwfw['word_disp']);
	$cn=count($ar);
	$co=1;
	foreach($ar as $val)
	{
		if($co==$cn)
		{
		$kw.=" username like '%".addslashes($val)."%'";
		}
		else
		{
			$kw.=" username like '%".addslashes($val)."%' or ";
		}
		$co++;
	}
												  
												  
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY ac_date asc";
if(isset($_REQUEST['Submit']))
{
	if($_REQUEST['bank_dep']=='all' and $_REQUEST['amount']=='all')
	{
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount=''  and misc='' and derror='' ORDER BY ac_date asc";
	}
	if($_REQUEST['bank_dep']!='all' and $_REQUEST['amount']!='all')
	{
$sqs="select * from emt_tb,user_tb where bank_dep='".$_REQUEST['bank_dep']."' and amount='".$_REQUEST['amount']."' and  user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY ac_date asc";
	}
	if($_REQUEST['bank_dep']!='all' and $_REQUEST['amount']=='all')
	{
$sqs="select * from emt_tb,user_tb where bank_dep='".$_REQUEST['bank_dep']."' and  user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY ac_date asc";
	}
	if($_REQUEST['bank_dep']=='all' and $_REQUEST['amount']!='all')
	{
$sqs="select * from emt_tb,user_tb where  amount='".$_REQUEST['amount']."' and  user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY ac_date asc";
	}
	
	
}
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
												?>
											
											    <table width="1058" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#AABFFF">
                                                  <tr>
                                                    <td height="30" colspan="10"><strong>Pending EMT's</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="30" colspan="5" align="center" class="free">TOTAL PENDING : 
                     <?php
					 $sqp1="select sum(amount) as stot from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY emt_id asc";
					 $resp1=mysql_query($sqp1);
					 if(!$resp1)
					 {
						 die('error-1');
					 }
					 $rwsp1=mysql_fetch_array($resp1);
					 $st1=$rwsp1['stot'];
					 echo '$'.number_format($rwsp1['stot'],2,'.',',');
					 
					  ?>                               
                                                    </td>
                                                    <td colspan="2" align="center" class="free">Non-CCEC&nbsp;PENDING : 
                                                    <?php
												/*	$sqp1="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' ORDER BY emt_id asc";
					 
					 $resp1=mysql_query($sqp1);
					 if(!$resp1)
					 {
						 die('error-1');
					 }
					while($rwp1=mysql_fetch_array($resp1))
					{
						$sqck2="select amount from user_tb,emt_tb  where user_tb.us_id=emt_tb.eu_id and bank_name='' and us_id='".$rwp1['us_id']."' and ($kw)";

$resck2=mysql_query($sqck2);
if(!$resck2)
{
	echo 'error check'.mysql_error();
}
$amt=0;
while($rwck2=mysql_fetch_array($resck2))
{
	$amt=$amt+$rwck2['amount'];
}
						
					} // while end
					 $dp=$stt-$amt;
					echo '$'.number_format($dp,2,'.',',');
					*/
					 $sqp1="select sum(amount) as stot1 from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and bank_dep='CCEC' and nodash='' and banknot='' and wrongname='' and uuser='' and wrongamount='' and misc='' and derror='' ORDER BY emt_id asc";
					 $resp1=mysql_query($sqp1);
					 if(!$resp1)
					 {
						 die('error-1');
					 }
					 $rwsp1=mysql_fetch_array($resp1);
					 $st2=$rwsp1['stot1'];
					 $st=$st1-$st2;
					 echo '$'.number_format($st,2,'.',',');
					  ?></td>
                                                    <td height="30" colspan="3" align="center" class="free">Total CCEC Pending : 
                                                    <?php
					
					 echo '$'.number_format($st2,2,'.',',');
					 
					  ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="62" align="center"><strong>Date</strong></td>
                                                    <td width="62" height="30" align="center"><strong>NAME</strong></td>
                                                    <td width="50" height="30" align="center"><strong>USER NAME</strong></td>
                                                    <td width="47" height="30" align="center"><strong>AMT </strong></td>
                                                    <td width="62" align="center"><strong> Link&nbsp;</strong></td>
                                                    <td width="172" align="center"><strong>Select Bank</strong></td>
                                                    <td width="187" align="center"><strong>DEPOSITED</strong></td>
                                                    <td width="336" align="center"><strong>Previous</strong></td>
                                                    <td width="34" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="24" height="30" align="center"><strong>DEL</strong></td>
                                                  </tr>
         
                                                  <?php 
												  $k=0;
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
     <form name="frm1" action="" method="post">                                             <tr <?php if($k%2==0){?>style="background-color:#f1f1f1;" <?php } ?>>
       <td align="center"><?php 
	   if($rwc['ac_date']!='0000-00-00 00:00:00')
	   {
	 /*  $nw=time();
	   $nw1=strtotime($rwc['ac_date']);
	   $dn=$nw-$nw1;
	   $ds=date('d H',$dn);
	   $st=explode(" ",$ds);
	   echo $st[0].'d '.$st[1].'h'; */
	    $startdate=$rwc['ac_date'];
$enddate=time(); 

$diff=$enddate-strtotime($startdate); 
//echo "diff in seconds: $diff<br/>\n<br/>\n"; 

// immediately convert to days 
$temp=$diff/86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 

// days 
$days=floor($temp);  $temp=24*($temp-$days); 
// hours 
$hours=floor($temp);  $temp=60*($temp-$hours); 
// minutes 
$minutes=floor($temp); $temp=60*($temp-$minutes); 
// seconds 
$seconds=floor($temp); 
echo "{$days}d {$hours}h";
	   }
	   //echo date('D-d',strtotime($rwc['add_date']));
	   ?></td>
                                                    <td height="30" align="center"><?php echo $rwc['f_name'];?>&nbsp;<?php echo $rwc['l_name'];?></td>
                                                    <td height="30" align="center"><?php //new add 
													
						//$sqck="select * from user_tb where us_id='".$rwc['us_id']."' and (username like '%".addslashes($rwfw['word_disp'])."%')";
						$sqck="select * from user_tb where us_id='".$rwc['us_id']."' and ($kw)";

$resck=mysql_query($sqck);
if(!$resck)
{
	echo 'error check'.mysql_error();
}
if(mysql_num_rows($resck)==0)
{
	if($rwc['bank_dep']=='CCEC')
	{
			echo '<span  class="warning02">'.stripslashes($rwc['username']).'</span>';
	}
	else
	{
	echo stripslashes($rwc['username']);
	}
}
else
{
	echo '<span  class="warning02">'.stripslashes($rwc['username']).'</span>';
}
// end new
													
													
													//echo stripslashes($rwc['username']);?></td>
                                                    <td height="30" align="center"><?php echo $rwc['amount'];?></td>
                                                    <td align="center"><a href="<?php echo stripslashes($rwc['link']);?>" target="_blank">LINK</a>&nbsp;
                                                    <input type="hidden" name="eid" id="eid" value="<?php echo $rwc['emt_id'];?>"></td>
                                                    <td align="center">
                    <?php 
	if($rwc['bank_name']=='')												
	{					
	if(mysql_num_rows($resck)==0)
{
	if($rwc['bank_dep']=='CCEC')
	{
		?>
        <select name="bank_name" id="bank_name" <?php if($rwckf['e8']!=1)
{ ?>disabled <?php } ?> required>
                                                      <option value="">--Select Bank--</option>    <option value="CCEC 1.9">CCEC 1.9</option>
                                                        <option value="CCEC 1.6" >CCEC 1.6</option>   <option value="CCEC Main" >CCEC Main</option>
        <?php
	}
	else
	{							?>                                   <select name="bank_name" id="bank_name" <?php if($rwckf['e8']!=1)
{ ?>disabled <?php } ?> required>
                                                      <option value="">--Select Bank--</option>
                                                        <option value="Alterna Savings" >Alterna Savings</option>
                                                        <option value="BMO">BMO</option>
                                                        <option value="BMO-2">BMO-2</option>
                                                        <option value="CCEC 1.9">CCEC 1.9</option>
                                                        <option value="CCEC 1.6">CCEC 1.6</option>   <option value="CCEC Main">CCEC Main</option>
                                                        
                                                        <option value="CIBC" >CIBC</option>
                                                       <!-- <option value="IC Savings">IC Savings</option>-->
                                                       <option value="Meridian" >Meridian</option>
                                                       
                                                      
                                                    <option value="RBC">RBC</option>    
                                                        
                                                        <option value="Scotia">Scotia</option>
                                                         <option value="Scotia-2">Scotia-2</option>
                                                        <option value="TD">TD</option>
                                                       
                                                    </select>
                                                    <?php 
	}
}// num 
else
{
?>
<select name="bank_name" id="bank_name" <?php if($rwckf['e8']!=1)
{ ?>disabled <?php } ?> required>
                                                      <option value="">--Select Bank--</option>    <option value="CCEC 1.9">CCEC 1.9</option>
                                                        <option value="CCEC 1.6" >CCEC 1.6</option>   <option value="CCEC Main" >CCEC Main</option>
                                                      
                                                      </select>
<?php
}
	} // if
	?>                                        </td>
                                                    <td align="center">
                                                    <?php 
	if($rwc['bank_name']=='')												
	{												?>
                                                    <input type="submit" name="Submitd" id="Submitd" value="DEPOSITED" style="background-color: #008CBA; color: white;" <?php if($rwckf['e8']!=1)
{ ?>disabled <?php } ?>>
                                                    <?php
	}
	else
	{
													 ?><img src="images/accepted_48.png">
     <?php 
	}
	 ?>                                               </td>
                                                    <td align="center"><?php
$sqpr="select * from emt_tb,user_tb,admin_tb where user_tb.us_id=emt_tb.eu_id and emt_tb.ad_id=admin_tb.id and bank_name!='' and us_id='".$rwc['us_id']."' and emt_id!='".$rwc['emt_id']."' ORDER BY date_deposit desc limit 0,5";	
$respr=mysql_query($sqpr);
if(!$respr)
{
	die('error');
}
while($rwpr=mysql_fetch_array($respr))
  {
	  if($rwpr['date_deposit']!='0000-00-00')
	  {
$dt2=time();
$dt1=$rwpr['date_deposit'];
$mdt=strtotime($dt1);
$dd=($dt2-$mdt);
$diff=($dd/86400);
$diff1 = intval($diff);
//echo $diff1;
//echo '('. $diff1.' Days, $'.$rwpr['amount']." , ".$rwpr['bank_name'].') <br>';
$ar1=explode(" ",$rwpr['date_dd']);
$ar2=explode(":",$ar1[1]);
$arr=explode("-",$ar1[0]);
//echo $arr[2].'-'.$arr[1].'-'.$arr[0].' '.$rwpr['bank_name'].'<br>';
echo $arr[1].'-'.$arr[2].'-'.$arr[0].' '.$ar2[0].':'.$ar2[1].' '.$rwpr['bank_name'].' ('.strtoupper(substr($rwpr['uname'],0,1)).')<br>';
	  }
	  else
	  {
	  echo '( $'.$rwpr['amount']." , ".$rwpr['bank_name'].') <br>';
	  }
  }
													 ?></td>
                                                    <td height="30" align="center">
                        <?php 
if($rwckf['e8']==1)
{
?>                            <a href="edit_emt.php?id=<?php echo $rwc['emt_id'];?>">Edit</a>
<?php 
}
else
{
	echo '-';
}
?>
</td>
                                                    <td height="30" align="center">
                       <?php 
if($rwckf['e8']==1)
{
?>                                                <a href="manage_emt.php?delid=<?php echo $rwc['emt_id'];?>">X</a>
   <?php 
}
else
{
	echo '-';
}
?>                                                 
                                                    </td>
                                                  </tr>
       </form>    
                                              <?php 
											  $k++;
  }
  
  ?>
                                                </table>
											    <p>
                                                  <?php 
} // mysql_no_rows end
else
{
?>
                                                </p>
											    <p>&nbsp;</p>
											    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="30">No EMT found..!!</td>
                                                  </tr>
                                                </table>
											    <?php 
}
?>
                                                </p>
                                                <p></p>
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