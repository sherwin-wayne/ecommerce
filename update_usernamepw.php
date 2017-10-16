<?php

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

require_once "../includes/dbconnect.php";
    //Hashing the password
    $hashedPwd = md5($pwd);
    //Insert the user into the database
    $sql = "UPDATE users2_tbl 
            SET user_uname = '$uname',
                password = '$hashedPwd'
            WHERE user_id = '$_SESSION[id]' ";
    $result = mysqli_query ($conn,$sql);
            
    if ($result){
        header("Location:account_login.php");
    }
    else{
        echo "Update failed";
    }
}
?>    