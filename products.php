<?php include("header.php");?>
    


<section class="products" id="products">
        <h1 class="heading">latest <span class="heading-span">products</span></h1>
        <div class="box-container">

        <?php include("get_products.php"); ?>
        <?php foreach($products as $product){ ?>
            <div class="box">
                
                <div class="image">
                    <img src="<?php echo "assets/img/".$product['product_image']; ?>" alt="">
                    <div class="form">
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                            <input type="hidden" name="product_name" value="<?php echo $product['product_name'];?>">
                            <input type="hidden" name="product_image" value="<?php echo $product['product_image'];?>">
                            <input type="hidden" name="product_price" value="<?php echo ($product ['product_price'] * ((100 - $product['product_special_offer'])/100)); ?>">
                            <input type="hidden" name="product_special_offer" value="<?php echo $product['product_special_offer'];?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="submit" class="cart-btn" value="add to cart" name = "add_to_cart">
                        </form>
                    </div>
                </div>
                <span class="discount"><?php echo $product['product_special_offer']; ?>% OFF</span>
                <div class="content">
                    <h3><?php echo $product ['product_name'] ?></h3>
                    <div class="price">$<?php echo ($product ['product_price'] * ((100 - $product['product_special_offer'])/100)); ?> <span>$<?php echo $product['product_price'];?></span></div>
                </div>
            </div>
        <?php } ?>
            
        </div>
    </section>



<?php include("footer.php");?>

     
    
</body>
</html>