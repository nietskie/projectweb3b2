<?php
	 session_start();
	require 'config.php';

	if(isset($_POST['uid'])){
		$pid=$_POST['pid'];
		$pname=$_POST['pname'];
		$pprice=$_POST['pprice'];
		$pimage=$_POST['pimage'];
		$pcode=$_POST['pcode'];
		$uid=$_SESSION["uid"];
		$pqty=1;
		$stmt=$conn->prepare("SELECT product_code FROM cart WHERE product_code=? and user_id='$uid'");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['product_code'];

		if(!$code){
		$query = $conn->prepare("INSERT INTO 
			cart(user_id,product_name,product_price,product_image,qty,total_price,product_code)
			VALUES (?,?,?,?,?,?,?)");
		$query->bind_param("ssssiss",$uid,$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
		$query->execute();
		echo '<div class="alert alert-success text-center alert-dismissible">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Item added to your cart!</strong>
			</div>';
		}
		else{
		echo '<div class="alert alert-danger text-center alert-dismissible">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<strong>Item already in your CART!</strong>
		</div>';
		}

	}
	if(isset($_GET['cartItem'])&& isset($_GET['cartItem']) == 'cart_item'){
		$uid=$_SESSION["uid"];
		$stmt=$conn->prepare("SELECT * FROM cart WHERE user_id=$uid");
		$stmt-> execute();
		$stmt-> store_result();
		$rows=$stmt->num_rows;
		echo$rows;
		}	


//Para sa remove Item

if(isset($_GET['remove'])){
	$id= $_GET['remove'];
	$uid=$_SESSION["uid"];
	$stmt= $conn->prepare("DELETE FROM cart WHERE id=? and  user_id='$uid'  ");
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$_SESSION['showAlert']= 'block';
	$_SESSION['message']='Your item is remove from the cart!';
	header('location:usercart.php');

}

//Para sa remove all item
if(isset($_GET['clear'])){
	$uid=$_SESSION["uid"];
	$stmt= $conn->prepare("DELETE FROM cart where user_id='$uid'");
	$stmt-> execute();
	$_SESSION['showAlert']= 'block';
	$_SESSION['message']= 'All item is remove from the cart!';
		header('location:usercart.php');

}
//Para sa quantity para mag add 
if(isset($_POST['qty'])){
	$qty= $_POST['qty'];
	$pid= $_POST['pid'];
	$uid=$_SESSION["uid"];
	$pprice= $_POST['pprice'];
	$tprice=$qty*$pprice;
	$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=? AND user_id='$uid'");
	$stmt->bind_param("isi",$qty,$tprice,$pid);
	$stmt->execute();
}

//Para sa cancel order
if(isset($_GET['cancel'])){
	$id= $_GET['cancel'];
	$uid=$_SESSION["uid"];
	$stmt= $conn->prepare("DELETE FROM orders WHERE id=? and  user_id='$uid'  ");
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$_SESSION['showAlert']= 'block';
	$_SESSION['message']='Your item successfull cancel!';
	header('location:userorder.php');

}
?>