<?php
require'config.php';
session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
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

        <a class="nav-link active" href="userhome.php">HOME</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="userproduct.php">PRODUCT</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="userabout.php">ABOUT US</a>
      </li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i></a>
          <div class="dropdown-menu dropdown-menu-right"id="drp">
           <div id="right-col-container">
            <div class="m-header">
            <p>Admin</p>
            </div>
          <div id="messages-container"  >
             <div class="white-message">
             <img id="image" src="logo.png" style="float: left;" height="50px" width="50px" />
             <div id="white-message">
                <a href="" style="float: left; font-size: 12px; color: white;">Admin</a><br>
              <p>Chat me if you have any question/problem with your item</p> 
            </div>
          </div>
            <?php

  $no_message= false;
  if(isset($_SESSION['admin'])){
   $_SESSION['admin'] = $_SESSION['admin'];
  }else{// para sa user pag wala url bar
    $q='SELECT sender_name,reciever_name FROM message WHERE sender_name="'.$_SESSION['Email'].'"
    or reciever_name="'.$_SESSION['Email'].'"
    ORDER BY date_time DESC LIMIT 1';
    $r=mysqli_query($conn,$q);
      if($r){
        if(mysqli_num_rows($r) >0){
          while($row=mysqli_fetch_assoc($r)){
            $sender_name= $row['sender_name'];
            $reciever_name= $row['reciever_name'];
            if($_SESSION['Email'] == $sender_name){
              $_SESSION['admin'] = $reciever_name; 
            }else{
             $_SESSION['Email'] = $sender_name;
            }
          }
        }else{
         
          $no_message= true;
        }
      }else{
        echo $q;
      }

  }
  if($no_message == false){       
  $q='SELECT * FROM message WHERE sender_name="'.$_SESSION['Email'].'"
   AND reciever_name="'.$_SESSION['admin'].'" 
   OR sender_name="'.$_SESSION['admin'].'" AND reciever_name="'.$_SESSION['Email'].'"';
   $r=mysqli_query($conn, $q);
   if($r){
    while($row=mysqli_fetch_assoc($r)){
      $sender_name= $row['sender_name'];
      $reciever_name= $row['reciever_name'];
      $message = $row['message_text'];
      $date= strtotime($row['date_time']);
      $view=date("g:i A | M j ",$date);
      //para malaman kung cno and sender
      if($sender_name == $_SESSION['Email']){//para sa sender
        ?>
        <div class="grey-message">
             <div id="grey-message">
               <a href="" style="float: right; font-size: 12px; color: white ;"><?php  echo $_SESSION['Email']?></a><br>
              <p><?php echo $message; ?></p>
            </div>
          </div>
           <p style="float: right; margin: 0; margin-right: 4%; margin-bottom: 15px;" class="time_date"><?php echo$view  ?></p>
        <?php
      }else{//para sa reciever 
        ?>
        <div class="white-message">
             <img id="image" src="logo.png" style="float: left;" height="50px" width="50px" />
             <div id="white-message">
              <a href="" style="float: left; font-size: 12px; color: white;">Admin</a><br>
              <p><?php echo $message; ?></p>
            </div>
          </div>
      <p style="float: left; margin: 0; margin-left: 12%; margin-bottom: 15px;" class="time_date"><?php echo$view  ?></p>
        <?php
      }
    }
   }else{
    echo $q;
   }
 }
?>      
            </div>
              <form method="POST" id="message-form">
               <textarea class="textarea" id="message_text" placeholder="Write Your message" ></textarea>
               <button class="sendbtn" style="float: right; width: 55px; margin-bottom: 5px"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>

 <!-- end of right column container-->
         </div>
       </div>
       </li>
      

        <li class="nav-item">
          <a class="nav-link" href="usercart.php"><i class="fa fa-shopping-cart"></i>&nbsp;<span id="cart-item" class="badge badge-pill badge-success"></span></a>
       </li>

     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"><?php echo "Hi,".$_SESSION["fname"];  ?></i></a>
          <div class="dropdown-menu">
          <a class="dropdown-item-text" href="userorder.php">Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item-text" href="logout.php">Log out</a>
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

<script type="text/javascript">
  $(document).ready(function(){
    $(".addItemBtn").click(function(e){
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var uid= $form.find(".uid").val();
      var pid= $form.find(".pid").val();
       var pname= $form.find(".pname").val();
        var pprice= $form.find(".pprice").val();
         var pimage= $form.find(".pimage").val();
          var pcode= $form.find(".pcode").val();
          $.ajax({
            url:'useraddcart.php',
            method:'POST',
            data:{uid:uid,pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
              load_cart_item_number();
            }
          });
    });
    load_cart_item_number();
    function load_cart_item_number(){
      $.ajax({
        url:'useraddcart.php',
        method:'GET',
        data:{cartItem:"cart_item"},
        success:function(response){
          $("#cart-item").html(response);
        }
      });
    }
});
</script>
<!-- para sa mag send ang message-->
<script>
    //pag na submit na ang form
    $("#right-col-container").on('submit','#message-form',function(){
      //kukunin ang message input
      var message_text= $("#message_text").val();
      $.post("usersending.php?user=<?php echo $_SESSION['Email'];?>",
      {
        text:message_text,
      },
      function(data,status){

        $("#message_text").val("");

        //adding data to message container
        document.getElementById("messages-container").innerHTML += data;      
      }
      );
    });


    $("document").ready(function(event){//para sa enter button
       $(".sendbtn").click(function(e){//para sa enter button
        e.preventDefault();
          $("#message-form").submit();
      });

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