<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if($_REQUEST['delid']!="")
{
$sqdel="delete from emt_tb where emt_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
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
                                <td id="side" style="width: 250px;" width="250">
                                   <?php require_once('left-menu.php'); ?>

                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                <td>
                                                    <strong>Problem EMT's </strong> 
                                                </td>
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;">
												  <?php 
		/* $sqfw="select * from flag_tb";
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
	}*/
												  
												  
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name='' and (nodash!='' or banknot!='' or wrongname!='' or uuser!='' or wrongamount!='' or misc!='' or derror!='') ORDER BY ac_date asc";
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
	 
											  while($rwc=mysql_fetch_array($res1))
  {
											
												?>
												
											      <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#AABFFF">
											        <tr>
											          <td width="62" height="20" align="center"><strong>Date</strong></td>
											          <td width="139" height="20" align="center"><strong>Name</strong></td>
											          <td width="128" height="20" align="center"><strong>Username</strong></td>
											          <td width="87" height="20" align="center"><strong>Amount</strong></td>
											          <td width="105" height="20" align="center"><strong>Link</strong></td>
											          <td width="156" height="20" align="center"><strong>Email</strong></td>
											          <td width="58" height="20" align="center"><strong>Edit</strong></td>
											          <td width="47" height="20" align="center"><strong>Delete</strong></td>
										            </tr>
                                                   
                                                    
											        <tr>
											          <td height="20" align="center"><?php 
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
											          <td height="20" align="center"><?php echo $rwc['f_name'];?>&nbsp;<?php echo $rwc['l_name'];?></td>
											          <td height="20" align="center"><?php echo $rwc['username'];?></td>
											          <td height="20" align="center"><?php echo $rwc['amount'];?></td>
											          <td height="20" align="center"><a href="<?php echo stripslashes($rwc['link']);?>" target="_blank">LINK</a></td>
											          <td height="20" align="center"><?php echo $rwc['email'];?></td>
											          <td height="20" align="center">
<?php 
if($rwckf['e9']==1)
{
?>                                                    <a href="edit_emt.php?id=<?php echo $rwc['emt_id'];?>">Edit</a>
<?php 
}
else
{
	echo '-';
}
?>
</td>
											          <td height="20" align="center">
                                                      
<?php 
if($rwckf['e9']==1)
{
?>                                                 <a href="problem_emt.php?delid=<?php echo $rwc['emt_id'];?>">X</a>
<?php 
}
else
{
	echo '-';
}
?>
</td>
										            </tr>
                                                    										        <tr>
											          <td height="15" colspan="8" align="left"><strong>Problem :</strong> <?php if($rwc['nodash']=='No Dashboard Request'){?> No Dashboard Request , <?php } ?><?php if($rwc['banknot']=='Bank Not in Profile'){?> Bank Not in Profile ,<?php } ?><?php if($rwc['wrongname']=='Wrong name'){?> Wrong name , <?php } ?> <?php if($rwc['uuser']=='Unknown User'){?> Unknown User , <?php } ?>  <?php if($rwc['wrongamount']=='Wrong Amount'){?> Wrong Amount , <?php } ?> <?php if($rwc['derror']=='Deposit Error'){?> Deposit Error , <?php } ?><?php if($rwc['misc']=='misc'){?> misc <?php } ?>
											          <br>
											            <strong>Comments :</strong> <?php echo $rwc['comments'];?></td>
										            </tr>
										          </table><br>

			<?php 
  } // while
													?>
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
                                                      <td height="30">No Problem EMT's</td>
                                                    </tr>
                                                  </table>
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