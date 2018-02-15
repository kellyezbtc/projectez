<?php
@session_start();
 require_once('conn.php');
  require_once('chksess.php');
  if(isset($_REQUEST['Submit']))
  {
	  if($_FILES['i_fname']['name']!="")
{
$num=rand(2,90).rand(56,78);
$fname=$num.$_FILES['i_fname']['name'];
move_uploaded_file($_FILES['i_fname']['tmp_name'],$path.$fname);
}
  	  //$sqin="insert into incoming_wires_tb(iu_id,wire_info,i_bank,rec_prov,i_amount,rec_dash,i_comment,i_file,idate) values('".addslashes($_REQUEST['iu_id'])."','".addslashes($_REQUEST['wire_info'])."','".addslashes($_REQUEST['i_bank'])."','".addslashes($_REQUEST['rec_prov'])."','".addslashes($_REQUEST['i_amount'])."','".addslashes($_REQUEST['rec_dash'])."','".addslashes($_REQUEST['i_comment'])."','".$fname."','".date('Y-m-d')."')";
	  $sqin="update incoming_wires_tb set wire_info='".addslashes($_REQUEST['wire_info'])."',i_bank='".addslashes($_REQUEST['i_bank'])."',rec_prov='".addslashes($_REQUEST['rec_prov'])."',i_amount='".addslashes($_REQUEST['i_amount'])."',rec_dash='".addslashes($_REQUEST['resh_dash'])."',i_comment='".addslashes($_REQUEST['i_comment'])."'";
	    if($_FILES['i_fname']['name']!="")
{
	$sqin.=",i_fname='".$fname."'";
}
$sqin.=" where iw_id='".$_REQUEST['id']."'";
	  $resin=mysql_query($sqin);
	  if(!$resin)
	  {
		  die('error'.mysql_error());
	  }
	  header('location:search_incoming_wires.php');
  }
   $sqs="select * from incoming_wires_tb where iw_id='".$_REQUEST['id']."'";
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
											      <form action="" method="post" enctype="multipart/form-data" name="form1">
											        <p>&nbsp;</p>
											        <table width="550" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
					<?php 
													if($_REQUEST['act']=='done')
													{
													?>
                                                      <tr>
                                                        <td height="30" colspan="2" class="warning">Your Details Added..!!</td>
                                                      </tr>
                                                      <?php 
													}
													  ?>						          <tr>
											            <td height="30" colspan="2"><strong>Incoming Wires</strong></td>
										              </tr>
											          <tr>
											            <td width="146" height="30">SELECT USERNAME</td>
											            <td width="384" height="30"><!--<select name="iu_id" id="iu_id">
             <?php 
			 $squ="select * from user_tb order by username asc";
			 $resu=mysql_query($squ);
			 if(!$resu)
			 {
				 die('error in data');
			 }
			 while($rwu=mysql_fetch_array($resu))
			 {
			 ?>                          <option value="<?php echo $rwu['us_id'];?>" <?php if($rw['us_id']==$rws['iu_id']){?> selected <?php } ?>><?php echo $rwu['username'];?>---<?php echo $rwu['f_name'];?>&nbsp;<?php echo $rwu['l_name'];?></option>
             <?php 
			 }
			 ?>
										                </select>-->
                                                         <?php 
			 $squ="select * from user_tb where us_id='".$rws['iu_id']."'";
			 $resu=mysql_query($squ);
			 if(!$resu)
			 {
				 die('error in data');
			 }
			$rwu=mysql_fetch_array($resu);
			echo $rwu['username'];
			 ?>
                                                        </td>
										              </tr>
											          <tr>
											            <td height="30">Wire Info Sent To User</td>
											            <td height="30"><input name="wire_info" type="checkbox" id="wire_info" value="1" <?php if($rws['wire_info']==1){?>checked <?php } ?>></td>
										              </tr>
											          <tr>
											            <td height="30">Bank&nbsp;</td>
											            <td height="30"><input name="i_bank" type="text" id="i_bank" size="50" value="<?php echo stripslashes($rws['i_bank']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">Receipt Provided&nbsp;</td>
											            <td height="30"><input name="rec_prov" type="checkbox" id="rec_prov" value="1" <?php if($rws['rec_prov']==1){?>checked <?php } ?>></td>
										              </tr>
											          <tr>
											            <td height="30">Amount on Receipt</td>
											            <td height="30"><input name="i_amount" type="text" id="i_amount" size="50" value="<?php echo stripslashes($rws['i_amount']);?>"></td>
										              </tr>
											          <tr>
											            <td height="30">Receipt Matches Dashboard&nbsp;</td>
											            <td height="30"><input name="rec_dash" type="checkbox" id="rec_dash" value="1" <?php if($rws['rec_dash']==1){?>checked <?php } ?>></td>
										              </tr>
											          <tr>
											            <td height="30">Comment</td>
											            <td height="30"><textarea name="i_comment" cols="50" id="i_comment"><?php echo stripslashes($rws['i_comment']);?></textarea></td>
										              </tr>
											          <tr>
											            <td height="30">Attach File</td>
											            <td height="30"><input type="file" name="i_fname" id="i_fname"></td>
										              </tr>
											          <tr>
											            <td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="EDIT"></td>
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