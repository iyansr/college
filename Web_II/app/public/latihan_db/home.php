<?php

include "session.php";
include "connection.php";

?>

<div>
   <p>
      Halo, Selamat Datang <b><?= $_SESSION['username'] ?></b>
   </p>
   <p><a href="logout.php">Logout</a></p>
</div>