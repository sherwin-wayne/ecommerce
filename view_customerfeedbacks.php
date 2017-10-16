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
?>

<div class="grid-10">
	<div class="box round first">
		<h1>Display All Active Concerns</h1>
			<div class="block">
			<form>
				<?php
				 $res = mysqli_query($link, "select * from feedback_tbl");
				 echo "<table border='1'>";
				 echo "<tr>";
				 echo "<th>"; echo "User ID"; echo "</th>"; 
				 echo "<th>"; echo "Full Name"; echo "</th>";
				 echo "<th>"; echo "Email"; echo "</th>";
				 echo "<th>"; echo "Subject"; echo "</th>";				 
				 echo "<th>"; echo "Message";  echo "</th>";
				 echo "</tr>";
				 while ($row = mysqli_fetch_array($res)){
				 echo "<tr>";
				 echo "<td>"; echo $row["user_id"]; echo "</td>";
				 echo "<td>"; echo $row["user_name"]; echo "</td>";
				 echo "<td>"; echo $row["user_email"]; echo "</td>";				 
				 echo "<td>"; echo $row["subject"]; echo "</td>";	
				 echo "<td>"; echo $row["message"]; echo "</td>";
				 }	

				 ?>
			</form>	 

		    </div>
	 </div>
 </div>				 

<!-- <div class="clear"></div>
<div id="site_info">
    <p>
Copyright © 2017 Sherwin Romualdo under Creative Commons Attribution 3.0 unported
    </p>
</div> -->
<script src="jquery-3.2.1.js"></script>
</body>
</html>