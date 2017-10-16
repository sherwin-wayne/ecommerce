<?php include "../includes/header.php";?>

<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->

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

<!--THIS IS THE START OF THE CUSTOMER REGISTRATION PAGE -->
<div class="container">
		<div class="account">
			<h2 class="account-in">REGISTERED CUSTOMERS PLEASE LOGIN HERE:</h2>

			<div class="container">
			    <div class="row">
		 	       <div class="col-md-8 col-md-offset-2 well">

			<div class="container">
					<div class="account">
						<?php
						$error = false;
						?>

						<div class="container">
						    <section class="main-container">
									<div class="main-wrapper">
										<h4><strong>PLEASE ENTER YOUR DETAILS<strong></h4>
										<form class="signup-form" action="account_register_exec.php" method="POST">
											<input type="text" name="first" placeholder="Firstname" required>
											<input type="text" name="last" placeholder="Lastname" required>
											<input type="text" name="email" placeholder="E-mail" required>
											<input type="text" name="phone" placeholder="Phone Number" required>
											<textarea name="billing" placeholder="Billing Address" required></textarea>
											<textarea name="shipping" placeholder="Shipping Address" required></textarea>
											<input type="text" name="uname" placeholder="Username" required> 
											<input type="password" name="pwd" placeholder="Password" required><br>
											<button type="submit" name="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">Sign up</button>
										</form>
									</div>
						    </section>
				        </div>
		            </div>
		    </div>
</div>
</div>


	
<!--THIS IS THE END OF THE CUSTOMER REGISTRATION PAGE -->
	
		<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>		
		