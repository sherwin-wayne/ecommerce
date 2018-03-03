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
		<h1>Display All Orders</h1>
			<div class="block">
			<form>
				<?php
				 $res = mysqli_query($link, "select * from checkout_address order by id desc");
				 echo "<table border='1'>";
				 echo "<tr>";				 
				 echo "<th>"; echo "First Name"; echo "</th>"; 
				 echo "<th>"; echo "Last Name"; echo "</th>";
				 echo "<th>"; echo "Email"; echo "</th>";
				 echo "<th>"; echo "Contact Number"; echo "</th>";				 
				 echo "<th>"; echo "Address";  echo "</th>";
				 echo "<th>"; echo "Delete This Order"; echo "</th>";				 
				 echo "<th>"; echo "View Individual Order"; echo "</th>";
				 echo "</tr>";
				 while ($row = mysqli_fetch_array($res)){
				 echo "<tr>";
				 echo "<td>"; echo $row["firstname"]; echo "</td>";
				 echo "<td>"; echo $row["lastname"]; echo "</td>";
				 echo "<td>"; echo $row["email"]; echo "</td>";				 
				 echo "<td>"; echo $row["contact"]; echo "</td>";	
				 echo "<td>"; echo $row["address"]; echo "</td>";
				 echo "<td>"; ?><a href="delete_order.php?id=<?php echo $row["id"]; ?>">ORDER FULFILLED</a><?php echo "</td>";
				 echo "<td>"; ?><a href="view_individualorder.php?id=<?php echo $row["id"]; ?>">VIEW THIS ORDER</a><?php echo "</td>";
				 }	

				 ?>
			</form>	 

		    </div>
	 </div>
 </div>				 