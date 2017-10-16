<?php
if(!isset($_SESSION['admin'])){
	header ("Location:admin_login.php");
}else{

}
	$id= $_GET['id'];

//DB CONFIGURATION
$host = "localhost";
$username = "id3084560_sherwinromualdo";
$password = "Au5573lvsme";
$dbname = "id3084560_dbnightclass";
//CREATE CONNECTION
	$conn = mysqli_connect($host, $username, $password, $dbname);
//CHECK CONNECTION
	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}
		
$sql = "DELETE FROM confirm_order_product 
        WHERE id = '$id'";


    
if(mysqli_query($conn, $sql)) {
	echo "Order Fulfilled and Has Been Deleted";
	header("Location: view_allorders.php?msg2=2");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>	



