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
	$squp="update emt_tb set bank_name='".addslashes($_REQUEST['bank_name'])."' where emt_id='".$_REQUEST['eid']."'";
	$resup=mysql_query($squp);
	if(!$resup)
	{
		die('error in data');
	}
}
if($_REQUEST['act']!='')
{
	$squp="update emt_tb set paid='".addslashes($_REQUEST['act'])."' where emt_id='".$_REQUEST['id']."'";
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
											      <form name="form1" method="post" action="">
											        <table width="600" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
											          <tr>
											            <td height="30" colspan="2"><strong> SEARCH</strong></td>
										              </tr>
											          <tr>
											            <td width="90" height="30">Username</td>
											            <td width="497" height="30"><input name="usrch" type="text" id="usrch" size="50"></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Search"></td>
										              </tr>
										            </table>
										          </form>
											      <p>&nbsp;</p><?php 
												  /*
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id ORDER BY emt_id asc";
if(isset($_REQUEST['Submit']))
{
	
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and user_tb.username like '%".addslashes($_REQUEST['usrch'])."%' ORDER BY emt_id asc";
	}
	
$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{*/

// Paging Code Starts
		// how many rows to show per page 
		$rowsPerPage=100; 
		
		// by default we show first page 
		$pageNum = 1; 
		//echo "<br>PageNum :  ".$pageNum ;
		
		// if $_GET['page'] defined, use it as page number 
		if(isset($_GET['page'])) 
		{ 
			$pageNum = $_GET['page']; 
		} 
	
		// counting the offset 
		$offset = ($pageNum - 1) * $rowsPerPage; 
//$sq="select * from user";

//$srch=$_REQUEST['srch'];
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name!=''";
$sqs.=" ORDER BY date_dd desc LIMIT $offset, $rowsPerPage ";
if(isset($_REQUEST['Submit']))
{
$sqs="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name!='' and  user_tb.username like '%".addslashes($_REQUEST['usrch'])."%'";
$sqs.=" ORDER BY date_dd desc LIMIT $offset, $rowsPerPage ";
}

$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
//$rw=mysql_fetch_array($res);
$query="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name!=''";
if(isset($_REQUEST['Submit']))
{
$query="select * from emt_tb,user_tb where user_tb.us_id=emt_tb.eu_id and bank_name!='' and  user_tb.username like '%".addslashes($_REQUEST['usrch'])."%'";
}

					//print $query;
						$result  = mysql_query($query) or die('Error, query failed'); 
						//$row     = mysql_fetch_array($result, MYSQL_ASSOC); 
						//$numrows = $row['numrows'];
						$numrows = mysql_num_rows($result);
						
						// No of rows u need to assign
						//$numrows = 3; 
						//echo "<br>Numrows : ".$numrows ;
						
						// how many pages we have when using paging? 
						$maxPage = ceil($numrows/$rowsPerPage); 
						//echo "<br>Maximum Pages : ".$maxPage;
						
						// print the link to access each page 
						
						$self = $_SERVER['PHP_SELF'];
						//$D14=$_REQUEST['D14'];
						$nav = ''; 
						for($page = 1; $page <= $maxPage; $page++) 
						{ 
							if ($page == $pageNum) 
							{ 
								$nav .= " $page ";   // no need to create a link to current page 
							} 
							else 
							{ 
								$nav .= " <a href=\"$self?page=$page&D14=$D14\">$page</a> "; 
							}         
						} 
						
						// creating previous and next link 
						// plus the link to go straight to 
						// the first and last page 
						
						if ($pageNum > 1) 
						{ 
							$page = $pageNum - 1; 
							$prev = " <a href=\"$self?page=$page&D14=$D14\">[Prev]</a> "; 
							 
							$first = " <a href=\"$self?page=1&D14=$D14\">[First Page]</a> "; 
						}  
						else 
						{ 
							$prev  = '&nbsp;'; // we're on page one, don't print previous link 
							$first = '&nbsp;'; // nor the first page link 
						} 
						
						if ($pageNum < $maxPage) 
						{ 
							$page = $pageNum + 1; 
							$next = " <a href=\"$self?page=$page&D14=$D14\">[Next]</a> "; 
							 
							$last = " <a href=\"$self?page=$maxPage&D14=$D14\">[Last Page]</a> "; 
						}  
						else 
						{ 
							$next = '&nbsp;'; // we're on the last page, don't print next link 
							$last = '&nbsp;'; // nor the last page link 
						} 
						
						// print the navigation link 
						


?>

												
											
											    <table width="1050" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#AABFFF">
                                                  <tr>
                                                    <td height="30" colspan="9"><strong>Edit EMT's</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="30" colspan="9" align="center"><?php echo $first.$prev.$nav.$next.$last; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="86" height="30" align="center"><strong>NAME</strong></td>
                                                    <td width="167" height="30" align="center"><strong>USER NAME</strong></td>
                                                    <td width="98" height="30" align="center"><strong>AMOUNT </strong></td>
                                                    <td width="90" align="center"><strong>BANK DEPT GROUP</strong></td>
                                                    <td width="82" align="center"><strong>Dep Link&nbsp;</strong></td>
                                                    <td width="72" align="center"><strong>PAID</strong></td>
                                                    <td width="158" align="center"><strong>Date Deposited[Bank Name]</strong></td>
                                                    <td width="46" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="72" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php
												   $k=0; 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
     <form name="frm1" action="" method="post">                                             <tr <?php if($k%2==0){?>style="background-color:#f1f1f1;" <?php } ?>>
                                                    <td height="30" align="center"><?php echo $rwc['f_name'];?>&nbsp;<?php echo $rwc['l_name'];?></td>
                                                    <td height="30" align="center"><?php echo stripslashes($rwc['username']);?></td>
                                                    <td height="30" align="center"><?php echo $rwc['amount'];?></td>
                                                    <td align="center"><?php echo $rwc['bank_dep'];?></td>
                                                    <td align="center"><a href="<?php echo stripslashes($rwc['link']);?>" target="_blank">LINK</a>&nbsp;
                                                    <input type="hidden" name="eid" id="eid" value="<?php echo $rwc['emt_id'];?>"></td>
                                                    <td align="center">
                                                    <?php if($rwc['bank_name']==''){ echo  'Not Paid';?><!--<img src="images/cancel_48.png" width="48" height="48" border="0">-->
<?php } 
 if($rwc['bank_name']!=''){
	 echo 'Paid';
?>                                               
<!--<img src="images/accepted_48.png" width="48" height="48" border="0">--><?php
 }
											    ?>
                                               
                                               </td>
                                                    <td align="center">
													
													<?php
													 if($rwc['bank_name']!=''){ 
													 $ark=explode("-",$rwc['date_deposit']);
													 echo $ark['1']."-".$ark['2']."-".$ark['0'];?>&nbsp;[<?php echo $rwc['bank_name'];?>]&nbsp;[<?php $sqpr="select * from emt_tb,admin_tb where emt_tb.ad_id=admin_tb.id and bank_name!='' and  emt_id!='".$rwc['emt_id']."'";	
$respr=mysql_query($sqpr);
if(!$respr)
{
	die('error');
}
$rwpr=mysql_fetch_array($respr);
echo strtoupper(substr($rwpr['uname'],0,1));
													
													?>]<?php }?></td>
                                                    <td height="30" align="center"><a href="edit_emt.php?id=<?php echo $rwc['emt_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="manage_emt_paid.php?delid=<?php echo $rwc['emt_id'];?>">Delete</a></td>
                                                  </tr>
       </form>                                           <?php  $k++;
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