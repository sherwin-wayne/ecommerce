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

$link=mysqli_connect("localhost","id3084560_sherwinromualdo","Au5573lvsme");
mysqli_select_db($link,"id3084560_dbnightclass");
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

<div class="grid_10">
	<div class="box round first">
		<h2> EDIT ITEMS </h2>
		<div class="block">
			<table border="1">
				<tr>
				    <td colspan="2" align="center"></td>
				    <img src="<?php echo $product_image; ?>" height="100" width="100">
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
					<td><input type="file" name="product_image" value="<?php echo $product_image; ?>"></td>
				</tr>

				<tr>
					<td>Product Category ID</td>
					<td><input type="text" name="category_id" value="<?php echo $category_id; ?>"></td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td><textarea cols="15" rows="10" name="product_description"><?php echo $product_description; ?> </textarea></td>
				</tr>				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>	
			</table>
		</div>
	</div>

	<?php
	if (isset($_POST["submit1"]))
	{
		$fnm=$_FILES["product_image"]["product_name"];

		if($fnm=="")
		{
			mysqli_query($link,"update products1_tbl set product_name='$_POST[product_name]', product_price='$_POST[product_price]', product_quantity='$_POST[product_quantity]', category_id='$_POST[category_id]', product_description='$_POST[product_description]' where product_id=$id");
		}
		else
		{
			   $v1=rand(1111,9999);
			   $v2=rand(1111,9999);			   
			   $v3=$v1.$v2;			   
			   $v3=md5($v3);

			$fnm=$_FILES ["product_image"]["product_name"];
			$dst="".$v3.$fnm;
			$dst1="".$v3.$fnm;
			move_uploaded_file($_FILES["product_image"]["tmp_name"],$dst);

			mysqli_query($link,"update products1_tbl set product_image='$dst1', product_name='$_POST[product_name]', product_price='$_POST[product_price]', product_quantity='$_POST[product_quantity]', category_id='$_POST[category_id]', product_description='$_POST[product_description]' where product_id=$id");
		}
		?>
		<script type="text/javascript">
			window.location="display_products.php";
		</script>		

	}
	}			

</div>
<?php
include "footer.php";   
?>    
