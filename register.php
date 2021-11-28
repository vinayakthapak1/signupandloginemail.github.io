




<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
    <style>
     .button{
       display  :inline-block;
       margin-top:10px;
     }
    </style>
  </head>
  <body>
<?php

include 'config.php';

if(isset($_POST['submit']))
{
 
  $username = mysqli_real_escape_string($con , $_POST['username']);
  $email = mysqli_real_escape_string($con , $_POST['email']);
  $mobile = mysqli_real_escape_string($con , $_POST['mobile']);
  $password = mysqli_real_escape_string($con , $_POST['password']);
  $cpassword = mysqli_real_escape_string($con , $_POST['cpassword']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $token = bin2hex(random_bytes(15)); 

  $emailquery = "select * from registration where email = '$email'";
  
  $query = mysqli_query($con , $emailquery);
  $emailcount = mysqli_num_rows($query);

  if($emailcount>0)
  {
    echo "Email already exist ";
  }
  else{
    if($password === $cpassword){
      $insertquery = "insert into registration(username ,  email , mobile , password ,cpassword,token ,status) values('$username','$email','$mobile','$pass','$cpass','$token','inactive')";
      $iquery = mysqli_query($con,$insertquery);

    if($iquery)
    { 
      echo "vinayakthapak";
      $subject = "email activation ";
      $body = "hi, $username. click here to activate your account http://localhost/login/activate.php?token=$token";
      $header = "From :vinayakthapak1@gmail.com";
      if(mail($email,$subject,$body,$header)){
        $_SESSION['msg'] = "check your mail to activate your account $email";
        header('location:login.php');
      }  
      else{
        echo "Email not sent";
      }
      
    ?>
    <script>
        alert("inserted Succesful");
    </script>
    <?php
   }
else{
?>
<script>
    alert("Password not  match");
</script>
<?php
}
    }
    
  }
}
 
?>



  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Shopping Site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" style="color:white; font: weight 500px;" href="register.php">Sign Up </span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" style="color:white; font: weight 500px;" href="login.php">Login</a>
      </li>
    
      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Create your account :</h3>
<hr>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method = "POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username" Required>
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name ="email" id="email" placeholder="Email Address" Required>
    </div>
  </div>
  <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="text" class="form-control" name ="mobile" id="mobile" placeholder="Enter mobile Number">
    </div>
  <div class="form-group">
    <label for="inputAddress2">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" Required>
    <div class="form-group">
    <label for="cpassword">Confirm password</label>
    <input type="password" name = "cpassword" class="form-control" id="cpassword" placeholder="Re enter password" Required>

  
  
  <button type="submit" name="submit" class="btn btn-primary button">Sign in</button> 
</form>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
