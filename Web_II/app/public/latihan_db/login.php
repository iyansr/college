<?php
session_start();
include 'connection.php';
?>

<form action="" method="POST">
   <fieldset>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Masukkan username" />
   </fieldset>

   <fieldset>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Masukkan password" />
   </fieldset>
   <input name="login" type="submit" value="Login" />
</form>

<?php

if (isset($_POST['login'])) {
   $sql = mysqli_query($connection, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'");

   $rows = mysqli_num_rows($sql);

   if ($rows > 0) {
      $_SESSION['username'] = $_POST['username'];

      echo "<meta http-equiv=\"refresh\" content=\"0; url=home.php\" />";
   } else {
      echo "<p>Username dan Password Sahlah</p>";
      echo "<meta http-equiv=\"refresh\" content=\"3; url=login.php\" />";
   }
}
?>