<?php
$link=mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dbnightclass");
$id=$_GET["id"];

$res=mysqli_query($link,"select * from products1_tbl where product_id=$id");
while ($row=mysqli_fetch_array($res))
{
	$img=$row["product_image"];
}

unlink($img);

mysqli_query($link,"delete from products1_tbl where product_id=$id");
?>

<script type="text/javascript">
    window.location="display_products.php";
</script>    





?>