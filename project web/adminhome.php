<?php
session_start();
  if(!isset($_SESSION["admin"])){
  header("location:index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ONE PUNCH MARKET</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="newstyle.css">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" ><!-- FOR FONT AWESOME ICON-->

	<link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!-- for css bootsrap 4 -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
	<!--navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <!-- Brand -->
  <a class="navbar-brand"><img src="logo.png" alt="ONE PUNCH MAN SHOP LOGO" height="35" width="60"></a>

  <!-- PARA SA RESPONSIVE  Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar BUTTON -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">

        <a class="nav-link active" href="adminhome.php">HOME</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="adminproduct.php">PRODUCT</a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="admincart.php">ADD PRODUCT</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="adminmessage.php"><i class="fa fa-envelope-o"></i></a>
      </li>

       <li class="nav-item">
          <a class="nav-link" href="adminorder.php"><i class="fa fa-shopping-cart">&nbsp;ORDERS</i>&nbsp;</a>
       </li>

     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o">Welcome,Admin</i></a>
          <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item-text" href="adminlogout.php">Log out</a>
          </div>
           </li>
        </div>
    </ul>
  </div>
</nav>
      


	


<!-- Masthead -->
  <header  class="masthead text-white ">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
        <br><br><br><br>  <br><br><br><br>
        </div>
     
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Affordable Price</h3>
            <p class="lead mb-0">Price are Double than usual price</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>100% Authentic ITEM </h3>
            <p class="lead mb-0">Our Item is All made in China</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Life Saver</h3>
            <p class="lead mb-0"> Saitama Will Help you</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('back1.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Affordable Price</h2>
          <p class="lead mb-0">When you use this website for the first time we will triple the amount of Item for you!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('back2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>100% Authentic ITEM </h2>
          <p class="lead mb-0">
            Every item  was come to china to secure better life span of the item and
            Every item was test 3 months in china to sure if the item was good 
          </p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('back3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Life Saver</h2>
          <p class="lead mb-0">If you  become member of one punch man market premium account Fear No more Saitama Will be  on your Side to Help you and Train You</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
            <h5>Jabez A.</h5>
            <p class="font-weight-light mb-0">" Train hard if you are premium member or you will become blood  "</p><br><p>"I LOVE ONE PUNCH MARKET"</p>
          </div>
        </div>
          <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
            <h5>Saitama</h5>
            <p class="font-weight-light mb-0">"JOIN now and your life will be save we are having a promo if you join now we will Quadruple the price for you"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>Issac G.</h5>
            <p class="font-weight-light mb-0">"The price is so affordable i spent 3years of my salary for only 1 short "</p><br><p>"I LOVE ONE PUNCH MARKET"</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; One Punch Man Market. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

<!-- PARA Sa REGISTRATION-->
<script type="text/javascript">
   $(document).ready(function(){
  $(".registerbtn").click(function(event){
    event.preventDefault();
    $.ajax({
      url:'register.php',
      method:'POST',
      data :$("form").serialize(),
      success: function(data){
     $("#e_msg").html(data);

      }
    })


  })
});
</script>


<!-- PARA Sa LOGIN-->
<script type="text/javascript">
   $(document).ready(function(){
  $(".loginbtn").click(function(event){
    event.preventDefault();
        $.ajax({
      url:'login.php',
      method:'POST',
      data :$("form").serialize(),
      success: function(data){
      if(data == "reyesreyesrereyesreyesreyes"){
        window.location.href="userhome.php";
      }
     else if(data == "adminadminadminasdminasd"){
        window.location.href="admincart.php";
      }
      else
      {
        alert("data");
      }
      }
    })


  })
});
</script>
</body>
<style>
  header.masthead {position: relative;background-color: #343a40;background: url("back.jpg") no-repeat center center;background-size: cover;padding-top: 8rem;padding-bottom: 8rem;}
header.masthead .overlay {position: absolute;background-color: #212529;height: 100%;width: 100%;top: 0;left: 0;opacity: 0.3;}
header.masthead h1 {font-size: 2rem;}
@media (min-width: 768px) {header.masthead {padding-top: 12rem;padding-bottom: 12rem; }
header.masthead h1 {font-size: 3rem;}}.showcase .showcase-text {padding: 3rem;}
.showcase .showcase-img {min-height: 30rem;background-size: cover;}
@media (min-width: 768px) {.showcase .showcase-text {padding: 7rem;}}
.features-icons {padding-top: 7rem;padding-bottom: 7rem;}
.features-icons .features-icons-item {max-width: 20rem;}
.features-icons .features-icons-item .features-icons-icon {height: 7rem;}
.features-icons .features-icons-item .features-icons-icon i {font-size: 4.5rem;}
.features-icons .features-icons-item:hover .features-icons-icon i {font-size: 5rem;}
.testimonials {padding-top: 7rem;padding-bottom: 7rem;}
.testimonials .testimonial-item {max-width: 18rem;}
.testimonials .testimonial-item img {max-width: 12rem;box-shadow: 0px 5px 5px 0px #adb5bd;}
footer.footer {padding-top: 4rem;padding-bottom: 4rem;} 
</style>
</html>