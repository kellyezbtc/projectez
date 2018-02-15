<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from cheque_send_tb where cs_id='".$_REQUEST['delid']."'";
$resdel=mysql_query($sqdel,$conn);
if(!$resdel)
{
die('error');
}
}

if($_REQUEST['act']!='')
{
	$squp="update cheque_send_tb set c_status='".addslashes($_REQUEST['act'])."',cd_date='".date('Y-m-d')."' where cs_id='".$_REQUEST['id']."'";
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
<style>

/* The alert message box */
.alert {
    padding: 20px;
     background-color: #f2dede;
   color: #a94442;
    margin-bottom: 15px;
	font-weight:bold;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: red;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
</style>

<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
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
												<td style="line-height: 16px;"><p>&nbsp;</p><!--<div align="center" class="alert alert-danger" style="color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1; height:35px; padding-top:13px; font-weight:bold">Don't forget to mark any cheques as PAID that were deposited </div>-->
    <div class="alert" align="center">
  <span class="closebtn" onClick="this.parentElement.style.display='none';">&times;</span> 
Don't forget to mark any cheques as PAID that were deposited
</div>
												  <p>&nbsp;</p>
											    <p>
											      <?php 
$sqs="select * from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id and cheque_send_tb.c_status=0 ORDER BY cheque_send_tb.cs_id desc";

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{												
												?>
											    </p>
											    <table width="800" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="6"><strong>
                                                    Pending Cheque </strong>-<a href="pdf-pending-cheque.php" target="_blank"><strong>Display Pending Report</strong></a> | <?php 
$sqst="select sum(c_amount) as sm1 from cheque_send_tb,cheque_tb,user_tb where cheque_tb.ch_id=cheque_send_tb.chh_id and cheque_send_tb.csu_id=user_tb.us_id and cheque_send_tb.c_status=0 ORDER BY cheque_send_tb.cs_id desc";

$rest1=mysql_query($sqst,$conn);
if(!$rest1)
{
die('error in data'.mysql_error());
}													
$rwt1=mysql_fetch_array($rest1);
echo '<b>Total = </b>  $'.number_format($rwt1['sm1'],2,'.','');													?></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="116" align="center"><strong>UserName</strong></td>
                                                    <td width="137" align="center"><strong>First Name - Last Name</strong></td>
                                                    <td width="55" align="center"><strong>Amount</strong></td>
                                                    <td width="55" align="center"><strong>Status</strong></td>
                                                    <td width="64" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="84" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
	  $squ="select * from user_tb where us_id='".$rwc['wu_id']."'";
	  $resu=mysql_query($squ);
	  if(!$resu)
	  {
		  die('error in data');
	  }
	  $rwsu=mysql_fetch_array($resu);
  ?>
                                                  <tr>
                                                    <td align="center"><?php echo $rwc['username'];?></td>
                                                    <td align="center"><?php echo $rwc['f_name'];?>&nbsp; <?php echo $rwc['l_name'];?></td>
                                                    <td align="center"><?php echo $rwc['c_amount'];?></td>
                                                    <td align="center"><?php if($rwc['c_status']==0)
													{?>
                                                      <a href="create-cheque-pending.php?act=1&id=<?php echo $rwc['cs_id'];?>"> MARK PAID</a>
                                                      <?php
													} ?></td>
                                                    <td height="30" align="center"><a href="edit_create_cheque.php?id=<?php echo $rwc['cs_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="create-cheque-pending.php?delid=<?php echo $rwc['cs_id'];?>">Delete</a></td>
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
                                                    <td height="30"><strong>No Pending Cheques</strong></td>
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