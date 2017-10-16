<?php


if (is_array($_COOKIE['item']))  //this is to check if cookies are available or not
{
    foreach ($_COOKIE['item'] as $name1 => $value)
    {

        if (isset($_POST["delete$name1"]))
        {

            setcookie("item[$name1]", "", time()-1800);
            ?>
            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
            <?php
        }
    }
}

?>

<?php include "../includes/header.php";?>
<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->


        <div class="header-bottom-in">
        <div class="container">
        <div class="header-bottom-on">
<!--THIS PART MUST BE SOFT-CODED IN PHP-->          
            <?php echo "<p class='wel'>Welcome $displayname and enjoy your shopping!</p>";  ?>
            <div class="clearfix"></div>
        </div>
        </div>
        </div>
    </div>

<!--THIS IS THE ACTUAL START OF THE CART PAGE -->

<section id="cart_items">
    <div class="container">

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <form name="form1" action="" method="post">
                    <?php
                    $d = 0;
                    if (is_array($_COOKIE['item']))  //this is for check cookies are available or nor
                    {
                        $d = $d + 1;

                    }
                    if ($d == 0)
                    {
                        echo "no record available in cart";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                    else
                    {
                    ?>
                    <thead>
                    <tr class="cart_menu">
                        <td class="image"><h4><strong>Item Image<strong></h4></td>
                        <td class="description"><h4><strong>Item Name<strong></h4></td>
                        <td class="price"><h4><strong>Price<strong></h4></td>
                        <td class="quantity"><h4><strong>Quantity<strong></h4></td>
                        <td class="total"><h4><strong>Total<strong></h4></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                    {
                        $values11 = explode("__", $value);

                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?php echo $values11[0]; ?>" alt="" height="200"
                                                width="200"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $values11[1]; ?></a></h4>

                            </td>
                            <td class="cart_price">
                                <p>₱<?php echo $values11[2]; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">₱<?php echo $values11[4]; ?></p>
                            </td>
                            <td><input type="submit" name="delete<?php echo $name1;
                                ?>" value="DELETE ITEM" id="s3" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2"></td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php

                    }

                    ?>


                    </tbody>
                </form>
            </table>
            <?php

            }
            $tot = 0;

            if (is_array($_COOKIE['item']))  //this is for chec cookies are available or not
            {
                foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                {
                    $values11 = explode("__", $value);
                    $tot = $tot + $values11[4];
                }

                echo "<h3><strong>YOUR GRAND TOTAL IS: ₱" . $tot. "<strong></h3>";
                $_SESSION["pay"] = $tot;
            }
            ?>


        </div>
    </div>
</section>
<!--/#cart_items-->
<center>
    <a href="checkout.php"><h3>
        <input type="button" value="GO TO CHECKOUT" ></h3></a>
</center>

        <!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>
</body>
</html>