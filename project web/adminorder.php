<?php
require'config.php';
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
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o">Hi,Admin</i></a>
          <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item-text" href="adminlogout.php">Log out</a>
          </div>
           </li>
        </div>
    </ul>
  </div>
</nav>

	<p><br/></p>
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
							$orders_list = 'SELECT * FROM orders ';
							$query = mysqli_query($conn,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<!--<div class="col-md-6"><hr/>
												<img style="float:left; height: 100px; width: 100px;" src="<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>-->
											<div class="col-md-6">
												<table>
                          <tr><td>Buyer Email</td><td><b><?php echo $row["email"]; ?></b></td></tr>
													<tr><td>Product Order</td><td><b><?php echo $row["products"]; ?></b></td></tr>
													<tr><td>Product Price</td><td><b><?php echo "&#8369 ".$row["amount_paid"]; ?></b></td></tr>
													<tr><td>PaymentMethod</td><td><b><?php echo $row["pmode"]; ?></b></td></tr>
													<tr><td>Address</td><td><b><?php echo $row["address"]; ?></b><br></td></tr>

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
</html>
