<?php session_start(); 

if(isset($_SESSION['fullname'])){
	$displayname = ($_SESSION['fullname']) ;
}else{
	$displayname = "Visitor";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>CAPSTONE2:ECOMMERCE -  Checkout </title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
<!--slider-script-->
		<script src="../js/responsiveslides.min.js"></script>
			<script>
				$(function () {
				  $("#slider1").responsiveSlides({
					auto: true,
					speed: 500,
					namespace: "callbacks",
					pager: true,
				  });
				});
			</script>
<!--//slider-script-->
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});	  
});
</script>
</head>
<body>
 <!--THIS HEADER CONTAINS THE SITE LOGO, LOGIN, REGISTER, MY WISHLIST, MY SHOPPING CART, CHECKOUT NAVIGATION BARS-->
	<div class="header">
		<div class="header-top">
			<div class="container">	
			<div class="header-top-in">			
				<div class="logo">
					<a href="index1.php"><img src="../images/celebrity_bazaar.png" alt=" "></a>
				</div>
				<div class="header-in">
					<ul class="icon1 sub-icon1">
							<li><a href="account_login.php"> LOGIN</a></li>
							<li><a href="account_register.php"> REGISTER</a></li>							
							<li><a href="#" >MY SHOPPING CART</a></li>
<!--MUST CONTAIN THE SETTINGS DROPDOWN OF THE LOGGED IN PERSON-->							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MY ACCOUNT<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-children"><a href="#"><?php echo $displayname;?></a></li> <!--THIS LEADS TO CUSTOMER DASHBOARD WHEN CLICKED-->
									<li class="dropdown-children"><a href="#" >MY SHOPPING CART</a></li>
						            <li class="dropdown-children"><a href="account_logout.php">LOGOUT</a></li>
						        </ul>    
						    </li>    
<!--END OF MY ACCOUNT DROPDOWN-->
							<li> <a href="checkout.php" >CHECKOUT</a> </li>		
						</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
<!--THIS IS THE END OF THE TOP HEADER CONTAINING THE SITE LOGO, LOGIN, REGISTER, MY WISHLIST, MY SHOPPING CART, CHECKOUT NAVIGATION BARS-->	

<!--THIS IS THE START OF CATEGORIES NAVIGATION BARS-->	
		<div class="header-bottom">
		<div class="container">
			<div class="h_menu4">
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav" >
					<li id="categories"><a href="products.php"><i> </i>ALL CATEGORIES</a></li>
					<li id="categories"><a href="#" >ELECTRONICS & GADGETS</a></li>					
					<li id="categories"><a href="products.php" >MEN'S FASHION</a></li>            
					<li id="categories"><a href="products.php" >WOMEN'S FASHION</a></li>						  				 
					<li id="categories"><a href="products.php" >HEALTH AND BEAUTY</a></li>					
				</ul>
				<script type="text/javascript" src="js/nav.js"></script>
			</div>
		</div>
		</div>
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
	<div class="container">
		<div class="check-out">
    	    <h4 class="title">Shopping cart is empty</h4>
    	    <p class="cart">You have no items in your shopping cart.<br>Click<a href="index1.php"> here</a> to continue shopping</p>
    	</div>

	</div>
		<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>