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
?>
<div class="grid-10">
	<div class="box round first">
		<h1>Add Product</h1>
		<div class="block">
			<form action="add_products_exec.php" method="post" enctype="multipart/form-data">
				<table border="1">
				<tr>
				<td>Product ID:</td>
				<td> <input type="text" name="product_id"></td>
				</tr>
				<tr>
				<td>Name:</td> <td> <input type="text" name="product_name"></td>
				</tr>
				<tr>
				<td>Description:</td> <td> <textarea rows="4" cols="50" name="product_description"></textarea></td>
				</tr>
				<tr>
				<td>Price: </td> <td> <input type="text" name="product_price"></td>
				</tr>
				<tr>
				<td>Quantity:</td> <td><input type="text" name="product_quantity"></td>
				</tr>
				<tr>
				<td> Category: </td> <td> <select name = "product_category" onchange="showMe()" id="product_category">
				<option value="">-----------</option>
				<?php
					 $conn = mysqli_connect("localhost", "id3084560_sherwinromualdo", "Au5573lvsme", "id3084560_dbnightclass");
				 
				 if ($conn){
				 	$sql = "SELECT * FROM categories1_tbl";

				 	$result = mysqli_query($conn, $sql);

				 	if(mysqli_num_rows($result) > 0){
				 		while ($row = mysqli_fetch_assoc($result)){
				 			echo "<option value = '$row[id]'> ". $row['name']."</option>";
				 		}
				}
				 }else{
				 	echo "Not Connected";
				 }


				?>
				</select></td>
				</tr> 
				<tr>
				<td> Image:</td> <td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Add Product"></td>
				</tr>
				</table>
			</form>

	    </div>
	</div>
</div>

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

  
      
     