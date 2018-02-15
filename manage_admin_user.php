<?php 
session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php'); 

if($_REQUEST['delid']!="")
{
$sqdel="delete from admin_tb where id='".$_REQUEST['delid']."'";
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
                                <td colspan="2" id="header"><?php //require_once('header.php'); ?>
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 250px;" width="250"><?php require_once('left-menu.php');   if($rwckf['sadmin']!=1)
{
	header('location:welcome.php');
} ?></td>
                  <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody>
                                            <tr>
												<td style="line-height: 16px;"><p>&nbsp;</p>
											    <p>&nbsp;</p>
											    <p>
                                                  <?php
// Paging Code Starts
		// how many rows to show per page 
		$rowsPerPage=10; 
		
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
$sqs="select * from admin_tb where sadmin=0";
$sqs.=" ORDER BY id desc LIMIT $offset, $rowsPerPage ";


$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());
}
if(mysql_num_rows($res1)>0)
{
//$rw=mysql_fetch_array($res);
$query="select * from admin_tb where sadmin=0";


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
</p>
											    <table width="650" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="4"><strong>Manage Admin User</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="30" colspan="4" align="center"><?php echo $first.$prev.$nav.$next.$last; ?>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td width="37" height="30" align="center">Id</td>
                                                    <td width="271" height="30" align="center">Username</td>
                                                    <td width="96" height="30" align="center">Edit</td>
                                                    <td width="106" height="30" align="center">Delete</td>
                                                  </tr>
                                                  <?php 
  while($rwc=mysql_fetch_array($res1))
  {
  ?>
                                                  <tr>
                                                    <td height="30" align="center"><?php echo $rwc['id'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo stripslashes($rwc['uname']);?></td>
                                                    <td height="30" align="center"><a href="edit_admin_user.php?id=<?php echo $rwc['id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="manage_admin_user.php?delid=<?php echo $rwc['id'];?>">Delete</a></td>
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
                                                    <td>No Admin User found..!!</td>
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