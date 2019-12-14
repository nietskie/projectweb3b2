
<!DOCTYPE html>
<html>
<head>
	<title></title>
<title>OPM Market</title>

  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="contact1.css">

 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" ><!-- FOR FONT AWESOME ICON-->
  <link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!-- for css bootsrap 4 -->

   <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
  <style>
  </style>
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
    <section id="contact">
       <div class="container">
           <h3 class="text-center text-uppercase">contact us</h3>
           <p class="text-center w-75 m-auto"></p><br><br><br><br>
           <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">call us</h4>
                    <p>09123456789</p>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office loaction</h4>
                   <address>Bulacan State University Sarmiento Campus</address>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office loaction</h4>
                    <address>Sapang Palay</address>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">email</h4>
                    <p>nietskie11@gmail.com</p>
                  </div>
                </div>
             </div>
           </div>
       </div>
    </section>
    <style>#contact .card:hover i,#contact .card:hover h4{color: #87d37c;}</style>
  </body>
</html>