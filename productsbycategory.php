<?php
	require_once "../includes/dbconnect.php";

$sql = "SELECT * from products1_tbl
		WHERE category_id = '$select_category' ";
	$result = mysqli_query($conn,$sql);
 
	if(mysqli_num_rows($result) > 0) {
		$counter = 1;
		    while($row = mysqli_fetch_assoc($result)){
	 		echo   "<div class='col-md-3 md-col'>";
	 		echo   "<div class='col-md'>";
	 		echo   "<class='compare-in'><img src=".$row['product_image'].">";
	 		echo   "<div class='top-content-categorypage'>";
	 		echo   "<br> <h5>" . $row['product_name'] . "</h5>";
	 		echo   "<br>PRICE: ₱" . $row['product_price']."<br>" ;
	 		echo   "<br>AVAILABLE IN STOCK:" . $row['product_quantity'] ;
	 		echo   "<div class='white'>"; 
	 		echo   "<br><a href=single.php?id=$row[product_id] class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>ADD TO MY SHOPPING CART</a>";
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