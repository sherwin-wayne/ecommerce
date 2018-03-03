<?php
session_start();
$conn=mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"dbnightclass");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/style.css">  
</head>

<body>

<script type="text/javascript">
  function RemoveMssg(){
      document.getElementById("showerror").innerHTML = "";
  }
</script>

<div class="contain">
   <div id="close" class="close">Close</div>
</div>

<div class="containmain">
    <div class="center">
    <div class="profile"></div>

    <form class="form" name="form1" action="" method="post" autocomplete="on">
      <input class="topform" type="text" placeholder="Enter Your Username" required name="username" onfocus="RemoveMssg()"><br>
      <input class = "bottomform" type="password" placeholder="Enter Your Password" required name="pwd"><br>
      <input type="submit" name="submit1" value="Log in">
    </form>
  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

    
  <?php
  if(isset($_POST["submit1"]))
  {
  
  
  $res=mysqli_query($conn,"select * from admin_login where username='$_POST[username]' && password='$_POST[pwd]'");
  while($row=mysqli_fetch_array($res))
  {
  $_SESSION["admin"]=$row["username"];
  ?>
  <script type="text/javascript">
  window.location="display_products.php";
  </script>
  <?php 
  }
  
  
  
  
  }
  
  ?>
    
    
    
  </body>
</html>
