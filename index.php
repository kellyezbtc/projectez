<?php 
@session_start();
require_once('conn.php'); ?>
<?php 
if(isset($_REQUEST['Submit']))
{
$sqck="select * from admin_tb where uname='".mysql_real_escape_string($_REQUEST['txtuname'])."' and pass='".mysql_real_escape_string($_REQUEST['txtpass'])."'";
$resck=mysql_query($sqck);
if(!$resck)
{
die('error');
}
if(mysql_num_rows($resck)>0)
{
$rwck=mysql_fetch_array($resck);
$_SESSION['uid']=$rwck['id'];
$_SESSION['uname']=$rwck['uname'];
if($rwck['uname']==1)
{
header('location:add_emt.php');
}
else
{
header('location:welcome.php');	
}
}
else
{
$flag=2;
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>
	Untitled Page
</title>
 
<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script language="javascript">
function valid()
{
if(document.frm1.txtuname.value=="")
{
alert('Enter User-ID');
document.frm1.txtuname.focus();
return false;
}
if(document.frm1.txtpass.value=="")
{
alert('Enter Password');
document.frm1.txtpass.focus();
return false;
}
}
</script>

</head><body>
  <form action="index.php" method="post" name="frm1" id="frm1" onSubmit="return valid();">

<div style="padding-top: 150px;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td align="center" valign="middle"><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td><table style="border-collapse: collapse;" border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="1" width="400">
                    <tbody>
                      <tr>
                        <td><table style="border: 1px solid rgb(204, 204, 204);" border="0" cellpadding="0" cellspacing="0" width="388">
                            <tbody>
                              <tr>
                                <td><img src="images/login_r3_c3.jpg" name="ctl00_Image1" id="ctl00_Image1" style="border-width: 0px;"></td>
                              </tr>
                              <tr>
                                <td align="left"><table border="0" cellpadding="5" cellspacing="1" width="100%">
                                    <tbody>
                                    <?php 
									if($flag==2)
									{
									?>
                                      <tr>
                                        <td colspan="2" align="center" class="warning02">Please Enter Valid Login Details</td>
                                      </tr>
                                      <?php 
									  }
									  ?>
                                      <tr>
                                        <td colspan="2" align="center"><br>
                                          Please enter your email and password below.<br></td>
                                      </tr>
                
                                      <tr>
                                        <td align="right">User ID:</td>
                                        <td><input style="background-color: rgb(221, 234, 248);" title="PayPal Plug In can fill this form for you. Click the PayPal button in the toolbar." class="form_text" id="txtuname" name="txtuname">
                                            <script language="JavaScript" type="text/javascript">
            document.getElementById('txtuname').focus();
          </script></td>
                                      </tr>
                                      <tr>
                                        <td align="right">Password:</td>
                                        <td><input class="form_text" id="txtpass" name="txtpass" type="password"></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td><input class="buttons" value="Authorize me" name="Submit" type="submit" id="Submit"></td>
                                      </tr>
                                      <tr>
                                        <td style="height: 30px;">&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td style="height: 30px;" valign="middle">&nbsp;</td>
              </tr>
            </tbody>
        </table></td>
      </tr>
    </tbody>
  </table>
</div>    
</form>
</body></html>