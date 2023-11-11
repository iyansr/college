<?php

include "session.php";
include "connection.php";

if (isset($_POST["tambah_barang"])) {
   $kode_barang = $_POST["kode_barang"];
   $nama_barang = $_POST["nama_barang"];
   $harga = $_POST["harga"];
   $merk = $_POST["merk"];
   $satuan = $_POST["satuan"];

   $sql = "INSERT INTO barang (kode_barang, nama_barang, harga, merk, satuan) 
   VALUES ('$kode_barang', '$nama_barang', '$harga', '$merk', '$satuan')";

   if ($connection->query($sql) === TRUE) {
      echo "Data berhasil ditambahkan";
   } else {
      echo "Error: " . $sql . "<br>" . $connection->error;
   }
}

?>

<div>
   <p>
      Halo, Selamat Datang <b><?= $_SESSION['username'] ?></b>
   </p>
   <p><a href="logout.php">Logout</a></p>


   <form action="" method="POST">
      <fieldset>
         <label for="username">Kode Barang</label>
         <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang" />
      </fieldset>

      <fieldset>
         <label for="password">Nama Barang</label>
         <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" />
      </fieldset>

      <fieldset>
         <label for="password">Harga Barang</label>
         <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Barang" />
      </fieldset>

      <fieldset>
         <label for="password">Merek Barang</label>
         <input type="text" name="merk" id="merk" placeholder="Masukkan Merek Barang" />
      </fieldset>

      <fieldset>
         <label for="password">Satuan</label>
         <input type="text" name="satuan" id="satuan" placeholder="Masukkan Merek Barang" />
      </fieldset>
      <input name="tambah_barang" type="submit" value="Simpan" />
   </form>


   <?php

   $sql = "SELECT * FROM barang";
   $result = $connection->query($sql);

   if ($result->num_rows > 0) {
      echo "<table border='1'>";
      echo "<tr>";
      echo "<th>Kode Barang</th>";
      echo "<th>Nama Barang</th>";
      echo "<th>Harga</th>";
      echo "<th>Merk</th>";
      echo "<th>Satuan</th>";
      echo "</tr>";
      while ($row = $result->fetch_assoc()) {
         echo "<tr>";
         echo "<td>" . $row["kode_barang"] . "</td>";
         echo "<td>" . $row["nama_barang"] . "</td>";
         echo "<td>" . $row["harga"] . "</td>";
         echo "<td>" . $row["merk"] . "</td>";
         echo "<td>" . $row["satuan"] . "</td>";
         echo "</tr>";
      }
      echo "</table>";
   } else {
      echo "0 results";
   }

   ?>

</div>