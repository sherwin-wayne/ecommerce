<?php
$id = $_GET["id"];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "dbnightclass");

if (isset($_POST["submit1"])) {
    $d = 0;
    if (is_array($_COOKIE['item'])) //this is for checking if cookies available or not
    {

        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    //to get item description from table
    $res3 = mysqli_query($link, "select * from products1_tbl where product_id=$id");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $price = $row3["product_price"];
        $qty = "1";
        $total = $price * $qty;
    }

    if (is_array($_COOKIE['item']))  //this is for check cookies are available or not
    {
        foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0])      //this is for check same cookies available or not if available then increase qty
            {
                //check here for quantity add in the cart for more than available quantity
                $found = $found + 1;
                $qty = $values11[3] + 1;

                $tb_qty;
                $res = mysqli_query($link, "select * from products1_tbl where product_image='$img1'");
                while ($row = mysqli_fetch_array($res)) {
                    $tb_qty = $row["product_quantity"];
                }

                if ($tb_qty < $qty) {
                    ?>
                    <script type="text/javascript">
                        alert("this much quantity not available");
                    </script>
                    <?php

                } else {

                    $total = $values11[2] * $qty;
                    setcookie("item[$name1]", $img1 . "__" . $nm . "__" . $price . "__" . $qty . "__" . $total, time() + 1800);
                }
            }

        }

        if ($found == 0) {
            $tb_qty;
            $res = mysqli_query($link, "select * from products1_tbl where product_image='$img1'");
            while ($row = mysqli_fetch_array($res)) {
                $tb_qty = $row["product_quantity"];
            }

            if ($tb_qty < $qty) {
                ?>
                <script type="text/javascript">
                    alert("this much quantity not available");
                </script>
                <?php

            } else {

                setcookie("item[$d]", $img1 . "__" . $nm . "__" . $price . "__" . $qty . "__" . $total, time() + 1800);//new

            }
        }

    } else {
        $tb_qty;
        $res = mysqli_query($link, "select * from products1_tbl where product_image='$img1'");
        while ($row = mysqli_fetch_array($res)) {
            $tb_qty = $row["product_quantity"];
        }

        if ($tb_qty < $qty) {
            ?>
            <script type="text/javascript">
                alert("this much quantity not available");
            </script>
            <?php

        } else {
            setcookie("item[$d]", $img1 . "__" . $nm . "__" . $price . "__" . $qty . "__" . $total, time() + 1800);//new
        }
    }


}

?>

<?php include "../includes/header.php";?>
<!--THIS IS THE END OF THE CATEGORIES NAVIGATION BARS-->


        <div class="header-bottom-in">
        <div class="container">
        <div class="header-bottom-on">
         
            <?php echo "<p class='wel'>Welcome $displayname and enjoy your shopping!</p>";  ?>
            <div class="clearfix"></div>
        </div>
        </div>
        </div>
    </div>

<?php
$res = mysqli_query($link, "select * from products1_tbl where product_id=$id");
while ($row = mysqli_fetch_array($res))
{
?>

<!--DISPLAYING OF THE DYNAMIC PART GOES here -->

<form name="form1" action="" method="post">
        <div class="container">
            <div class="single">
                <div class="col-md-9 top-in-single">
                    <div class="col-md-5 single-top">   
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="<?php echo $row["product_image"];?>" alt="" height="350" width="300" />
                                </a>
                            </li>
                        </ul>

                    </div>  
                    <div class="col-md-7 single-top-in">
                        <div class="single-para">
                            <h5>Online Catalogue ID:<?php echo $row["product_id"]; ?></h5>                        
                            <h4><?php echo $row["product_name"]; ?></h4>
                            <div class="para-grid">
                                <span  class="add-to">₱<?php echo $row["product_price"]; ?></span><br><br>
<!-- THIS IS WHERE THE PROBLEM IS - HOW TO MAKE THE SELECTED NUMBER OF ITEMS BE THE SUBMITTED NUMBER OF ITEMS ONCE THE SHOPPING CART BUTTON IS SUBMITTED -->
                                <label>Quantity:</label>
                                <input type="text" value="1"/>
                                <label>Note: Click as many times as needed - one click is one item, two clicks are two items etc</label>
                                <button type="submit" name="submit1" class="hvr-shutter-in-vertical cart-to"><i class="fa fa-shopping-cart"></i>CLICK TO ADD TO SHOPPING CART</button>  

                                <div class="clearfix"></div>
                             </div>
                            <h5><?php echo $row["product_quantity"]; ?> items in stock</h5>

                            <h5><?php echo $row["product_description"]; ?></h5>
                        </div>
                    </div>
                </div>
                    
<?php
}
?>                    
</form>


<!--THIS PART IS AT THE RIGHT SIDE OF THE PAGE-->                
                <div class="col-md-3">
                    <div class="single-bottom">
                        <h4>Special Categories</h4>
                        <ul>
                        <li><a href="#"><i> </i>Liza Soberano Items</a></li>
                        <li><a href="#"><i> </i>Tyler and Tanner Mata Items</a></li>
                        <li><a href="#"><i> </i>Koko Paras Items</a></li>
                        <li><a href="#"><i> </i>Ruru Madrid Items</a></li>
                        <li><a href="#"><i> </i>Anne Curtis Items</a></li>
                        </ul>
                    </div>
                    <div class="single-bottom">
                        <h4>HOTTEST ITEMS</h4>
                            <div class="product">
                                <img class="img-responsive fashion" src="../images/st1.jpg" alt="">
                            <div class="grid-product">
                                <a href="#" class="elit">Ellen Adarna's Celphone, Memory Card Included!</a>
                                <span class="price price-in"><small>₱25,000.00</small> ₱20,000.00</span>
                            </div>
                            <div class="clearfix"> </div>
                            </div>
                            <div class="product">
                                <img class="img-responsive fashion" src="../images/st2.jpg" alt="">
                            <div class="grid-product">
                                <a href="#" class="elit">Coco Martin's Laptop, No Factory Reset!</a>
                                <span class="price price-in"><small>₱30,000.00</small> $25,000.00</span>
                            </div>
                            <div class="clearfix"> </div>
                            </div>
                            <div class="product">
                                <img class="img-responsive fashion" src="../images/st3.jpg" alt="">
                            <div class="grid-product">
                                <a href="#" class="elit">Maine Mendoza's Camera!</a>
                                <span class="price price-in"><small>₱35,000.00</small> ₱30,000.00</span>
                            </div>
                            <div class="clearfix"> </div>
                            </div>
                </div>
                </div>

                <div class="clearfix"> </div>

</div>
</div>
 

        <!--THIS IS WHERE THE FOOTER BEGINS. MOST OF THESE ARE DEAD LINKS AND ARE MERELY FOR PRESENTATION PURPOSES-->
<?php include "../includes/footer.php";?>   

