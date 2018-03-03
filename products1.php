<?php
session_start();

//DB CONFIGURATION
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";
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



<?php
$sql = "SELECT * FROM products1_tbl";
$res = mysqli_query($conn, $sql);
?>
 
<div class="container">
<?php if(isset($_GET['status']) & !empty($_GET['status'])){
if($_GET['status'] == 'success'){
echo "<div class=\"alert alert-success\" role=\"alert\">Item Successfully Added to Cart</div>";
}elseif ($_GET['status'] == 'incart') {
echo "<div class=\"alert alert-info\" role=\"alert\">Item is Already Exists in Cart</div>";
}elseif ($_GET['status'] == 'failed') {
echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to Add item, try to Add Again</div>";
}
}
?>
<div class="row">
<?php while($r = mysqli_fetch_assoc($res)){ ?>
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="<?php echo $r['product_image']; ?>" alt="<?php echo $r['product_name'] ?>">
      <div class="caption">
        <h3><?php echo $r['product_name'] ?></h3>
        <p><?php echo $r['product_description'] ?></p>
        <p><a href="addtocart.php?id=<?php echo $r['product_id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
<?php } ?>

</div>
 
</div>


</body>
</html>