<?php

// if (isset($_POST['submit'])) {

$id=$_POST['user_id'];
$name =$_POST['name'];
$email =$_POST['email'];
$subject =$_POST['subject'];
$message =$_POST['message'];

$host = "localhost";
$username = "id3084560_sherwinromualdo";
$password = "Au5573lvsme";
$dbname = "id3084560_dbnightclass";
// Create Connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

    //Insert the details into the database
    $sql = "INSERT INTO feedback_tbl (user_id, user_name, user_email,subject, message) 
            VALUES ('$id', '$name', '$email', '$subject','$message')";

 if( mysqli_query($conn, $sql)){
    header("Location: customer_account_dashboard.php");
 }else{
 	echo  "Error: ". $sql ."<br>". mysqli_error($conn);
 }   
 mysqli_close($conn);

 ?>