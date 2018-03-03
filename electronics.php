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

<!--THIS IS THE START OF THE SECTION THAT MUST BE CONVERTED TO SOFT-CODES-->

<div class="container">
	<div class="products">
		<div class = "top-products">



<?php
	require_once "../includes/dbconnect.php";

$sql = "SELECT * from products1_tbl
		WHERE category_id = '1' ";
	$result = mysqli_query($conn,$sql);
 
	if(mysqli_num_rows($result) > 0) {
		$counter = 1;
		    while($row = mysqli_fetch_assoc($result)){
	 		echo   "<div class='col-md-3 md-col'>";
	 		echo   "<div class='col-md'>";
	 		echo   "<class='compare-in'><img src=".$row['product_image'].">";
	 		echo   "<div class='top-content'>";
	 		echo   "<h5>" . $row['product_name'] . "</h5>";
	 		echo   "PRICE: ₱" . $row['product_price']."<br>" ;
	 		echo   "<br>AVAILABLE IN STOCK:" . $row['product_quantity'] ;
	 		echo   "<div class='white'>"; 
	 		echo   "<br> <a href=single.php?id=$row[product_id] class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>ADD TO MY SHOPPING CART</a>";
	 		echo   "<div class='clearfix'></div>";
	 		echo   "</div>";
	 			 		echo   "<br>"; 	 			 		
	 		echo   "</div>";
	 			 		echo   "<br>";
	 		echo   "</div>";
	 			 		echo   "<br>";
	 		echo   "</div>";	    
		}
}	 	


?>
			</div>
     </div>
</div>     

<!--THIS IS THE END OF THE ALL-CATEGORIES PRODUCTS SECTION--

<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>