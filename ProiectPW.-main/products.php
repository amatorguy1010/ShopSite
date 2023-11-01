<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="header"> 

<a href="#"><img class="logo" src="poze/facebook_cover_photo_2.png" alt="logo image" width="250" height="100"></a>

<div>
    <ul id="navbar">
        <li><a href="index.html">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="about.html">Abous Us</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
        <li id="lg-bag"><a href="http://localhost/Proiect/ProiectPW.-main/add_item.php"><i class="fa-solid fa-plus"></i></a></li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
    </ul>
</div>

<div class="responsive">
    
    <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
    <i id="bar" class="fas fa-outdent"></i>
   
</div>

</section>


<div class="container">

<section class="products">

   <h1 class="heading">View the latest products added</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>
<section class="sign">
        <div class="news">
            <h4>Sign Up for Latest Offers</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers</span>.</p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button>Sign In</button>
        </div>
    </section>

    <footer>
        <div class="col">
            <img src="poze/facebook_cover_photo_2.png" width="200">
            <h4>Contact</h4>
            <p><b>Adress: </b> Aleea Ripensia , nr.33, Timisoara</p>
            <p><b>Phone:</b> 0751 890 995</p>
            <p><b>Program:</b> 9:00-17:00, Monday-Friday</p>
            <h4>Follow Us</h4>
            <div class="media">

                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="">About Us</a>
            <a href="">Delivery Information</a>
            <a href="">Privacy Policy</a>
            <a href="">Terms & Conditions</a>
            <a href="">Contact Us</a>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="">My Account</a>
            <a href="">Sign In</a>
            <a href="">View Cart</a>
            <a href="">My Wishlist</a>
            <a href="">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>Form App Store or Google Play</p>
            <div class="cards">
                <img src="poze/app.jpg" alt="">
                <img src="poze/play.jpg" alt="">
            </div>
                <p>Secured Payments</p>
                <img src="poze/pay.png" alt="">
            
        </div>
    </footer>
</body>
</html>