<?php

require'config.php';
 session_start();
 if(!isset($_SESSION["admin"])){
  header("location:product.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>OPM Admin</title>

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
	<!-- Navbar BUTTON -->
 		<!--navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand"><img src="logo.png" alt="ONE PUNCH MAN SHOP LOGO" height="35" width="60"></a>

  <!-- PARA SA RESPONSIVE  Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar BUTTON -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar sticky-top">
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
	<!--end of navbar-->
<?php
if(isset($_POST['submit'])){
	$pbrand=$_POST['pbrand'];
	$pname=$_POST['pname'];
	$pprice=$_POST['pprice'];
	$pcode=$_POST['pcode'];
	$vnumber = "/^[0-9]+$/";
	$target_dir="image/";
	$target_file=$target_dir.basename($_FILES['pimage']['name']);
	move_uploaded_file($_FILES['pimage']['tmp_name'],$target_file);
	if(empty($pbrand)){
		$msg="pbrand is empty";
	}else if(!preg_match($vnumber,$pprice)){
    echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Product price is invalid</strong>
      </div>";
  }else{
		$sql="SELECT product_code FROM product WHERE product_code ='$pcode' LIMIT 1";
  $check_query =mysqli_query($conn,$sql);
  $count_email = mysqli_num_rows($check_query);
  if($count_email>0){
    echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Try another product code product code is exist!</strong>
      </div>";
	}
    else{
	$sql="INSERT INTO product (brand,product_name,product_price,product_image,product_code)VALUES('$pbrand','$pname','$pprice','$target_file','$pcode')";
	if(mysqli_query($conn,$sql)){
		echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Item added to the Cart</strong>
      </div>";
	}
	else{
		$msg="Sorry item not added to data";
		}
	}
	}
}


?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 bg-light mt-3 rounded">
			<h4 class="text-center p-2">Adding Product in Cart</h4>
			<form action="" method="POST" class="p-2" enctype="multipart/form-data" id="form-box">
				<div class="form-group">
					<input type="text" name="pbrand" class="form-control" placeholder="Product Brand" required>
				</div>
				<div class="form-group">
					<input type="text" name="pname" class="form-control" placeholder="Product Name" required>
				</div>
				<div class="form-group">
					<input type="text" name="pprice" class="form-control" placeholder="Product Price" required>
				</div>
				<div class="form-group">
					<div class="custom-file">
					<input type="file" name="pimage" class="custom-file-input" id="customFile" required>
					<label for ="customFile" class="custom-file-label">Choose Product Image</label>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="pcode" class="form-control" placeholder="Product Code" required>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success btn-block" value="Add to DataBase">
				</div>
				<div class="form-group">
					<h5 class="text-center"></h5>
				</div>
			</form>
		</div>	
	</div>
	<div class="row justify-content-center">
		<div class="col-md-3 bg-light rounded">
			<a href="adminproduct.php" class="btn btn-warning btn-block btn-lg">Go to Products Page</a>
		</div>
	</div>
</div>
</body>
</html>