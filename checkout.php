<?php

session_start();

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    header("location: index.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fd1528e93.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">


    <link rel="stylesheet" href="style.css">
    <title>Main</title>
</head>
<body>
    
    <header>
        <input type="checkbox" name="" id = "toggler">

        <label for="toggler" class="fas fa-bars"></label>


        <a href="#" class = "logo">Store <span>.</span></a>
        <nav class="navbar">

            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#products">Product</a>
            <a href="#contact">Contact</a>
        </nav>

        <nav class="icons">
            
            <a href="#" class="fas fa-shopping-cart"></a>
        </nav>
    </header>


    <!--Checkout-->
    <section class="my-5 py-5 checkout">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="place_order.php" method="POST">
                <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="checkout-email" name="email" placeholder="email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="city" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: <?php echo "$" . $_SESSION['total'];?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="checkout_btn" value="checkout">
                </div>
            </form>
        </div>
    </section>

























    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#features">Feautures</a>
                <a href="#products">Products</a>
                <a href="#contact">Contact</a>
                <a href="#review">reviews</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#">carts</a>
                <a href="#">home</a>
                <a href="#">special offers</a>
            </div>

            <div class="box">
                <h3>locations</h3>
                <p>Nepal</p>
                <p>UK</p>
                <p>USA</p>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <p>9813131413</p>
                <p>info@email.com</p>
            </div>
        </div>
    </section>

    <!--Contact Us-->
    <section class="contact" id="contact">
        <h1 class="heading"><span>Contact</span>Us</h1>
        <div class="main-row">
            <div class="contact-info">
                <h3>Contact Number: 9813131413</h3>
                <p>Customer service: <span>customer@email.com</span></p>
                <p>returns and refunds: <span>return@email.com</span></p>
                <p>inquiries: <span>inquirer@email.com</span></p>
            </div>
        </div>
    </section>
</body>
</html>