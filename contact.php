<?php include "../includes/header.php";?>
<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->	
<!-- <?php
session_start();
if(!isset($id))
{
?>
<script type="text/javascript">
window.location="account_login.php";
</script>
<?php
}
?> -->

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

<?php

$id = $_SESSION['user_id'];


$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";
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


<!--START OF THE LEFT HALF OF THE PAGE-->
		<div class="container">
			<div class="contact">
			<h2 class=" contact-in">CONTACT</h2>				
				<div class="col-md-6 contact-top">
					<h3>Info</h3>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
					</div>
					
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas </p>
					<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id </p>				
					<ul class="social ">
						<li><span><i > </i>1234 Citiland Grand Central, 48 Arnaiz Street, Mandaluyong City 1550</span></li>
						<li><span><i class="down"> </i>+63 935-820-5526</span></li>
						<li><a href="mailto:sherwin.recto.romualdo@gmail.com"><i class="mes"> </i>sherwin.recto.romualdo@gmail.com</a></li>
					</ul>
				</div>
<!--END OF LEFT HALF OF THE PAGE-->


<!--START OF THE RIGHT HALF OF THE PAGE-->
				<div class="col-md-6 contact-top">
					<h3>We Want to Hear From You!</h3>
						<form class="form-horizontal" method="POST" action="feedback.php">
	                        <input type="text" value="<?php echo $id ?>" hidden name="user_id">
						<div>
							<span>Your Name </span>		
							<input type="text" name="name" value="<?php echo $user_first." ".$user_last ?>" >						
						</div>
						<div>
							<span>Your Email </span>		
							<input type="text" name="email" value="<?php echo $user_email ?>" >						
						</div>
						<div>
							<span>Select Subject</span>		
							<select name = "subject" onchange="showMe()" id="select_category">
								<option value="Shipping & Delivery">Shipping & Delivery</option>
								<option value="Returns & Refunds">Returns & Refunds</option>
								<option value="Orders & Payment">Orders & Payment</option>
								<option value="Vouchers & Promotions">Vouchers & Promotions</option>
								<option value="Account Cancellation">Account Cancellation</option>								
							</select>	
						</div>
						<div>
							<span>Your Message</span>		
							<textarea name="message" required> </textarea>	
						</div>
						<input type="submit" name="feedback" value="SEND" >	
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>

<!--END OF THE RIGHT HALF OF THE PAGE-->

<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>