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
	 		echo   "<div class='top-content'>";
	 		echo   "<h5>" . $row['product_name'] . "</h5>";
	 		echo   "PRICE: ₱" . $row['product_price']."<br>" ;
	 		echo   "AVAILABLE IN STOCK:" . $row['product_quantity'] ;
	 		echo   "<div class='white'>"; 
	 		echo   "<a href=single.php?id=$row[product_id] class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>ADD TO CART</a>";
	 		echo   "<div class='clearfix'></div>";
	 		echo   "</div>";
	 			 		echo   "<hr><hr>"; 	 			 		
	 		echo   "</div>";
	 			 		echo   "<hr><hr>";
	 		echo   "</div>";
	 			 		echo   "<hr><hr>";
	 		echo   "</div>"; 	    
		}
}	 	


?>