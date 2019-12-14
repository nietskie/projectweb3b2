<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["fname"]);

header("location:index.php");

?>