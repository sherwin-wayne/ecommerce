<?php
session_start();
if($_SESSION["pay"]=="")
{

    ?>
    <script type="text/javascript">
        window.location="products.php";
    </script>

    <?php
}
$_SESSION["paypalphp"]="yes";
?>
<h1>Please Wait A Moment, You're Being Transferred To PayPal....</h1>
<?php
$paypal_url = 'https://www.sandbox.paypal.com/';
$pay=$_SESSION["pay"];
$order_id=$_SESSION["order_id"];
?>

<!--THIS IS THE PART BEING SHOWN IN THE SANDBOX PAYPAL PAGE-->
<form action="<?php echo $paypal_url;?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sherwinromualdo@yahoo.com">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="item_name" value="payment for testing">
    <input type="hidden" name="item_number" value="">
    <input type="hidden" name="amount" value="<?php echo $pay; ?>">
    <input type="hidden" name="return" value="http://localhost/Nightclass/CAPSTONE2/ecommerce/payment_success.php?id=<?php echo $order_id; ?>">
</form>
<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>