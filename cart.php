<?php

session_start();

if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart'])){

            $products_array_ids = array_column($_SESSION['cart'], "product_id");

            if(!in_array($_POST['product_id'], $products_array_ids)){

                $product_id = $_POST['product_id'];

                $product_array = array(
                                'product_id'=>$product_id,
                                'product_name'=>$_POST['product_name'],
                                'product_price'=>$_POST['product_price'],
                                'product_image'=>$_POST['product_image'],
                                'product_special_offer'=>$_POST['product_special_offer'],
                                'product_quantity'=>$_POST['product_quantity']
                );

                $_SESSION['cart'] [$product_id] = $product_array;
            }else{
                echo "<script>alert('product has already been added to cart')</script>";
            }
        }else{
            $product_id = $_POST['product_id'];
            $product_array = array(
                            'product_id'=>$product_id,
                            'product_name'=>$_POST['product_name'],
                            'product_price'=>$_POST['product_price'],
                            'product_image'=>$_POST['product_image'],
                            'product_special_offer'=>$_POST['product_special_offer'],
                            'product_quantity'=>$_POST['product_quantity']
            );
            $_SESSION['cart'] [$product_id] = $product_array;
        }

        calculateTotalCart();
        
}else if(isset($_POST['remove_btn'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'] [$product_id]);

    calculateTotalCart();

}else if (isset($_POST['edit_quantity_btn'])){
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    $product = $_SESSION['cart'] [$product_id];
    $product['product_quantity'] = $product_quantity;
    $_SESSION['cart'] [$product_id] = $product;


    calculateTotalCart();
}

function calculateTotalCart(){

    $total_price = 0;
    $total_quantity = 0;

    foreach($_SESSION['cart'] as $id=> $product){
        $product = $_SESSION['cart'] [$id];

        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        $total_price = $total_price + ($price * $quantity);
        $total_quantity = $total_quantity + $quantity;

    }
    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}

?>


<?php include("header.php"); ?>


    <!--Cart section-->
    <section class="cart container mt-5 my-3 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Carts</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>product</th>
                <th>quantity</th>
                <th>subtotal</th>
            </tr>

            <?php if(isset($_SESSION['cart'])){?>
                <?php foreach($_SESSION['cart'] as $key=> $value){?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="<?php echo "assets/img/".$value['product_image']; ?>" alt="">
                                <div>
                                    <p>Sofa</p>
                                    <small><span>$</span><?php echo $value['product_price']; ?></small>
                                    <br>
                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name ="product_id" value="<?php echo $value['product_id'];?>">
                                        <input type="submit" class="remove-btn" name="remove_btn" value="remove">
                                    </form>
                                </div>
                            </div>
                        </td>

                        <td>
                            <form action="cart.php" method="POST">
                                <input type="number" name = "product_quantity" value="<?php echo $value['product_quantity']?>">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                                <input type="submit" class="edit-btn" name="edit_quantity_btn" value="edit">
                            </form>
                        </td>

                        <td>
                            <span class="product-price">$<?php echo $value['product_price'] *  $value['product_quantity']; ?></span>

                        </td>
                    </tr>

                    <!-- <tr>
                        <td>
                            <div class="product-info">
                                <img src="sofaa.jpg" alt="">
                                <div>
                                    <p>Sofa</p>
                                    <small><span>$</span>price</small>
                                    <br>
                                    <form>
                                        <input type="submit" class="remove-btn" value="remove">
                                    </form>
                                </div>
                            </div>
                        </td>

                        <td>
                            <form>
                                <input type="number" value="1">
                                <input type="submit" class="edit-btn" value="edit">
                            </form>
                        </td>

                        <td>
                            <span class="product-price">$100</span>
                        </td>
                    </tr> -->
                <?php } ?>
            <?php } ?>
            
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <?php if(isset($_SESSION['cart'])){ ?>
                    <td><?php echo "$".$_SESSION['total']; ?></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
            <form action="checkout.php" method="GET">
                <input type="submit" class="btn checkout-btn" value="Checkout">
            </form>
        </div>
    </section>






    
    <?php include("footer.php");?>
</body>
</html> 