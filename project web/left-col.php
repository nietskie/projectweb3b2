<div id="left-col-container">
<div style="cursor:pointer; font-size:20px;margin-bottom: 10px;" onclick="document.getElementById('new-message').style.display='block'" class="white-back">
<h5 align="center">New Message</h5>
</div>

<?php

$q='SELECT DISTINCT reciever_name,sender_name FROM message WHERE sender_name="'.$_SESSION['admin'].'"
OR reciever_name = "'.$_SESSION['admin'].'" ORDER BY date_time DESC';
	$r=mysqli_query($conn,$q);
	if($r){
		if(mysqli_num_rows($r) >0){
			$counter =0;
			$added_user= array();
			while($row= mysqli_fetch_assoc($r)){
				$sender_name= $row['sender_name'];
				$reciever_name= $row['reciever_name'];
				if($_SESSION['admin'] == $sender_name){
					if(in_array($reciever_name, $added_user)){

					}else{
							?>
							<div class="grey-back">
							<img src="logo.png" style="height:40px; width:50px; margin-top: 5px; " />
							<?php echo'<a href="?user='.$reciever_name.'">'.$reciever_name;'</a>' ?>
							</div>
							<?php
							$added_user = array($counter => $reciever_name);
							$counter ++;
					}
				}else if($_SESSION['admin'] == $reciever_name){
					if(in_array($sender_name, $added_user)){

					}else{
							?>
							<div class="grey-back">
							<img src="logo.png" style="height:40px; width:50px; margin-top: 5px; " />
							<?php echo'<a href="?user='.$sender_name.'">'.$sender_name;'</a>' ?>
							</div>
							<?php
							$added_user = array($counter => $sender_name);
							$counter ++;
					}
				}
			}
		}else{//no message 
			
		}
	}else{
		echo $q;
	}
?>

<!-- end of left column container-->
</div>