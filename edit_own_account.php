<?php include "../includes/header.php";?>
<!-- <?php
if($_SESSION["session_id"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="account_login.php";
    </script>
<?php

}

?> -->
<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->

		<div class="header-bottom-in">
		<div class="container">
		<div class="header-bottom-on">
<!--THIS PART MUST BE SOFT-CODED IN PHP-->			
		<?php echo "<p class='wel'>Welcome $displayname and enjoy your shopping!</p>";  ?>
		</div>
		</div>
		</div>
	</div>
<!--THIS THE ACTUAL SECTION FOR THIS PAGE. SHOULD ONLY BE ACCESSIBLE WHEN SESSIONS ARE ACTIVE-->


<?php
//ESTABLISH ALL VARIABLES FROM ALL THE VALUES ENTERED TO THE UPDATE FORM
$link=mysqli_connect("localhost","id3084560_sherwinromualdo","Au5573lvsme");
mysqli_select_db($link,"id3084560_dbnightclass");
$id=$_SESSION["user_id"];
$res=mysqli_query($link,"select * from users2_tbl where user_id = $id");
while ($row=mysqli_fetch_array($res))
{
   $id=$row["user_id"];
   $user_uname=$row["user_uname"];   
   $user_first=$row["user_first"];
   $user_last=$row["user_last"];
   $user_email=$row["user_email"];
   $phone=$row["phone"];
   $billing=$row["billing"];
   $shipping=$row["shipping"];
}
?>

<div class="container">
<div class="jumbotron">

<form name="form1" action="edit_own_account_exec.php" method="post" enctype="multipart/form-data">
<div class="grid-10">
	<div class="box round first">
		<h3>Please Edit Your Details Here</h3>
		<div class="block">
				<table border="1">
				<tr>	
					<td><input name="user_id" hidden value="<?php echo $id; ?>"></td>
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


</div>
</div>
<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>
