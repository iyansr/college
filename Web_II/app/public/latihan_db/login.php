<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
   <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
         <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Slahkan Masuk</h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
         <form class="space-y-6" action="" method="POST">
            <div>
               <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
               <div class="mt-2">
                  <input id="username" name="username" type="text" required class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               </div>
            </div>

            <div>
               <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>

               </div>
               <div class="mt-2">
                  <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 px-3 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               </div>
            </div>

            <div>
               <input type="submit" name="login" value="Login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
            </div>
         </form>
      </div>
   </div>
</body>

</html>



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