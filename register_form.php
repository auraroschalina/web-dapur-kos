<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login_form.php');
   }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="form-container">

   <form action="" method="post">
      <h3 class="title">Daftar</h3>
      
      <input type="text" name="name" required placeholder="masukkan nama" class="box">
      <input type="email" name="email" required placeholder="masukkan email" class="box">
      <input type="password" name="password" required placeholder="masukkan kata sandi" class="box">
      <input type="password" name="cpassword" required placeholder="konfirmasi kata sandi" class="box">
      <input type="submit" name="submit" class="form-btn" value="daftar sekarang">
      <p>sudah punya akun? <a href="login_form.php">masuk sekarang!</a></p>
   </form>

</div>

</body>
</html>