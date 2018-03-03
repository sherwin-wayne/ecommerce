<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "header.php";
include "menu.php";
?>

<?php
if(isset($_GET['msg1'])){
  $errorMsg = $_GET['msg1'];
  $update = "<div class='alert alert-success alert-dismissable' role='alert'>
      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Success! Record Has Been Updated</div>";
}else{
  $update =" ";
  }
?>

<?php
if(isset($_GET['msg2'])){
  $errorMsg = $_GET['msg2'];
  $delete = "<div class='alert alert-success alert-dismissable' role='alert'>
    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Success! Record Has Been Deleted</div>";
}else{
  $delete =" ";
  }
?>

<?php
if(isset($_GET['msg3'])){
  $affectedrows = $_GET['msg3'];
  echo "<div class='alert alert-success alert-dismissable' role='alert'>
    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>$affectedrows Record Deleted! </div>";
}else{
  $delete =" ";
  }
?>

<script = "text/javascript">
  function delMe(){
     var x = confirm ("Are You Sure?");
     if (x){
       return true;
     }else{
       return false;
     } 
}
</script>

<div class = "container">

<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * from users2_tbl";
$result = mysqli_query($conn, $sql);
$counter = 1;

if($_SESSION['admin']){
    echo "<div style=background-color:lightblue;>";
    echo "<h2>Complete List of Active Customers</h2>";
    echo $update;
    echo $delete;
    echo "<form method='POST' action='delete_bybatch.php'>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>SELECT</th>";
    echo "<th>User ID</th>";
    echo "<th>User Name</th>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Billing Address</th>";
    echo "<th>Shipping Address</th>";
    echo "<th>Action</th>";
    echo "</tr>";
}else{
    "Location:admin_login.php";
}

if (mysqli_num_rows($result) > 0){
      //loops through it ONE BY ONE and display each record ONE AFTER ANOTHER;+
        while($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>

          <td><input type='checkbox' name='selectbox[]' value='$row[user_id]'></td>
          <td>". $row["user_id"]."</td>
          <td>". $row["user_uname"]."</td>   
          <td>". $row["user_first"]."</td>
          <td>". $row["user_last"]."</td>
          <td>". $row["user_email"]."</td>
          <td>". $row["phone"]."</td>
          <td>". $row["billing"]."</td>
          <td>". $row["shipping"]."</td>    

          <td>";

            if($_SESSION['admin']){
            echo 
                "<a href='edit_customer.php?id=$row[user_id]' type='button' class='btn btn-info'>Edit</button></a>
                <a href='delete_customer.php?id=$row[user_id]' type='button' class='btn btn-info' onclick = 'return delMe()'>Del</button></a></td></tr>";
            }else{
          //     echo "<a href='view_user.php?id=$row[user_id]' type='button' class='btn btn-info'>View</button></a>

          // </td>
          // </tr>";

            } $counter ++;

          } 
        echo "</table>";
        echo "<button type='submit' onclick = 'return delMe()' style='margin-left: 700px;'>DELETE ALL SELECTED CUSTOMERS</button>";
        echo "</form>";
        echo "</div>";

    }
else{
  echo "0 result";
}


?>

</div>

<div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
Copyright © 2017 Sherwin Romualdo under Creative Commons Attribution 3.0 unported
    </p>
</div>
<script src="jquery-3.2.1.js"></script>
</body>
</html>
