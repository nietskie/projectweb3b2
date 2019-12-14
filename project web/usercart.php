<?php
require 'config.php';
session_start();
if(!isset($_SESSION["uid"])){
  header("location:cart.php");}

?>
<!DOCTYPE html>
<html>
<head>
  <title>OPM CART </title>

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

<div class="container bg-white">
  
    <div class="row justify-content-center">
      <div class="col-lg-11">
      <!-- para sa remove item notif -->
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else { echo'none'; } unset($_SESSION['showAlert']);  ?>"  
        class="alert alert-success alert-dismissible  text-center mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']);  ?></strong>
        </div>
        
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
           <thead>
              <tr>
              <td colspan="7">
                <h4 class="text-center text-info m-0">Products in your Cart
                </h4>
              </td>
            </tr>
            <tr>
              <th>ID</th>
               <th>Image</th>
                   <th>Name</th>
                <th>Price</th>
                 <th>Quantity</th>
                  <th>Total Price</th>
                   <th>
                     <a href="useraddcart.php?clear=all" class="badge-danger badge p-2 " onclick="return confirm('Are you want to clear your cart?');"><i class="fa fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                   </th>
            </tr>         
           </thead>
           <tbody>
             <?php
             require 'config.php';
             $uid=$_SESSION["uid"];
             $stmt= $conn->prepare("SELECT * FROM cart WHERE user_id='$uid'");
             $stmt->execute();
             $result=$stmt->get_result();
             $grand_total = 0;
             while($row = $result->fetch_assoc()):
             ?>
             <tr>
              <td><?= $row['id'] ?></td>
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
              <td><img src="<?=$row['product_image'] ?>" width="50"></td>
              <td><?= $row['product_name'] ?></td>
              <td><i class="">&#8369;&nbsp;</i><?=number_format($row['product_price'])?></td>
              <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
              <td><input type="number" class="form-control  itemQty"value="<?= $row['qty']?>" style="width:75px"></td>
              <td><i class="">&#8369;&nbsp;</i><?=number_format($row['total_price'])?></td>
              <td>
                <a href="useraddcart.php?remove=<?= $row['id'] ?>" class="text-danger" onclick="return confirm('Are you Sure you want remove this item');" ><i class="fa fa-trash"></i></a>
              </td>
             </tr>
             <?php $grand_total +=$row['total_price']; ?>
             <?php  endwhile; ?>
             <tr>
               <td colspan="3">
                 <a href="userproduct.php" class="btn btn-info">Continue Shopping&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></a> </td>
                 <td colspan="2"><b>Total of All Items</b></td>
                 <td><i class="">&#8369;</i><?= number_format($grand_total); ?></td>
                 <td>
                  <a href="checkout.php" class="btn btn-success <?= ($grand_total>1)?"":"disabled"; ?>"><i class="fa fa-money">&nbsp;&nbsp;</i>Checkout</a>
                 </td>
             </tr>
           </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
  

<script type="text/javascript">
 $(document).ready(function(){

//para maka add ng quantity
$(".itemQty").on('change',function(){
var $el =$ (this).closest('tr');
var pid =$el.find(".pid").val();
var pprice =$el.find(".pprice").val();
var qty =$el.find(".itemQty").val();
location.reload(true);
$.ajax({
url:'useraddcart.php',
method:'POST',
cache: false,
data:{qty:qty,pid:pid,pprice:pprice},
success:function(response){
  console.log(response);
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