<?php

$conn=new mysqli("localhost","root","","cart_system");
if($conn->connect_error){
	die("Connection_Failed".$conn->connect_error);
}


?>