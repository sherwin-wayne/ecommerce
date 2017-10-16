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
			<form method = "POST" action = "products.php">
					Select Category:
					<select name = "select_category" onchange="showMe()" id="select_category">
						<option value="0">ALL CATEGORIES</option>
						<option value="1">Electronics And Gadgets</option>
						<option value="2">Men's Fashion</option>
						<option value="3">Women's Fashion</option>
						<option value="4">Health and Beauty</option>								
					</select>
					<button type = "submit">GO</button>
			</form>
	</div>		
</div>

<div class="container">
	<div class="products">
		<div class = "top-products">

<?php
	if(isset($_POST['select_category'])){
		$select_category = $_POST['select_category'];
			if ($select_category == 1){
			echo "<h3><strong>Electronics and Gadgets<strong></h3>";
			include 'productsbycategory.php';

		    }
			else if ($select_category == 2){
			echo "<h3><strong>Men's Fashion<strong></h3>";
			include 'productsbycategory.php';

			}
			else if ($select_category == 3){
			echo "<h3><strong>Women's Fashion<strong></h3>";	
			include 'productsbycategory.php';

			}
			else if ($select_category == 4){
			echo "<h3><strong>Health and Beauty<strong></h3>";
			include 'productsbycategory.php';

			}			
			else if ($select_category == 0){
			include 'productsallcategories.php';
			}

	}else{
			include 'productsallcategories.php';
	}
		
?>	
			</div>
     </div>
</div>     

<!--THIS IS THE END OF THE ALL-CATEGORIES PRODUCTS SECTION-->

<!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>