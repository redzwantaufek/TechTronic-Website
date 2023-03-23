<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include '../components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="search.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>TechTronic | Search</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>

 <!-----------------header navigation------------------>
 <header>
        <div class="navbar">
            <nav>
                <ul>
                    <li>
                        <a href="home.html">
                            <img src="Images/logo 2.png" alt="logo">
                        </a>
                    </li>
                    <li><a href="home.html" class="current">Home</a></li>
                    <li>
                        <a href="/Product/product.html">Product <i class="fa fa-caret-down"></i></a>
                            <ul>
                                <li><a href="/Product/product.html">All Products</a></li>
                                <li><a href="">Laptops And Desktop PC</a></li>
                                <li><a href="">Mobiles and Tablets</a></li>
                                <li><a href="">Parts And Accessories</a></li>
                                <li><a href="">Audio Zone</a></li>
                                <li><a href="">Wearable And Gadgets</a></li>
                            </ul>
                    </li>
                    <li><a href="/About/about.html">About</a></li>
                    <li><a href="/Contact/contact.html">Contact</a></li>
                    <li>
                        <a href="/Account/account.html">Account <i class="fa fa-caret-down"></i></a>
                            <ul>
                                <li><a href="">My Account</a></li>
                                <li><a href="">My Order</a></li>
                                <li><a href="/Login/login.html">Sign Up / Sign In</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search" href ="#"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/Cart/cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>  
                    </li>
                </ul>
            </nav>
        </div>
    </header>
   
   <!-----------------search bar------------------>
   <section class="search-form">
      <form action="" method="post">
         <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>
   </section>

   <section class="products" style="padding-top: 0; min-height:100vh;">

      <div class="box-container">

      <?php
      if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
      $search_box = $_POST['search_box'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'"); 
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
         <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
         <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
         <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
         <div class="name"><?= $fetch_product['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
         </div>
         <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products found!</p>';
         }
      }
      ?>

      </div>

   </section>

   <!-----------------footer------------------>

   <footer>
        <div class="footer-col-2">
        <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Tech Accessible to the Many.</p>
            </div>
                <div class="row"><img class="footer-logo" src="Images/logo 1.png">
                    <div class="footer-col-1">
                        <h3>Download our app</h3>
                        <p>Download App for Android and ios mobile phone.</p>
                        <div class="app-logo">
                            <a href="https://www.apple.com/my/app-store/" target ="_blank"><img src="Images/play-store.png"></a>
                            <a href="https://play.google.com/store/games?hl=en&gl=US&pli=1" target ="_blank"><img src="Images/app-store.png"></a>
                        </div>
                    </div>
                <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                    <li><a href="https://instagram.com/" target="_blank">Instagram</a></li>
                    <li><a href="https://www.youtube.com/" target="_blank">Youtube</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copy-right">© 2023 TecTronic Store. All Rights Reserved</p>
    </footer>

   <!--Javascript-->
   <script src="search.js"></script>
   <script src="../js/script.js"></script>

</body>
</html>