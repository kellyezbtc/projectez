<?php 
@session_start();
 require_once('conn.php');
$sqckf="select * from admin_tb where id='".$_SESSION['uid']."'";
$resckf=mysql_query($sqckf);
if(!$resckf)
{
die('error');
}
$rwckf=mysql_fetch_array($resckf);
?>
<table border="0" cellpadding="5" cellspacing="0" width="200">
<tbody>

   <!-- <tr>
        <td align="center">
            <a href="welcome.php">Home</a>        </td>
    </tr> -->     
 
<?php 
if($rwckf['sadmin']==1)
{
?>
    <tr>
      <td align="center"><a href="welcome.php" >Home</a> | <a href="logout.php">Logoff&nbsp;</a></td>
    </tr>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">ADMIN USER</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><a href="manage_admin_user.php">Manage Admin Users</a><br />
              <a href="add_admin_user.php">Add Admin User</a><br />
             <br /></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <?php 
}
	?>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">USERS</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><a href="manage_footer_header.php"></a>
            <?php 
			if($rwckf['u1']==1)
{
			?>
            <a href="manage_user.php">Manage Users</a><br />
              <a href="add_user.php">Add Users</a><br />
              <?php 
}
if($rwckf['c4']==1)
{
			  ?>
               <a href="add_cheque.php">Add Cheque Profile</a><br />
               <?php
}
if($rwckf['c5']==1)
{
			    ?>
   <a href="search_cheque.php"> 
Search Cheques Profile</a><br /><?php 
}
?>
              </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">EMT's</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
            <?php 
			if($rwckf['e1']==1)
{
			?>
            <a href="add_emt.php">Add EMT's</a><br />
            <?php 
}
if($rwckf['e2']==1)
{
			?>
              <a href="manage_emt.php">Pending EMT's</a><br />
              <?php 
}
if($rwckf['e3']==1)
{
			  ?>     
                 <a href="dave-10.php">Dave 10k</a><br /> 
                 <?php 
}
if($rwckf['e4']==1)
{
				 ?>
                    <a href="manage_emt_paid.php">Edit EMT's</a><br />    <?php 
}
					?>
                      <?php 
//}
if($rwckf['e5']==1)
{
				 ?>
                    
                     <a href="flag_words.php">Flagged Words</a><br />

                     <?php
}
					  ?>
                          <?php 
//}
if($rwckf['e6']==1)
{
				 ?>
                    
                     <a href="deposit_report.php">Deposit Reports</a><br />

                     <?php
}
					  ?>
                        <?php 
//}
if($rwckf['e7']==1)
{
				 ?>
                    
                     <a href="problem_emt.php">Problem EMT's</a><br />

                     <?php
}
					  ?>
                     </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">WIRES</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
            <?php
			if($rwckf['w1']==1)
{
			 ?>
            <a href="create-wire.php">Create Wire Send</a><br /> 
            <?php 
}
if($rwckf['w2']==1)
{
			?>
            <a href="create-wire-pending.php">Pending Wires</a><br />
            <?php 
}
if($rwckf['w3']==1)
{
			?>
             <a href="search-create-wire-pending.php">Search Wires</a><br /><?php }
			 if($rwckf['w4']==1)
{
			 
			 ?>
            
               <!--  <a href="manage_wires.php">Pending Wires</a><br />--><a href="add_wires.php">Add Wire Receiver (Profile)</a><br />
               <?php 
}
			   if($rwckf['w5']==1)
{
			   ?>
                 <a href="search_wires.php">Manage Wire Receiver(Profile)</a><br /> <?php } ?>
</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">CHEQUE</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
            <?php 
			if($rwckf['c1']==1)
{
			?>
            <a href="add_cheque_send.php">Issue Cheque</a><br />
            <?php 
}
if($rwckf['c2']==1)
{
			?>
            <a href="create-cheque-pending.php">Pending Cheque</a><br />
            <?php 
}
if($rwckf['c3']==1)
{
			?>
            <a href="search-create-cheque-pending.php">Search Cheque</a><br /> <?php 
}
			?>
             
              </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#f0f0f0"><span class="special">Incoming Wires</span></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
            <?php 
			if($rwckf['i1']==1)
{
			?>
            <a href="add_incoming_wires.php">Incoming Wires</a><br />
            <?php 
}
if($rwckf['i2']==1)
{
			?>
<a href="pending_incoming_wires.php">Pending Incoming Wires</a><br />
<?php 
}
if($rwckf['i3']==1)
{
?>
              <a href="search_incoming_wires.php">Search Incoming Wires</a><br />
              <?php 
}
			  ?>
              
              </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr> 
        <td>
        <table bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="1" width="100%">
        <tbody>
            <tr> 
				<td bgcolor="#f0f0f0"><span class="special">MISC</span></td>
            </tr>
			<tr>
				<td bgcolor="#ffffff">
                 <a href="manage_footer_header.php"></a>
                 <?php 
				 if($rwckf['sadmin']==1)
{
				 ?>
                 <a href="change-pass.php">Change Password</a><br>
                 <?php 
}
				 ?>
			  <a href="logout.php">Signout</a><br>			  </td>
			</tr>
        </tbody>
        </table>        </td>
    </tr> 
</tbody>
</table>
