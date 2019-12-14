<?php

require 'config.php';
session_start();
  if(isset($_SESSION["uid"])){
  header("location:userfilter.php");}


	if(isset($_POST['action'])){
		$sql = "SELECT * FROM product WHERE brand !=''";

		if(isset($_POST['brand'])){
			$brand= implode("','",$_POST['brand']);
			$sql.="AND brand IN('".$brand."')";
		}
		$result = $conn->query($sql);
		$output = '';
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$output .='
	<div class="col-md-3 mb-2">
      <div class="card-deck">
        <div class="card border-secondary">
          <img src="'.$row['product_image'].'"
          class="card-img-top" height="200" >
          <div class="card-img">
            <h6 class="text-light bg-info text-center rounded p-1">'.$row['product_name'].'</h6>
          </div>
          <div class="card-body">
            <h4 class="card-title text-danger text-center"><i class="">&#8369;</i>'. number_format($row['product_price']).'</h4> 
          <form action="" class="form-submit">
              <input type="hidden" class="pid" value="'. $row['id'] .'">
               <input type="hidden" class="pname" value="'. $row['product_name'] .'">
                 <input type="hidden" class="pprice" value="'. $row['product_price'] .'">
                   <input type="hidden" class="pimage" value="'. $row['product_image'] .'">
                     <input type="hidden" class="pcode" value="'. $row['product_code'] .'">
                      <button class="btn btn-info btn-block addItemBtn"><i class="fa fa-cart-plus"></i>&nbsp;Add to Cart</button>
                       <button class="btn btn-success btn-block addItemBtn"><i class="fa fa-money"></i>&nbsp;Buy Now </button>
                     </form>
          </div>
        </div>
      </div>
    </div>';
			}
		}

		else{
			$output="<h3>SORRY WE DONT HAVE WHAT YOU LOOKING FOR</h3>";
		}
		echo $output;
	}


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
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
</body>
</html>