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

$link= mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dbnightclass");

?>
<div class="grid-10">
	<div class="box round first">
		<h1>Display All Products</h1>
			<div class="block">
			<form>
				<?php
				 $res = mysqli_query($link, "select * from products1_tbl");
				 echo "<table border='1'>";
				 echo "<tr>";
				 echo "<th>"; echo "Product ID"; echo "</th>"; 
				 echo "<th>"; echo "Product Image"; echo "</th>";
				 echo "<th>"; echo "Product Name"; echo "</th>";
				 echo "<th>"; echo "Product Description"; echo "</th>";				 
				 echo "<th>"; echo "Product Price";  echo "</th>";
				 echo "<th>"; echo "Available Stocks";  echo "</th>";
				 echo "<th>"; echo "Category ID";  echo "</th>";
				 echo "<th>"; echo "Delete Item"; echo "</th>";
				 echo "<th>"; echo "Edit Item"; echo "</th>";				 
				 echo "</tr>";
				 while ($row = mysqli_fetch_array($res)){
				 echo "<tr>";
				 echo "<td>"; echo $row["product_id"]; echo "</td>";
				 echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"> <?php echo "</td>";
				 echo "<td>"; echo $row["product_name"]; echo "</td>";
				 echo "<td>"; echo $row["product_description"]; echo "</td>";				 
				 echo "<td>"; echo $row["product_price"]; echo "</td>";	
				 echo "<td>"; echo $row["product_quantity"]; echo "</td>";
				 echo "<td>"; echo $row["category_id"]; echo "</td>";
				 echo "<td>"; ?> <a href="delete_products.php?id=<?php echo $row["product_id"]; ?>">DELETE PRODUCT</a><?php echo "</td>";
				 echo "<td>"; ?> <a href="edit_products.php?id=<?php echo $row["product_id"]; ?>">EDIT PRODUCT</a><?php echo "</td>";				 
				 echo "</tr>";			 	 
				 }	

				 ?>
			</form>	 

		    </div>
	 </div>
 </div>


<!-- <div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>Copyright © 2017 Sherwin Romualdo under Creative Commons Attribution 3.0 unported</p>
</div>
-->

</body>
</html> 

  
      
     