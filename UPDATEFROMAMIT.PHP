<!--THIS PORTION IS FROM AMIT'S VIDEO-->

<!-- 	 <?php
	  if (isset($_POST["submit1"]))
	  {
	  	$fnm=$_FILES["product_image"]["product_name"];
	  	if ($fnm=="")
	  	{
	  		mysqli_query($link,"update products1_tbl set 
	  			product_name='$_POST[product_name]',
	  			product_price= '$_POST[product_price]'
	  			product_quantity= '$_POST[product_quantity]'
	  			category_id= '$_POST[category_id]'
	  			where id=$id");
	  	}	
	  	else		
	  	{
	  		$v1=rand(1111,9999);
		    $v2=rand(1111,9999);
		   
		    $v3=$v1.$v2;
		   
		    $v3=md5($v3);
		   
		   
		    $fnm=$_FILES["product_image"]["product_name"];
		    $dst="./product_image/".$v3.$fnm;
		    $dst1="product_image/".$v3.$fnm;
		    move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

	  		mysqli_query($link,"update products1_tbl set
	  			product_image='$dst1', 
	  			product_name='$_POST[product_name]',
	  			product_price= '$_POST[product_price]'
	  			product_quantity= '$_POST[product_quantity]'
	  			category_id= '$_POST[category_id]'  
	  			where id=$id");

	  	}
		?>
		<script type="text/javascript">
			window.location="display_products.php";
		</script>	


	}
 -->
	


