<div id="right-col-container">
<div id="messages-container">

<?php
	$no_message= false;
	if(isset($_GET['user'])){
		$_GET['user'] = $_GET['user'];
	}else{// para sa user pag wala url bar
		$q='SELECT sender_name,reciever_name FROM message WHERE sender_name="'.$_SESSION['admin'].'"
		or reciever_name="'.$_SESSION['admin'].'"
		ORDER BY date_time DESC LIMIT 1';
		$r=mysqli_query($conn,$q);
			if($r){
				if(mysqli_num_rows($r) >0){
					while($row=mysqli_fetch_assoc($r)){
						$sender_name= $row['sender_name'];
						$reciever_name= $row['reciever_name'];
						if($_SESSION['admin'] == $sender_name){
							$_GET['user'] = $reciever_name;	
						}else{
							$_GET['user'] = $sender_name;
						}
					}
				}else{
					echo 'No Message ';
					$no_message= true;
				}
			}else{
				echo $q;
			}

	}
	if($no_message == false){
	$q='SELECT * FROM message WHERE sender_name="'.$_SESSION['admin'].'"
	 AND reciever_name="'.$_GET['user'].'"
	 OR sender_name="'.$_GET['user'].'" AND reciever_name="'.$_SESSION['admin'].'"';
	 $r=mysqli_query($conn, $q);
	 if($r){
	 	while($row=mysqli_fetch_assoc($r)){
	 		$sender_name= $row['sender_name'];
	 		$reciever_name= $row['reciever_name'];
	 		$message = $row['message_text'];
	 		$date= strtotime($row['date_time']);
	 		$view=date("g:i A | M j ",$date);
	 		//para malaman kung cno and sender
	 		if($sender_name== $_SESSION['admin']){//para sa sender
	 			?>
	 			 <div class="grey-message">
             <div id="grey-message">
               <a href="" style="float: right; font-size: 12px; color: white ;">Admin</a><br>
              <p><?php echo $message; ?></p>
              
            </div>
          </div>
           <p style="float: right; margin: 0; margin-right: 45%; margin-bottom: 15px;" class="time_date"><?php echo$view  ?></p>
	 			<?php
	 		}else{//para sa reciever 
	 			?>
	 			<style>

	 			</style>
	 			<div class="white-message">
             <div id="white-message">
              <a href="" style="float: left; font-size: 12px; color: white;"><?php echo$_GET['user'] ?></a><br>
              <p><?php echo $message; ?></p>
            </div>
          </div>
          <p style="float: right; margin: 0; margin-right: 43%; margin-bottom: 15px;" class="time_date"><?php echo$view  ?></p>
	 			<?php
	 		}
	 	}
	 }else{
	 	echo $q;
	 }
}
?>

<!-- end of message container -->
</div>
<form method="POST" id="message-form">
<textarea class="textarea" id="message_text" placeholder="Write Your message"></textarea>
</form>
<!-- end of right column container-->
</div>
<!-- end of right column-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		//pag na submit na ang form
		$("#right-col-container").on('submit','#message-form',function(){
			//kukunin ang message input
			var message_text= $("#message_text").val();
			$.post("sending.php?user=<?php echo $_GET['user'];?>",
			{
				text:message_text,
			},
			function(data,status){

				$("#message_text").val("");

				//adding data to message container
				document.getElementById("messages-container").innerHTML += data;			
			}
			);
		});


		$("document").ready(function(event){//para sa enter button
			$("#right-col-container").keypress(function(e){//para sa enter button
				if(e.keyCode == 13 && !e.shiftKey){
					$("#message-form").submit();
				}
			});

		});
	</script>