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

$link= mysqli_connect("localhost","id3084560_sherwinromualdo","Au5573lvsme");
mysqli_select_db($link,"id3084560_dbnightclass");
 $id = $_GET["id"];
 $res = mysqli_query($link, "select * from confirm_order_product where id=$id");
while ($row = mysqli_fetch_array($res))
{
    $id=$row["id"];	
	$product_image=$row["product_image"];
	$order_id=$row["order_id"];
	$product_name=$row["product_name"];
	$product_price=$row["product_price"];
	$product_quantity=$row["product_quantity"];
	$product_total=$row["product_total"];
}	
?>

<div class="grid-10">
	<div class="box round first">
		<h1>Display Individual Order</h1>
			<div class="block">
			<form>
				<?php
				 echo "<table border='1'>";
				 echo "<tr>";
				 echo "<th>"; echo "Order ID"; echo "</th>"; 				 
				 echo "<th>"; echo "Product Image"; echo "</th>"; 
				 echo "<th>"; echo "Product Name"; echo "</th>";
				 echo "<th>"; echo "Product Price"; echo "</th>";
				 echo "<th>"; echo "Product Quantity"; echo "</th>";				 
				 echo "<th>"; echo "TOTAL";  echo "</th>";
				 echo "</tr>";

				 echo "<tr>";
				 echo "<td>"; echo $id; echo "</td>";				 
				 echo "<td>"; ?> <img src="<?php echo $product_image; ?>" height="100" width="100"> <?php echo "</td>";
				 echo "<td>"; echo $product_name; echo "</td>";
				 echo "<td>"; echo $row["product_price"]; echo "</td>";	
				 echo "<td>"; echo $product_price; echo "</td>";
				 echo "<td>"; echo $product_total; echo "</td>";					 	

				 ?>
			</form>	 

		    </div>
	 </div>
 </div>