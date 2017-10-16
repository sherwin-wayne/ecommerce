<?php session_start(); 

if(isset($_SESSION['fullname'])){
	$displayname = ($_SESSION['fullname']) ;
}else{
	$displayname = "Visitor";
}

?>

<?php
$id = $_GET["id"];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "youtube_project");

if (isset($_POST["submit1"])) {
    $d = 0;
    if (is_array($_COOKIE['item'])) //this is for checking cookies available or not
    {

        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    //to get item description from table
    $res3 = mysqli_query($link, "select * from product where id=$id");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $prize = $row3["product_price"];
        $qty = "1";
        $total = $prize * $qty;
    }

    if (is_array($_COOKIE['item']))  //this is for check cookies are available or nor
    {
        foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0])      //this is for check same cookies available or not if available then increase qty
            {
                //check here for quantity add in the cart for more than available quantity
                $found = $found + 1;
                $qty = $values11[3] + 1;

                $tb_qty;
                $res = mysqli_query($link, "select * from product where product_image='$img1'");
                while ($row = mysqli_fetch_array($res)) {
                    $tb_qty = $row["product_qty"];
                }

                if ($tb_qty < $qty) {
                    ?>
                    <script type="text/javascript">
                        alert("this much quantity not available");
                    </script>
                    <?php

                } else {

                    $total = $values11[2] * $qty;
                    setcookie("item[$name1]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);
                }
            }

        }

        if ($found == 0) {
            $tb_qty;
            $res = mysqli_query($link, "select * from product where product_image='$img1'");
            while ($row = mysqli_fetch_array($res)) {
                $tb_qty = $row["product_qty"];
            }

            if ($tb_qty < $qty) {
                ?>
                <script type="text/javascript">
                    alert("this much quantity not available");
                </script>
                <?php

            } else {

                setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);//new

            }
        }

    } else {
        $tb_qty;
        $res = mysqli_query($link, "select * from product where product_image='$img1'");
        while ($row = mysqli_fetch_array($res)) {
            $tb_qty = $row["product_qty"];
        }

        if ($tb_qty < $qty) {
            ?>
            <script type="text/javascript">
                alert("this much quantity not available");
            </script>
            <?php

        } else {
            setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);//new
        }
    }


}

?>



<!DOCTYPE html>
<html>
<head>
<title>CAPSTONE2:ECOMMERCE -  Products Displayed Individually/By Themselves</title>
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

<!--THIS IS RESPONSIBLE FOR THE CLASSY-LOOKING MAGNIFYING GLASS TYPE OF INSPECTION-->
<link rel="stylesheet" href="../css/etalage.css">
<script src="../js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

<!--END OF THAT MAGNIFYING GLASS EFFECT-->

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
									<li class="dropdown-children"><a href="customer_account_dashboard.php
"><?php echo $displayname;?></a></li> <!--THIS LEADS TO CUSTOMER DASHBOARD WHEN CLICKED-->
									<li class="dropdown-children"><a href="#" >MY SHOPPING CART</a></li>
						            <li class="dropdown-children"><a href="account_logout.php">LOGOUT</a></li>
						        </ul>    
						    </li>    
<!--END OF MY ACCOUNT DROPDOWN-->
							<li > <a href="checkout.php" >CHECKOUT</a> </li>		
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
				<script type="text/javascript" src="../js/nav.js"></script>
			</div>
		</div>
		</div>
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
	<!---->
            <?php
            $res = mysqli_query($link, "select * from product where id=$id");
            while ($row = mysqli_fetch_array($res))
            {
            ?>

            <!-- here -->


            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="../admin/<?php echo $row["product_image"]; ?>" alt=""/>

                        </div>


                    </div>


                    <form name="form1" action="" method="post">
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>

                                <h2><?php echo $row["product_name"]; ?></h2>

                                <p>Web ID: <?php echo $row["id"]; ?></p>
								
								<span>
									<span>US $<?php echo $row["product_price"]; ?></span>
									<label>Quantity:</label>
									<input type="text" value="1"/>
									<button type="submit" name="submit1" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
								</span>

                                <p><b>Availability:</b> <?php echo $row["product_qty"]; ?></p>

                                <p><b>Condition:</b> New</p>


                            </div>
                            <!--/product-information-->
                        </div>
                </div>
                <!--/product-details-->
                </form>
                <!-- end here-->

                <?php

                }
                ?>


		<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>