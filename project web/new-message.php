<div id="new-message">
<p class="m-header">New Message</p>
<p class="m-body">
<form align="center" method="POST">
<input type="text" list="user" onkeyup="check_in_db()"
class="message-input" placeholder="Email" name="email" id="email"/>
<datalist id="user"></datalist>
<!-- para ma show ang available user-->

<br><br>
<textarea class="message-input" name="message" placeholder="Write your message"></textarea>
<input type="submit" value="send" id="send" name="send"/>
<button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
</form> 
</p>
<p style="text-align: center;" class="m-footer">ONE PUNCH MARKET</p>
<!-- end of new message-->
</div>


<?php 
	require_once("config.php");
	if(isset($_POST['send'])){
		$sender_name=$_SESSION['admin'];
		$reciever_name= $_POST['email'];
		$message= $_POST['message'];
		$date= date("Y-m-d h:i:sa");
		$q='INSERT INTO message (id,sender_name,reciever_name,message_text,date_time)
		VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';
		$r= mysqli_query($conn,$q);
		if($r){
			//para sa message kung nag send
			header("location:adminmessage.php?user=".$reciever_name);
		}else{
			echo $q;
		}
	}
	
?>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
	//
	document.getElementById("send").disabled = true;

	function check_in_db(){
		var user_name = document.getElementById("email").value;
		$.post("check_in_db.php",
		{
			user: user_name
		},
		function(data,status){
			//alert(data);
		if(data== '<option value="no user">')	{
			document.getElementById("send").disabled = true;
		}else{
			document.getElementById("send").disabled = false;
		}
		document.getElementById('user').innerHTML = data;
		}
		);
	}

</script>