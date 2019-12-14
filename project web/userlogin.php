<?php
  require'config.php';
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ONE PUNCH MARKET</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="loginn.css">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" ><!-- FOR FONT AWESOME ICON-->

	<link rel="stylesheet"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!-- for css bootsrap 4 -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
	<!--navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <!-- Brand -->
  <a class="navbar-brand"><img src="logo.png" alt="ONE PUNCH MAN SHOP LOGO" height="35" width="60"></a>

  <!-- PARA SA RESPONSIVE  Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar BUTTON -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">

        <a class="nav-link active" href="index.php">HOME</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="product.php">PRODUCT</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT US</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">JOIN</a>


       <div class="dropdown-menu dropdown-menu-right">
                      <div style="width: 300px; padding: 15px;">


              <h3 style="text-align: center;  color: black;">Register</h3>

              <div id="e_msg" style="font-size: 13; margin-bottom: 10px; margin-top: 15px;">
                     <!-- message for registration-->
                  </div>
                <form method="POST">
                  <label style="color: black;" for="f_name">Full Name</label>
                 <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter Fullname" required />
                <label  style="color: black;" for="E_mail">Email</label>
                <input type="email" class="form-control" id="E_mail" name="E_mail" placeholder="Enter Email" required />
                   <label  style="color: black;" for="number">Mobile Number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Enter Mobile Number" required />
                <label  style="color: black;" for="pass">Password</label>
                 <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required />
                 <label  style="color: black;" for="confirmpassword">Confirm Password</label>
                 <input type="password" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password" name="confirmpassword" required />
                 <p><br/></p>
                <input type="submit" class="btn btn-success registerbtn" style="width: 270px;" value="Submit">
                   </form>
          </div>
          </div>

      </li>
      
      <li class="nav-item"> 
      <a class="nav-link" href="userlogin.php"><i class="fa fa-user-o" aria-hidden="true"></i></i></a>
      </li>

    </ul>
  </div>
</nav>
<style>
</style>

<div class="container">
<?php
if(isset($_POST['submit']) && $_POST['g-recaptcha-response']=="")
{
 $email = $_POST['Email'];
  $pass = $_POST['pass'];
  $vname = "/^[a-zA-Z ]+$/";
  $vemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
   if(empty($email)||empty($pass)){
     echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Please input  Email and Password First!</strong>
      </div>";}
      else if(!preg_match($vemail,$email)){
          echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Email is notValid</strong>
      </div>";}
      else{
        echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Captcha is Wrong</strong>
      </div>";}

}
if(isset($_POST['submit']) && $_POST['g-recaptcha-response']!="")
{
 $secret = '6LeEksYUAAAAAGHraxP8XBVPQzhtzJmZX8VJFvxv';
 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
 $responseData = json_decode($verifyResponse);
 if($responseData->success)
 {  
  $email = $_POST['Email'];
  $pass = $_POST['pass'];
  $vname = "/^[a-zA-Z ]+$/";
  $vemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
   if(empty($email)){
     echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Please input  Email!</strong>
      </div>";}
      else if(empty($pass)){
        echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Please input password!</strong>
      </div>";}
      else if(!preg_match($vemail,$email)){
          echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Email is notValid</strong>
      </div>";}
    else{ 
      $sql = "SELECT * FROM user_info WHERE email ='$email' AND password ='$pass' ";
      $run_query= mysqli_query($conn,$sql);
      $count = mysqli_num_rows($run_query);
      if($count == 1){
      $row = mysqli_fetch_array($run_query);
     $_SESSION["uid"] = $row["user_id"];
     $_SESSION["Email"] = $row["email"];
     $_SESSION["fname"] = $row["full_name"];
     $_SESSION["number"] = $row["mobile"];
    header('location:userhome.php');
                      }
    else{
    $sql = "SELECT * FROM developer WHERE email ='$email' AND password ='$pass' ";
  $run_query= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($run_query);
  if($count == 1){
    $row = mysqli_fetch_array($run_query);
    $_SESSION["admin"] = $row["email"];
    header('location:adminhome.php');
  }else{
   echo "<div class='alert alert-danger text-center alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Email or Password is incorrect</strong>
      </div>";} 
  }
    }   
 }
}
else{}//end of captcha  


?>
        <div class="card card-container">
            <!-- for Image -->
            <img id="profile-img" class="profile-img-card" src="logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action="" method="POST" class="form-signin">
                <input type="email" id="Email" name="Email" class="form-control" placeholder="Email address" >
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" >
               <div class="g-recaptcha" data-sitekey="6LeEksYUAAAAAEE2NwBRE7qvzSvGPh_Ohg2kuwNc"></div><br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" id="login" name="submit" type="submit">Sign in</button>
            </form>
      
        </div>
    </div>
    </body>

    </html>