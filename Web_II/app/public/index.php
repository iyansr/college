<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <?php
   class User {

      private $nama;
      private $umur;

      function __construct($nama, $umur) {
         $this->nama = $nama;
         $this->umur = $umur;
      }

      public function getNama() {
         return $this->nama;
      }

      public function getUmur() {
         return $this->umur;
      }

      public function setNama($nama) {
         $this->nama = $nama;
      }

      public function setUmur($umur) {
         $this->umur = $umur;
      }

      public function cetak() {
         echo "<li>" . "Nama : " . $this->nama . "</li>";
         echo "<li>" . "Umur : " . $this->umur . "</li>";
      }
   }

   $user1 = new User("Iyan", 20);
   $user2 = new User("Saputra", 22);


   echo "<ul>";
   echo "<li>" . "Nama : " . $user1->getNama() . "</li>";
   echo "<li>" . "Umur : " . $user1->getUmur() . "</li>";
   echo "<hr/>";
   echo "<li>" . "Nama : " . $user2->getNama() . "</li>";
   echo "<li>" . "Umur : " . $user2->getUmur() . "</li>";
   echo "</ul>";

   var_dump(false && false);

   for ($i = 0; $i < 5; $i++) {
      echo "$i <br/>";
   }

   echo "<hr/>";
   $n = 0;

   do {
      echo "$n <br/>";
      $n++;
   } while ($n <= 10);

   ?>

</body>

</html>