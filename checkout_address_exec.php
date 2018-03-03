<?php

if (isset($_POST['submit1'])) {
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['contactnumber'];
    $billing = $_POST['billing'];    

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dbnightclass");

	$sql = "INSERT INTO checkout_address(firstname, lastname, email, contact, address)
			VALUES ('$first', '$last', '$email', '$phone', '$billing');";

mysqli_query($link,$sql);
echo "Your Address Was Successfully Added";
exit();
}
else{
	echo "Your Address was Not Added, Pls Try Again";
}