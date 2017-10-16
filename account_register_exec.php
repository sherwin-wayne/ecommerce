<?php

if (isset($_POST['submit'])) {

require_once "../includes/dbconnect.php";

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $billing = mysqli_real_escape_string($conn, $_POST['billing']);
    $shipping = mysqli_real_escape_string($conn, $_POST['shipping']);    
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
            //Check if input characters are valid
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: account_register.php?signup=invalid");
                exit();
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: account_register.php?signup=email");
                    exit();
                }else {
                    $sql = "SELECT * FROM users2_tbl WHERE user_uname='$uname'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        header("Location: account_register.php?signup=usertaken");
                        exit();
                    } else {
                        //Hashing the password
                        $hashedPwd = md5($pwd);
                        //Insert the user into the database
                        $sql = "INSERT INTO users2_tbl (user_first, user_last, user_email,phone, billing, shipping, user_uname, user_pwd) 
                                VALUES ('$first', '$last', '$email','$phone','$billing','$shipping','$uname','$hashedPwd');";
                        mysqli_query($conn, $sql);
                        header("Location: account_login.php?msg1=1");
                        exit();
                    }                //Check if email is valid

                }
            }
} else {
    header("Location: account_register.php");
    exit();
}