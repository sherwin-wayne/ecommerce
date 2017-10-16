<?php
session_start();

//DB CONFIGURATION
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbnightclass";
//CREATE CONNECTION
  $conn = mysqli_connect($host, $username, $password, $dbname);
//CHECK CONNECTION
  if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
  } 

?>  


<html>
<head>
<title>Simple Ecommerce Project in PHP & MySQL</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="../styles.css" >
 
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
 
<body>
<div class="container">
   <div class="row">
      <div class="col-md-5">
<a class="img-responsive logo" href="products1.php"><img src="http://devfloat.net/wp-content/uploads/2016/04/My-Shopping-Cart-eCommerce-Logo.jpg" /></a>
      </div>
   </div>
</div>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
 
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="products1.php">Shop Home <span class="sr-only">(current)</span></a></li>
        <li><a href="cart.php">Cart</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php" >
          <?php
            $items = $_SESSION['cart'];
            $cartitems = explode(",", $items);
            echo count($cartitems);
          ?> Items in Cart
           </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
<?php
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
<div class="row">
  <table class="table">
    <tr>
    <th>S.NO</th>
    <th>Item Name</th>
    <th>Price</th>
    </tr>
<?php
$total = '';
$i=1;
foreach ($cartitems as $key=>$id) {
$sql = "SELECT * FROM products1_tbl WHERE product_id = $id";
$result = mysqli_query($conn, $sql);

// if($result === FALSE) { 
//     die(mysql_error()); // TODO: better error handling
// }

// while($row = mysql_fetch_array($result))
// {
//     echo $row['product_id'];
// }

$r = mysqli_fetch_assoc($result);
?>    
    <tr>
    <td><?php echo $i; ?></td>
    <td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['product_name']; ?></td>
    <td>₱<?php echo $r['product_price']; ?></td>
    </tr>
<?php
$total = $total + $r['product_price'];
$i++;
}
?>
<tr>
<td><strong>Total Price</strong></td>
<td><strong>₱<?php echo $total; ?></strong></td>
<td><a href="#" class="btn btn-info">Checkout</a></td>
</tr>
  </table>
  
</div>
 
</div>

</body>
</html>