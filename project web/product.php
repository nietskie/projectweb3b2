<?php
  require'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>OPM Market</title>

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
        <a class="nav-link" href="index.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="product.php">PRODUCT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT US</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT</a>
      </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">JOIN</a>


       <div class="dropdown-menu dropdown-menu-right">
                      <div style="width: 300px; padding: 15px;">


              <h3 style="text-align: center;  color: black;">Register</h3>

              <div id="e_msg" style="font-size: 13; margin-bottom: 10px; margin-top: 15px;">
                     <!-- message for registration-->
                  </div>
                <form method="POST">
                  <label style="color: black;" for="f_name">Full Name</label>
                 <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter Fullname" required />
                <label  style="color: black;" for="E_mail">Email</label>
                <input type="email" class="form-control" id="E_mail" name="E_mail" placeholder="Enter Email" required />

                   <label  style="color: black;" for="number">Mobile Number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Enter Mobile Number" required />
                <label  style="color: black;" for="pass">Password</label>
                 <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required />
                 <label  style="color: black;" for="confirmpassword">Confirm Password</label>
                 <input type="password" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password" name="confirmpassword" required />
                 <p><br/></p>
                <input type="submit" class="btn btn-success registerbtn" style="width: 270px;" value="Submit">
                   </form>
          </div>
          </div>

      </li>
      

      <li class="nav-item"> 
      <a class="nav-link" href="userlogin.php"><i class="fa fa-user-o" aria-hidden="true"></i></i></a>
      </li>
      
    </ul>
  </div>
</nav>

<!--end of navbar-->

<!-- para sa notification-->
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
          class="card-img-top" height="200"  >
          <div class="card-img">
            <h6 class="text-light bg-info text-center rounded p-1"><?= $row['product_name'];?></h6>
          </div>
          <div class="card-body">
            <h4 class="card-title text-danger text-center"><i class="">&#8369;</i><?= number_format($row['product_price']);?></h4> 
            <form action="" class="form-submit">
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
               <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                 <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                   <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                     <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                      <button class="btn btn-info btn-block addItemBtn"><i class="fa fa-cart-plus"></i>&nbsp;Add to Cart</button>
                        <button class="btn btn-success btn-block addItemBtn"><i class="fa fa-money"></i>&nbsp;Buy Now </button>
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


<!-- PARA Sa REGISTRATION-->
<script type="text/javascript">
   $(document).ready(function(){
  $(".registerbtn").click(function(event){
    event.preventDefault();
    $.ajax({
      url:'register.php',
      method:'POST',
      data :$("form").serialize(),
      success: function(data){
     $("#e_msg").html(data);

      }
    })


  })
});
</script>


<!-- PARA Sa LOGIN-->
<script type="text/javascript">
   $(document).ready(function(){
  $(".loginbtn").click(function(event){
    event.preventDefault();
        $.ajax({
      url:'login.php',
      method:'POST',
      data :$("form").serialize(),
      success: function(data){
      if(data == "reyesreyesrereyesreyesreyes"){
        window.location.href="userproduct.php";
      }else if(data == "adminadminadminasdminasd"){
        window.location.href="adminhome.php";
      } else {
        alert(data);
      }
      }
    })


  })
});
</script>


  <!--para sa Add cart code -->

<script type="text/javascript">
  $(document).ready(function(){
    $(".addItemBtn").click(function(e){
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid= $form.find(".pid").val();
       var pname= $form.find(".pname").val();
        var pprice= $form.find(".pprice").val();
         var pimage= $form.find(".pimage").val();
          var pcode= $form.find(".pcode").val();
          $.ajax({
            url:'addcart.php',
            method:'POST',
            data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
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
        url:'addcart.php',
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
        url:'filter.php',
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