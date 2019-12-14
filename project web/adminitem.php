<?php
require'config.php';
 session_start();
 if(!isset($_SESSION["admin"])){
  header("location:index.php");
}
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

</body>
</html>