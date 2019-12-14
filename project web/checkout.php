<?php
require 'config.php';
session_start();
if(!isset($_SESSION["uid"])){
  header("location:cart.php");
}
else{
require 'config.php';
//para ma display and product details sa checkout
$grand_total=0;
$allItems='';
$items = array();
$id=$_SESSION["uid"];

$sql="SELECT CONCAT(product_name,'(',qty,')') AS ItemQty,total_price FROM cart WHERE user_id='$id' ";
$stmt =$conn->prepare($sql);
$stmt ->execute();
$result= $stmt->get_result();
while($row = $result->fetch_assoc()){
	$grand_total+=$row['total_price'];
	$items[]=$row['ItemQty'];
}
$allItems = implode(",",$items);
}
?>





<!DOCTYPE html>
<html>
<head>
  <title>ONE PUNCH MAN SHOP</title>

  <meta charset="UTF-8">

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
<video id="vid" poster="" autoplay loop > 
  <source src="cart.mp4"  type="video/mp4" width="50">
</video>
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
        <a class="nav-link" href="userhome.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="userproduct.php">PRODUCT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userabout.php">ABOUT US</a>
      </li>

              <!-- for mail css-->
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
               <textarea class="textarea" id="message_text" placeholder="Write Your message" ></textarea><button class="sendbtn" style="float: right; width: 55px; margin-bottom: 5px"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
 <!-- end of right column container-->
         </div>
       </div>
       </li>

      <li class="nav-item">
      <a class="nav-link active"  href="usercart.php">                
      <i class="fa fa-shopping-cart"></i>
      <span id="cart-item" class="badge badge-pill badge-success"></span></a>
    </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"><?php echo "Hi,".$_SESSION["fname"];  ?></i></a>
          <div class="dropdown-menu">
          <a class="dropdown-item-text" href="userorder.php">Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item-text" href="logout.php">Log out</a>
          </div>
           </li>
    </ul>
  </div>
</nav>
<!-- para sa notification-->
<div class="container">
  <div id="message"></div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-9 px-4 pb4 bg-white" id="order">

              <div id="e_msg" style="font-size: 13; text-align: center; margin-bottom: 10px; margin-top: 15px;">
                     <!-- message for registration-->
                   </div>
				<h4 class="text-center text-info p-2">Complete Your Oder!</h4>
				<div class="jumbotron p-3 mb-2 text-center" style="float: left; max-width:350px">
						<h6 class="lead"><b>Product(s):</b><?= $allItems; ?></h6>
						<h6 class="lead"></b>Delivery Charge:</b>Free</h6>
						<h5><b>Total Amount to Pay :</b><i class="">&nbsp;&#8369;<?= number_format($grand_total) ?></i></h5>	
			</div>
			<form action=""method="post" id="placeOrder" style="float: right; width:450px;">
         <input type="hidden" class="uid" value="<?=  $_SESSION['uid']; ?>">
                   <input type="hidden" name="image" value="">
         <input type="hidden" name="products" value="<?= $allItems; ?>">
					<input type="hidden" name="grand_total" value="<?= $grand_total ?>">
					<div class="form-group">
							<input type="text" name="name" id="name" class="form-control"
							value="<?php echo $_SESSION['fname']; ?>" required>
							</div>
						<div class="form-group">
							<input type="text" name="E_mail" id="E_mail" class="form-control"
							value="<?php echo $_SESSION['Email']; ?>" required>
						</div>
							<div class="form-group">	
							<input type="text" name="phone" id="phone" class="form-control"
							value="<?php echo $_SESSION['number']; ?>" required>
					</div>
					<div class="form-group">
						<textarea name="address" class="form-control" id="address" rows="3" cols="10" placeholder="Enter Delivery Address" required ></textarea>
						
					</div>
					<h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
          </div>
           <input type="hidden" class="pmode" name="pmode" value="Cash on Delivery">
           <input type="hidden" class="pmode2" name="pmode2" value="Paypal">
          <div class="form-group">
              <input style="margin-bottom: 5px;height: 45px;font-size:20px;" type="submit" name="Submit" value="Cash on Delivery" class="btn btn-success btn-block checkbtn">
               <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                layout: 'horizontal'
            }
        }).render('#paypal-button-container');
    </script>
          </div>
			</form>
		</div>
	</div>
</div>




<!-- PARA Sa checkout validation-->
<script type="text/javascript">
   $(document).ready(function(){
  $(".checkbtn").click(function(event){
    event.preventDefault();
    $.ajax({
      url:'usercheckout.php',
      method:'POST',
      data :$("form").serialize(),
      success: function(data){
     $("#e_msg").html(data);

      }
    })


  })
});
</script>

  <!--para sa Add cart code -->
<script type="text/javascript">
  $(document).ready(function(){

  	$("#placeOrder").submit(function(e){
  		e.preventDefault();
  		$.ajax({
  			url:'useraddcart.php',
  			method:'POST',
  			data: $('form').serialize()+"&action=order",
  			success:function(response){
  				$("#order").html(response);
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
</html>