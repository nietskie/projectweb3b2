<?php
require'config.php';
session_start();
if(!isset($_SESSION["uid"])){
  header("location:product.php");
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

        <a class="nav-link " href="userhome.php">HOME</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="userproduct.php">PRODUCT</a>
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
          <a class="nav-link" href="usercart.php"><i class="fa fa-shopping-cart"></i>&nbsp;<span id="cart-item" class="badge badge-pill badge-success"></span></a>
       </li>

     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"><?php echo "Hi,".$_SESSION["fname"];  ?></i></a>
          <div class="dropdown-menu">
          <a class="dropdown-item-text" href="userorder.php">Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item-text" href="logout.php">Log out</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div id="message"></div>
</div>

<div class="container-fluid">
  <div class="row">
   <!-- para sa filter ang product-->
    <div class="col-lg-3">
      <h5> Filter Product</h5>
      <hr>
      <h6>Select ITEM</h6>
      <ul class="list-group">
        <?php
        $sql="Select DISTINCT brand from product ORDER  BY brand";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <li class="list-group-item">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check" value="<?= $row['brand']; ?>" id="brand"><?= $row['brand'];?>
          </label>
        </div>
        </li>
        <?php } ?>
      </ul>
    </div>

<!-- para ma display and products-->
  <div class="col-lg-9">
    <h5 class="text-center" id="textChange">All Products</h5>
    <hr>
    <div class="row" id="result">
      <?php    
      $sql="SELECT * FROM product";
      $result=$conn->query($sql);
      while($row=$result->fetch_assoc()){
    ?>

    <div class="col-md-3 mb-2">
      <div class="card-deck">
        <div class="card border-secondary">
          <a href="<?= $row['product_image'];?>"><img src="<?= $row['product_image'];?>"
          class="card-img-top" height="200" ></a>
          <div class="card-img">
            <h6 class="text-light bg-info text-center rounded p-1"><?= $row['product_name'];?></h6>
          </div>
          <div class="card-body">
            <h4 class="card-title text-danger text-center"><i class="">&#8369;</i><?= number_format($row['product_price']);?></h4> 
            <form action="" class="form-submit">
                <input type="hidden" class="uid" value="<?= $_SESSION['uid'] ?>">
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
               <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                 <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                   <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                     <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                      <button class="btn btn-info btn-block addItemBtn"><i class="fa fa-cart-plus"></i>&nbsp;Add to Cart</button>
                        <a  href="useritem.php?id=<?= $row['id']; ?>"class="btn btn-success btn-block"><i class="fa fa-money"></i>&nbsp;Buy Now </a>
                     </form>
          </div>
                
        </div>

      </div>
    </div>
     <?php } ?>
  </div>
    </div>

</div>
</div>






 <!--para sa Add cart code -->
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




<!--para sa check box code -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".product_check").click(function(){
      var action = 'data';
      var brand = get_filter_text('brand');
      $.ajax({
        url:'userfilter.php',
        method:'POST',
        data:{action:action,brand:brand},
        success:function(resposnse){
          $("#result").html(resposnse);
          $("#textChange").text("Filtered Products");
        }
      });
    });
   function get_filter_text(text_id){
    var filterData = [];
    $('#'+text_id+':checked').each(function(){
      filterData.push($(this).val());
    });   
     return filterData;
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