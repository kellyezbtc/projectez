<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from incoming_wires_tb where iw_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}
if($_REQUEST['act']!='')
{
	$squp="update incoming_wires_tb set i_status='".addslashes($_REQUEST['act'])."' where iw_id='".$_REQUEST['id']."'";
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
												  <p>&nbsp;</p>
                                                <?php
												
$sqs="select * from user_tb,incoming_wires_tb where user_tb.us_id=incoming_wires_tb.iu_id and i_status=0 ORDER BY incoming_wires_tb.iw_id asc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												 ?>
											    <table width="800" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="7"><strong>Pending  Incoming Wires</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="120" height="30" align="center"><strong>Username</strong></td>
                                                    <td width="118" height="30" align="center"><strong> Name</strong></td>
                                                    <td width="110" height="30" align="center"><strong>Amount</strong></td>
                                                    <td width="110" align="center"><strong>Receipt  </strong></td>
                                                    <td width="90" align="center"><strong>Sent To Bank</strong></td>
                                                    <td width="77" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="115" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                  <tr>
                                                    <td height="30" align="center"><?php echo $rwc['username'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo stripslashes($rwc['f_name']);?>&nbsp;<?php echo $rwc['l_name'];?></td>
                                                    <td height="30" align="center"><?php echo $rwc['i_amount'];?></td>
                                                    <td align="center"><?php if($rwc['rec_prov']==1){?><a href="<?php echo $dispath.$rwc['i_fname'];?>" target="_blank">YES</a><?php } else { echo 'NOT YET'; }?></td>
                                                    <td align="center"><?php echo $rwc['i_bank'];?></td>
                                                    <td height="30" align="center"><a href="edit_incoming_wires.php?id=<?php echo $rwc['iw_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="search_incoming_wires.php?delid=<?php echo $rwc['iw_id'];?>">Delete</a></td>
                                                  </tr>
                                                  <?php 
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
                                                    <td>No Incoming Wires found..!!</td>
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