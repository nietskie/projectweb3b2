<?php
	 session_start();
	require 'config.php';

	if(isset($_POST['pid'])){
		$pid=$_POST['pid'];
		$pname=$_POST['pname'];
		$pprice=$_POST['pprice'];
		$pimage=$_POST['pimage'];
		$pcode=$_POST['pcode'];

		$pqty=1;
		$stmt=$conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['product_code'];

		if(!isset($_SESSION["uid"])){
 			echo '<div class="alert alert-danger text-center alert-dismissible">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<strong>Please Login First</strong>
		</div>';}
		
		else if(!$code){
		$query = $conn->prepare("INSERT INTO 
			cart(product_name,product_price,product_image,qty,total_price,product_code)
			VALUES (?,?,?,?,?,?)");
		$query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
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
		$stmt=$conn->prepare("SELECT * FROM cart");
		$stmt-> execute();
		$stmt-> store_result();
		$rows=$stmt->num_rows;
		echo$rows;
		}	


//Para sa remove Item

if(isset($_GET['remove'])){
	$id= $_GET['remove'];

	$stmt= $conn->prepare("DELETE FROM cart WHERE id=?");
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$_SESSION['showAlert']= 'block';
	$_SESSION['message']='Your item is remove from the cart!';
	header('location:cart.php');

}

//Para sa remove all item
if(isset($_GET['clear'])){
	$stmt= $conn->prepare("DELETE FROM cart");
	$stmt-> execute();
	$_SESSION['showAlert']= 'block';
	$_SESSION['message']= 'All item is remove from the cart!';
		header('location:cart.php');

}
//Para sa quantity para mag add 
if(isset($_POST['qty'])){
	$qty= $_POST['qty'];
	$pid= $_POST['pid'];
	$pprice= $_POST['pprice'];
	$tprice=$qty*$pprice;
	$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
	$stmt->bind_param("isi",$qty,$tprice,$pid);
	$stmt->execute();
}

if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
if(!isset($_SESSION["uid"])){
		echo "Please Login First";
	}

}

?>