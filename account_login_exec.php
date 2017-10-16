<?php

session_start();

if (isset($_POST['submit'])) {
    
require_once "../includes/dbconnect.php";

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if inputs are empty
    if (empty($uname) || empty($pwd)) {
        header("Location: account_login.php?login=empty");
        exit();
    } else {    

        $sql = "SELECT * FROM users2_tbl WHERE user_uname='$uname' OR user_email='$uname'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: account_login.php?login=error1");//ERROR 1 = ACCOUNT IS NOT YET REGISTERED
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = md5($pwd,$row['user_pwd']); 

                if ($hashedPwdCheck == false) {
                    header("Location: account_login.php?login=error2"); //USER ENTERED WRONG PASSWORD
                    exit();
                }
                else if ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_first'] = $row['user_first'];
                    $_SESSION['user_last'] = $row['user_last'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['billing'] = $row['billing'];
                    $_SESSION['shipping'] = $row['shipping'];
                    $_SESSION['user_uname'] = $row['user_uname'];
                    header("Location: index1.php"); //USER LOGGED IN SUCCESSFULLY
                    exit();
                }
            }
        }
    }    

} else {
    header("Location: account_login.php?login=error3");
    exit();
}