<!--THE DESIGN OF THIS CAME FROM LANDING_PAGE.PHP AND WAS CONVERTED TO SOFT CODES-->


<?php
	require_once "../includes/dbconnect.php";

$sql = "SELECT * from products1_tbl";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0) {
		$counter = 1;
		 while($row = mysqli_fetch_assoc($result)){ 
	 		echo   "<div class='col-md-3 md-col'>";
	 		echo   "<div class='col-md'>";
	 		echo   "<class='compare-in'><img src=".$row['product_image'].">";
	 		echo   "<div class='top-content'>";
	 		echo   "<br><span>" . $row['product_name'] . "</span><br>"; 		
	 		echo   "<br>PRICE: ₱" . $row['product_price']."<br>" ;
	 		echo   "<br>AVAILABLE IN STOCK:" . $row['product_quantity'] ;
	 		echo   "<div class='white'>"; 
	 		echo   "<div class=nav_button>";
	 		echo   "<br><a href=single.php?id=$row[product_id] class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>ADD TO MY SHOPPING CART</a>";
	 		// echo   "<br><a href=# class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>ADD TO WISHLIST</a>";	 		
	 		echo   "</div>";
	 		// echo   "<div class='clearfix'></div>";
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