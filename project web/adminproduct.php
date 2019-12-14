<?php
require'config.php';
session_start();
  if(!isset($_SESSION["admin"])){
  header("location:product.php");}
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
        <a class="nav-link dropdown-toggle"href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o">Hi,Admin</i></a>
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
          <img src="<?= $row['product_image'];?>"
          class="card-img-top" height="200" >
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
                      <a  href="adminitem.php?id=<?= $row['id']; ?>"class="btn btn-info btn-block"></i>See Details</a>
                     </form>
          </div>
                     </form>


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



</body>
</html>