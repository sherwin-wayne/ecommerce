<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "header.php";
include "menu.php";

$link=mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dbnightclass");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from products1_tbl where product_id = $id");
while ($row=mysqli_fetch_array($res))
{
   $product_id=$row["product_id"];
   $product_image=$row["product_image"];
   $product_name=$row["product_name"];
   $product_description=$row["product_description"];
   $product_price=$row["product_price"];
   $product_quantity=$row["product_quantity"];
   $category_id=$row["category_id"];
}
?>
<form name="form1" action="edit_products_exec.php" method="post" enctype="multipart/form-data">
<div class="grid-10">
	<div class="box round first">
		<h1>Edit Products</h1>
		<div class="block">
				<table border="1">
				<tr>
				<td colspan="2" align="center">
					<img src="<?php echo $product_image; ?>" height="100" width="100"></td>
				</tr>

				<tr>	
					<td>Product ID (do NOT edit this!)</td>
					<td><input type="text" name="product_id" value="<?php echo $product_id; ?>"></td>
				</tr>


				<tr>	
					<td>Product Name</td>
					<td><input type="text" name="product_name" value="<?php echo $product_name; ?>"></td>
				</tr>
				<tr>	
					<td>Product Price</td>
					<td><input type="text" name="product_price" value="<?php echo $product_price; ?>"></td>
				</tr>

				<tr>	
					<td>Product Quantity</td>
					<td><input type="text" name="product_quantity" value="<?php echo $product_quantity; ?>"></td>
				</tr>

				<tr>	
					<td>Product Image</td>
					<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
				</tr>	

				<tr>	
					<td>Product Category</td>
					<td><input type="text" name="category_id" value="<?php echo $category_id; ?>"></td>
				</tr>

				<tr>	
					<td>Product Description</td>
					<td><textarea cols="50" rows="10" name="product_description"> <?php echo $product_description; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="APPLY THE UPDATES"></td>
				</tr>	
			</table>
			   
	    </div>
	</div>
</div>
</form>

<div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
Copyright © 2017 Sherwin Romualdo under Creative Commons Attribution 3.0 unported
    </p>
</div>
</body>
</html>