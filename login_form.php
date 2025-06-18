<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['usermail'] = $email;
   header('location:landing.html');

   }else{
      $message[] = 'incorrect password or email!';
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
        <h3 class="title">Masuk</h3>
        <input type="email" name="usermail" placeholder="masukkan email" class="box" required>
        <input type="password" name="password" placeholder="masukkan kata sandi" class="box" required>
        <input type="submit" value="masuk sekarang" class="form-btn" name="submit">
        <p>belum punya akun? <a href="register_form.php">daftar sekarang!</a></p>
    </form>

</div>

</body>
</html>