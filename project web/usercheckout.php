<?php
 require 'config.php';
 session_start();

  $name = $_POST['name'];
  $email = $_POST['E_mail'];
  $num= $_POST['phone'];
  $add = $_POST['address'];
  $pimage=$_POST['image'];
  $uid=$_SESSION["uid"];
  $pmode=$_POST['pmode'];
  $products=$_POST['products'];
  $grand_total=$_POST['grand_total'];
  $data ='';
  $vname = "/^[a-zA-Z ]+$/";
  $vemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
  $vnumber = "/^[0-9]+$/";


  if(empty($name) || empty($email) || empty($num) || empty($add)){
  	echo "<h5><div class='alert-danger text-center'><i class='fa fa-exclamation-circle'>
<strong>Please Complete Order Form </strong>
</i></div></h5>";
  }
  else{
  	if(!(strlen($num) == 11)){
echo "<h5><div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Mobile Number should be 11 digit</strong>
</i></div><h5>";
	}
else if(!preg_match($vemail,$email)){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
    <strong>Email is not Valid</strong>
    </i></div>";
    }
    else{
    	$stmt =$conn->prepare("INSERT INTO orders (user_id,name,email,phone,address,pmode,products,product_image,amount_paid)VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$uid,$name,$email,$num,$add,$pmode,$products,$pimage,$grand_total);
        $stmt->execute();
        $data .='
        <div class="card mt-3 mb-3">
	       <div class="text-center">
      <div class="card-header">
 <h3 class="display-4 mt-2 text-danger">Thank You<img src="logo.png" alt="ONE PUNCH MAN SHOP LOGO" style="height="70" width="80" ></h3>
  <h5 class="text-success">FOR shopping at ONE PUNCH MARKET</h5> 
		<h5 class="text-success">Your Order Places Successfully!</h5>
		<h5 class="bg-success text-light rounded p-3 ml-5 mr-5">Items Purchased : ' .$products.'</h5>
	</div>
      <div class="card-body">
    <p style="font-size: 20px" >Hello <b>' .$name.'</b> your order transaction is complete </p>
      <b style="font-size: 18px;">Please have this amount ready on delivery day</b><br>
      <b style="font-size: 18px; color: green;">&#8369; '.$grand_total.'</b><br><br>
      <b style="float:left;margin-bottom:5px;">Your address: ' .$add.'</b>
              </div>
      </div>
			</div>
';	
echo $data;
    if($uid == true){
      $stmt =$conn->prepare("DELETE FROM cart where user_id='$uid'");
        $stmt->execute();
    }
  }
}

  ?>