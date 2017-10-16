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
$id = $_SESSION['user_id'];


$host = "localhost";
$username = "id3084560_sherwinromualdo";
$password = "Au5573lvsme";
$dbname = "id3084560_dbnightclass";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * from users2_tbl WHERE user_id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

   $id = $row["user_id"];
   $user_uname=$row["user_uname"];   
   $user_first=$row["user_first"];
   $user_last=$row["user_last"];
   $user_email=$row["user_email"];
   $phone=$row["phone"];
   $billing=$row["billing"];
   $shipping=$row["shipping"];
?>	

<body>	

<?php
if(isset($_GET['msg'])){
	$errorMsg = $_GET['msg'];
        echo "<div class='alert alert-success alert-dismissable fade-in'>
        	  <a href='add_record.php'>
	          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Record Added</div>";
}else{
	$msg=" ";
	}
?>

<!--START OF THE LEFT HALF OF THE PAGE-->

<div class="container">
	<div class="contact">
		<div class="col-md-6 contact-top">
	        <h3>PLEASE REVIEW YOUR ACCOUNT DETAILS</h3>

				<div class="container">
					<form class="form-horizontal" method="POST" action="">
					<input type="text" value="<?php echo $id ?>" hidden name="user_id">
					<div class="form-group">
					    <label class="control-label col-sm-2" for="user_last">Last Name:</label>
					    <div class="col-sm-10"><?php echo $user_last ?></div>
					</div>

					<div class="form-group">
					    <label class="control-label col-sm-2" for="user_first">First Name:</label>
					    <div class="col-sm-10"><?php echo $user_first ?></div>
					</div>
					
					<div class="form-group">
					    <label class="control-label col-sm-2" for="email">Email Address:</label>
					    <div class="col-sm-10"><?php echo $user_email ?></div>
					</div>

					<div class="form-group">
					    <label class="control-label col-sm-2" for="user_uname">Current User Name:</label>
					    <div class="col-sm-10"><?php echo $user_uname ?></div>
					</div>

					<div class="form-group">
					    <label class="control-label col-sm-2" for="phone">Phone Number:</label>
					    <div class="col-sm-10"><?php echo $phone ?></div>
					</div>	

					<div class="form-group">
					    <label class="control-label col-sm-2" for="billing">Current Billing Address:</label>
					    <div class="col-sm-10"><?php echo $billing ?></div>
					</div>		

					<div class="form-group">
					    <label class="control-label col-sm-2" for="shipping">Current Shipping Address:</label>
					    <div class="col-sm-10"><?php echo $shipping ?></div>
					</div>		

					 <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2"><a href="edit_own_account.php">CLICK TO UPDATE YOUR DETAILS</a></button>
					   </div>
					 </div>	 


					<div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2"> <a href="contact.php">I'M THINKING OF DEACTIVATING MY ACCOUNT</a></button>
					   </div>
					 </div>	
					</form>
				</div>
			</div>			
<!--END OF THE LEFT HALF OF THE PAGE-->

<!--START OF THE RIGHT HALF OF THE PAGE-->

	<div class="col-md-6 contact-top">
		<h3>Please Change Your Username and Password Here</h3>
			<form method="POST" action="customer_account_dashboard.php">
				Username: <input type="text" value="<?php echo $_SESSION['user_uname'] ;?>" name="uname" required><br>
				Password: <input type="text" name = "pwd" placeholder="Password" required><hr>
				<button type="submit" name="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2"> Update</button>
			</form>
	</div>	

<?php

$id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

require_once "../includes/dbconnect.php";
    //Hashing the password
    $hashedPwd = md5($pwd);
    //Insert the user into the database
    $sql = "UPDATE users2_tbl 
            SET user_uname = '$uname',
                user_pwd = '$hashedPwd'
            WHERE user_id=$id";
    $result = mysqli_query ($conn,$sql);
            
    if ($result){
		echo "Update Successful! The next time you login,please use your new username and/or password";
    }
    else{
        echo "Update failed";
    }
}
?>
	</div>
</div>	


<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>