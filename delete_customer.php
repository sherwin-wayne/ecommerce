<?php
if(!isset($_SESSION['admin'])){
	header ("Location:admin_login.php");
}else{

}
	$id= $_GET['id'];

//DB CONFIGURATION
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";
$conn = mysqli_connect($host, $username, $password, $dbname);
//CHECK CONNECTION
	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}
		
$sql = "DELETE FROM users2_tbl 
        WHERE user_id = '$id'";


    
if(mysqli_query($conn, $sql)) {
	echo "Record Has Been Deleted";
	header("Location: view_activecustomers.php?msg2=2");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>	



