<?php session_start(); ?>

<?php
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
   
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$selectbox=$_POST['selectbox'];
$batchdelete = implode(",",$selectbox);


$sql = "DELETE from users2_tbl 
        WHERE user_id IN($batchdelete)";


if(mysqli_query($conn, $sql)) {
	$affectedrows = mysqli_affected_rows($conn);    
	header("Location: view_activecustomers.php?msg3=$affectedrows");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>