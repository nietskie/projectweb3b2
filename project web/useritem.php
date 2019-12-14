<?php
require'config.php';
session_start();
if(!isset($_SESSION["Email"])){
  header("location:product.php");}
  else{
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM product WHERE id= '$id'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  $pname=$row['product_name'];
  $pprice=$row['product_price'];
  $detail=$row['details'];
  $pimage= $row['product_image'];
  $ppcode= $row['product_code'];
}else{
  echo 'No product Found!';
}
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
               <textarea class="textarea" id="message_text" placeholder="Write Your message" ></textarea>   <button class="sendbtn" style="float: right; width: 55px; margin-bottom: 5px"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
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
<div class="container">
  <div id="message"></div>
</div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 mb-5">
          <h2 class="text-center p-2 text-center"><?= $pname; ?></h2>
          <h3>Product Details:</h3>
          <table class="table table-bordered" width="500px">
            <th>Product Name:</th>
            <td><?= $pname; ?></td>
            <td rowspan="4" class="text-center"><a href="<?= $pimage; ?>"><img src="<?= $pimage; ?>"height="200" width="200"></a></td>
          </tr>
          <tr>          
          <tr>
            <th>Product Price:</th>
              <td><?= number_format($pprice);  ?></td>
          </tr>
           <tr>
            <th>Product Disciption:</th>
              <td><?=  $detail;   ?></td>
          </tr>
          </table>

            <style>
              .form-submit{
                float: right;
              }
            </style>
             <form action="" class="form-submit">
                <input type="hidden" class="uid" value="<?= $_SESSION['uid'] ?>">
              <input type="hidden" class="pid" value="<?= $id;?>">
               <input type="hidden" class="pname" value="<?= $pname; ?>">
                 <input type="hidden" class="pprice" value="<?= $pprice; ?>">
                   <input type="hidden" class="pimage" value="<?= $pimage; ?>">
                     <input type="hidden" class="pcode" value="<?= $ppcode; ?>">
                      <button class="btn btn-info btn-lg addItemBtn"><i class="fa fa-cart-plus"></i>&nbsp;Add to Cart</button>
                        <a  href="itemcheckout.php?id=<?= $id; ?>"class="btn btn-success btn-lg"><i class="fa fa-money"></i>&nbsp;Check out </a>
                     </form>
                     <style>
#star {font-size: 25px;}
.checked {color: orange;}
.side {float: left;width: 15%;margin-top: 10px;}
.middle {float: left;width: 70%;margin-top: 10px;}
.right {text-align: right;}
.row:after {content: "";display: table;clear: both;}
.bar-container {
  width: 100%;background-color: #f1f1f1;text-align: center;color: white;}
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}
@media (max-width: 400px) {
.side, .middle {width: 100%;}
.right {display: none;}}
</style>
<span class="heading">Buyers Rating</span>
<span id="star" class="fa fa-star checked"></span>
<span id="star"  class="fa fa-star checked"></span>
<span id="star"  class="fa fa-star checked"></span>
<span id="star"  class="fa fa-star checked"></span>
<span id="star"  class="fa fa-star"></span>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>150</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>63</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>15</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>6</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>20</div>
  </div>
</div>
        </div>
      </div>
  </div> 












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
</html>