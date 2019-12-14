<?php
require_once("config.php");
if(isset($_POST['user'])){
	$q = 'SELECT * FROM user_info WHERE email ="'.$_POST['user'].'" ';
	$r=mysqli_query($conn, $q);
	if($r){
		if(mysqli_num_rows($r) > 0){
			//pag meron sa database
			while($row=mysqli_fetch_assoc($r)){
				$user_name =$row['email'];
				echo'<option value="'.$user_name.'">';
			}
		}else{
			echo'<option value="no user">';
		}
	}else{
		echo $q;
	}
}

?>