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

<!--THIS IS THE ACTUAL START OF THE CHECKOUT PAGE -->

<!-- 	<?php
	//ESTABLISH ALL VARIABLES FROM ALL THE VALUES ENTERED TO THE UPDATE FORM
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"dbnightclass");
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
	?> -->

<div class="container">
	<div class="contact">
		<div class="col-md-10 contact-top">
				<h3>Please ensure that your delivery/shipping address is correct to avoid delays in delivery:</h3>
		</div>
	</div>
</div>	
		<div class="container">		
			<div class="col-md-4 col-md-offset-4 well">
				<div class="row">
						<div class="bill-to">
							<div class="form-one">
								<form name="form1" action="" method="post" >
									<input name="user_id" hidden value="<?php echo $id; ?>">
									<input type="text" placeholder="First Name" name="firstname" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]" style="width:350px; background-color: #CAC6D9">
									<input type="text" placeholder="Last Name" name="lastname" required pattern="[A-Za-z]+" title="please enter valid lastname[a-z only]" style="width:350px; background-color: #CAC6D9">
									<input type="text" placeholder="Email Address" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address" style="width:350px; background-color: #CAC6D9">
									<input type="text" placeholder="Contact Number" name="contactnumber" required pattern="[0-9]{12}" title="please enter valid contacet number[0-9 and 12 digit only]" style="width:350px; background-color: #CAC6D9">									
									<textarea cols="50" rows="10" placeholder="Shipping Address" name="billing" required style="width:350px; background-color: #CAC6D9"></textarea><br>
									<input type="submit" name="submit1" value="save" required style="background-color: white" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">

								</form>
							</div>
                       </div>	
				</div>
			</div>
		</div>		
		

		<?php

		if (isset($_POST['submit1'])) 
		{
		    $first = $_POST['firstname'];
		    $last = $_POST['lastname'];
		    $email = $_POST['email'];
		    $phone = $_POST['contactnumber'];
		    $billing = $_POST['billing'];    

		$link = mysqli_connect("localhost", "id3084560_sherwinromualdo","Au5573lvsme");
		mysqli_select_db($link,"id3084560_dbnightclass");
		mysqli_query($link,"INSERT INTO checkout_address(firstname, lastname, email, contact, address)
			                      values('$first', '$last', '$email', '$phone', '$billing')" );

 		$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
		while($row=mysqli_fetch_array($res))
		{
			$_SESSION["order_id"]=$row["id"];
		}
        ?>
		<script type="text/javascript">
				alert("Please click OK to transfer you to paypal");

				setTimeout(function(){
					window.location="paypal.php";
				},4000);

		</script>
		<?php
	    }
	    ?>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
        <!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>
</body>
</html>
</body>
</html>