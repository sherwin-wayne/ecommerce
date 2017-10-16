<?php include "../includes/header.php";?>
<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->

<?php
if(isset($_GET['msg1'])){
  $alertMsg = $_GET['msg1'];
  $register = "<div class='alert alert-success alert-dismissable' role='alert'>
      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>You've Successfully Registered! Please Log In with Your Credentials.</div>";
}else{
  $register =" ";
  }
?>

<?php
if(isset($_GET['msg2'])){
  $alertMsg = $_GET['msg2'];
  $logout = "<div class='alert alert-success alert-dismissable' role='alert'>
      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>You've Logged Out. See You Soon!</div>";
}else{
  $logout =" ";
  }
?>

		<div class="header-bottom-in">
		<div class="container">
		<div class="header-bottom-on">
<!--THIS PART MUST BE SOFT-CODED IN PHP-->			
			<?php echo "<p class='wel'>Welcome $displayname and enjoy your shopping!</p>";  ?>

			<div class="clearfix"></div>
		</div>
		</div>
		</div>
	</div>

<!--THIS IS THE START OF THE CUSTOMER LOGIN PAGE -->

<div class="container">
		<div class="account">
			<h2 class="account-in">REGISTERED CUSTOMERS PLEASE LOGIN HERE:</h2>
			<?php echo $register; ?>
			<?php echo $logout; ?>			
			<div class="container">
			    <div class="row">
		 	       <div class="col-md-4 col-md-offset-4 well">
			            <form role="form" action="account_login_exec.php" method="post" name="loginform">
			                <fieldset>
			                    <legend>Login</legend>
			                    
			                    <div class="form-group">
			                        <label for="uname">Username or Email</label>
			                        <input type="text" name="uname" placeholder="Enter Your User Name or Email" required class="form-control">
			                    </div>

			                    <div class="form-group">
			                        <label for="pwd">Password</label>
			                        <input type="password" name="pwd" placeholder="Enter Your Password" required class="form-control">
			                    </div>

			                   <button type="submit" name="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">LOGIN</button>
			                </fieldset>
			            </form>
		            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		        </div>
		    </div>    
	     </div>

	</div>
</div>

<!--THIS IS THE START OF THE CUSTOMER REGISTRATION PAGE -->
	
		<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>		
		