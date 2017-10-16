<?php session_start(); ?>


<?php session_destroy();
		header ("Location: account_login.php?msg=2");
?>
