<?php
 
 require 'config.php';

 $f_name = $_POST['f_name'];
  $email = $_POST['E_mail'];
  $num= $_POST['number'];
  $pass = $_POST['pass'];
  $repass = $_POST['confirmpassword'];
  $vname = "/^[a-zA-Z ]+$/";
  $vemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
  $vnumber = "/^[0-9]+$/";

if(empty($f_name)){
  echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Please Fill Fullname</strong>
</i></div>";
} 
 if(empty($email)){
echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Please Fill Email</strong>
</i></div>";

} 
 if(empty($num)){
  echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Please Fill Mobile Number</strong>
</i></div>";
}
if(empty($pass)){
echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Please Fill Password</strong>
</i></div>";

} if(empty($repass)){
echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Please Fill Confirm Password</strong>
</i></div>";

}
else{
if(!(strlen($num) == 11)){
echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
<strong>Mobile Number should be 11 digit</strong>
</i></div>";
}

  else if(!preg_match($vname,$f_name)){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
      <strong>Fullname is not Valid</strong>
        </i></div>";
    }

  else if(!preg_match($vemail,$email)){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
    <strong>Email is not Valid</strong>
    </i></div>";
    }

  else if(!preg_match($vnumber,$num)){
   echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
     <strong>Mobile Number is not Valid</strong>
       </i></div>";
     }

  else if(strlen($pass)<4){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
      <strong>Password is too short</strong>
        </i></div>";
    }

  else if($pass != $repass){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
      <strong>Password is not same</strong>
        </i></div>";
      }

else{
$sql="SELECT user_id FROM user_info WHERE email ='$email' LIMIT 1";
  $check_query =mysqli_query($conn,$sql);
  $count_email = mysqli_num_rows($check_query);
  if($count_email>0){
    echo "<div class='alert-danger'><i class='fa fa-exclamation-circle'>
      <strong>Sorry Email already have account  in this website</strong>
        </i></div>";
}
else{
  $sql ="INSERT INTO user_info(password,full_name,mobile,email)VALUES('$pass','$f_name','$num','$email')";
  $run_query=mysqli_query($conn,$sql);
    if($run_query){
      echo "<div class='alert-success'>
        <strong>Register Successfull Login and Enjoy Shopping</strong><i class='fa fa-smile-o'></i>
          </div>";
                  }
    }
}

}
?>