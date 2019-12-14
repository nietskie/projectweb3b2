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
	<link rel="stylesheet" type="text/css" href="mail.css">

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
      <style>
.nav-link{
font-size: 14px;}
#drp{
margin: 0;padding: 0;border-radius: .4em;background: white;}
.m-header{
background: black;margin: 0px;color: white;padding: 5px;font-size: 20px; text-align: left; height: 45px; }
#messages-container{
height: 300px;width:500px;overflow: auto;margin-bottom: 50px; background:white;border-radius: .4em}
.textarea{
width: 87%;height:10%;border-radius: .4em;position: absolute;bottom:1%;margin:0px auto;}
.grey-message, .white-message{
width: 96%;padding: 5px;margin:0px auto;margin-top: 2px;}
.grey-message{
background:white;float: right;color: white;}
.white-message{
float:right;color: black;margin-right: 20px;}
#grey-message,#white-message{
border:1px solid black;width: 60%;padding: 5px;margin:0px auto;margin-top: 2px;overflow: auto;}
#grey-message{
position: relative;background:#000000;border-radius: .4em;text-align: right;   float: right;color: white;}
#white-message{
position: relative;background:#000000;border-radius: .4em;float:left;color: white;
}
      </style>

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
           </li>
        </div>
    </ul>
  </div>
</nav>
	<p><br/></p>
   <!-- para sa remove item notif -->
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else { echo'none'; } unset($_SESSION['showAlert']);  ?>"  
        class="alert alert-success alert-dismissible  text-center mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']);  ?></strong>
        </div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order details</h1>
						<hr/>
						<?php
							$user_id = $_SESSION["uid"];
							$orders_list = 'SELECT * FROM orders WHERE user_id="'.$_SESSION['uid'].'"';
							$query = mysqli_query($conn,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<div class="col-md-6"><hr/>
												<img style="float:left; height: 200px; width: 300px;" src="<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
                          <input type="hidden" class="pid" value="<?= $row['id'] ?>">
													<tr><td>Product Order</td><td><b><?php echo $row["products"]; ?></b></td></tr>
													<tr><td>Product Price</td><td><b><?php echo "&#8369 ".$row["amount_paid"]; ?></b></td></tr>
													<tr><td>Mobile Number</td><td><b><?php echo $row["phone"]; ?></b></td></tr>
													<tr><td>PaymentMethod</td><td><b><?php echo $row["pmode"]; ?></b></td></tr>
													<tr><td>Address</td><td><b><?php echo $row["address"]; ?></b></td></tr>
                           <tr><td><br><button style="width: 80px; font-size:14px;  margin-right: 5px;" ><a href="useraddcart.php?cancel=<?= $row['id'] ?>" class="text-danger" onclick="return confirm('Are you Sure you want to cancel this item');"><i class="fa fa-ban" aria-hidden="true"> Cancel</i></a></button>
                           </div><br><br></td></tr>
													  <hr/>
												</table>
											</div>
										</div>
									<?php
								}
							}
						?>			
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
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
</html>
