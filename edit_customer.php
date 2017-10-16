<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "header.php";
include "menu.php";

$link=mysqli_connect("localhost","id3084560_sherwinromualdo","Au5573lvsme");
mysqli_select_db($link,"id3084560_dbnightclass");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from users2_tbl where user_id = $id");
while ($row=mysqli_fetch_array($res))
{
   $user_id=$row["user_id"];
   $user_uname=$row["user_uname"];   
   $user_first=$row["user_first"];
   $user_last=$row["user_last"];
   $phone=$row["phone"];
   $billing=$row["billing"];
   $shipping=$row["shipping"];
}
?>
<form name="form1" action="edit_customer_exec.php" method="post" enctype="multipart/form-data">
<div class="grid-10">
	<div class="box round first">
		<h1>Edit Details of Active Customers</h1>
		<div class="block">
				<table border="1">
				<tr>	
					<td>USER ID (do NOT edit this!)</td>
					<td><input type="text" name="user_id" value="<?php echo $user_id; ?>"></td>
				</tr>
				<tr>	
					<td>User Name</td>
					<td><input type="text" name="user_uname" value="<?php echo $user_uname; ?>"></td>
				</tr>
				<tr>	
					<td>First Name</td>
					<td><input type="text" name="user_first" value="<?php echo $user_first; ?>"></td>
				</tr>

				<tr>	
					<td>Last Name</td>
					<td><input type="text" name="user_last" value="<?php echo $user_last; ?>"></td>
				</tr>

				<tr>	
					<td>Phone Number</td>
					<td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>
				</tr>

				<tr>	
					<td>Billing Address</td>
					<td><textarea cols="50" rows="10" name="billing"> <?php echo $billing; ?></textarea></td>
				</tr>
				<tr>	
					<td>Shipping Address</td>
					<td><textarea cols="50" rows="10" name="shipping"> <?php echo $shipping; ?></textarea></td>
				</tr>				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="APPLY THE UPDATES"></td>
				</tr>	
			</table>
			   
	    </div>
	</div>
</div>
</form>

<div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
Copyright © 2017 Sherwin Romualdo under Creative Commons Attribution 3.0 unported
    </p>
</div>
</body>
</html>