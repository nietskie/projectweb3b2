<?php

session_start();
require_once("config.php");
if(isset($_SESSION['admin']) and isset($_SESSION['Email'])){
	if(isset($_POST['text'])){
		if($_POST['text'] !=''){
			$sender_name= $_SESSION['Email'];
			$reciever_name= $_SESSION['admin'];
			$message = $_POST['text'];
			$date = date("Y-m-d h:i:sa");
			$q='INSERT INTO message (id,sender_name,reciever_name,message_text,date_time)
			VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';
			$r= mysqli_query($conn,$q);
			if($r){//message send
				?>
	 			<div class="grey-message">
					<a href="#">Admin</a>
					<p><?php echo $message; ?></p>
				</div>
	 			<?php
			}else{//problem with query
				echo $q;
			}
		}else{
			echo' Please write something first';
		}
	}else{
		echo'problem with text';
	}
}else{
	echo 'Please Log in first or select a Email to send a message';
}

?>