<?php

$user_id = $_POST['user_id'];
$user_uname = $_POST['user_uname'];
$user_first = $_POST['user_first'];
$user_last= $_POST['user_last'];
$phone = $_POST['phone'];
$billing = $_POST['billing'];
$shipping = $_POST['shipping'];

//THIS IS WHERE connect to db,insert into table, product name etd
$host = "localhost";
$username = "id3084560_sherwinromualdo";
$password = "Au5573lvsme";
$dbname = "id3084560_dbnightclass";
$conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    $sql = "UPDATE users2_tbl
            SET 
            user_id='$_POST[user_id]',
            user_uname='$_POST[user_uname]',
            user_first='$_POST[user_first]',
            user_last='$_POST[user_last]',
            phone='$_POST[phone]',
            billing='$_POST[billing]',
            shipping='$_POST[shipping]'
            where user_id=$user_id";


    if(mysqli_query($conn, $sql)) {
    		header("Location: customer_account_dashboard.php");
    }else{
        echo "Error: ". $sql . "<br>" . mysqli_error($conn);
    }
     mysqli_close($conn);

?>     