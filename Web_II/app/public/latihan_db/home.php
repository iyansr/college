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

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">


   <div>
      <p>
         Halo, Selamat Datang <b><?= $_SESSION['username'] ?></b>
      </p>
      <p><a href="logout.php">Logout</a></p>

      <div class="flex space-x-6">
         <div class="mt-10 flex-1 sm:w-full sm:max-w-sm">
            <form action="" method="POST" class="space-y-4">
               <fieldset>
                  <label for="kode_barang" class="block text-sm font-medium leading-6 text-gray-900">Kode Barang</label>
                  <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>

               <fieldset>
                  <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
                  <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>

               <fieldset>
                  <label for="harga" class="block text-sm font-medium leading-6 text-gray-900">Harga Barang</label>
                  <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>

               <fieldset>
                  <label for="merk" class="block text-sm font-medium leading-6 text-gray-900">Merek Barang</label>
                  <input type="text" name="merk" id="merk" placeholder="Masukkan Merek Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>

               <fieldset>
                  <label for="satuan" class="block text-sm font-medium leading-6 text-gray-900">Satuan</label>
                  <input type="text" name="satuan" id="satuan" placeholder="Masukkan Merek Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>
               <input name="tambah_barang" type="submit" value="Simpan" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
            </form>
         </div>

         <div class="flex-3 mt-8">
            <div>
               <label for="search_input" class="block text-sm font-medium leading-6 text-gray-900">Cari Barang</label>
               <div class="flex items-center mt-2 space-x-2">
                  <div class="flex-1 ">
                     <input value="<?= isset($_GET["search"]) ? $_GET["search"] : '' ?>" type="text" name="search" id="search_input" placeholder="Masukkan Nama Barang atau Kode Barang" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>

                  <?php

                  if (isset($_GET["search"])) {
                     echo "<a href='home.php' class='justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold leading-6 text-indigo-600'>Reset</a>";
                  }

                  ?>
                  <button name="search" id="search_button" class="justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cari</button>
                  <a href="cetak.php" id="print_btn" class="justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cetak</a>
               </div>
            </div>
            <?php


            $param = "";
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM barang WHERE LOWER(barang.nama_barang) LIKE ? OR barang.kode_barang = ?";
            $statment = $connection->prepare($sql);
            if (isset($search)) {
               $param = strtolower("%{$search}%");
            }
            $statment->bind_param("ss", $param, $search);
            $statment->execute();
            $result = $statment->get_result();

            if ($result->num_rows > 0) {
               echo "<table class='w-full divide-y divide-gray-300'>";
               echo "<thead>";
               echo "<tr>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Kode Barang</th>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Nama Barang</th>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Harga</th>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Merk</th>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Satuan</th>";
               echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Aksi</th>";
               echo "</tr>";
               echo "</thead>";
               echo "<tbody class='bg-white divide-y divide-gray-300'>";
               while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["kode_barang"] . "</td>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["nama_barang"] . "</td>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["harga"] . "</td>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["merk"] . "</td>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["satuan"] . "</td>";
                  echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                  <a href='update.php?id=$row[kode_barang]' class='text-indigo-600 hover:text-indigo-900'>Edit</a>
                  <a href='?delete=$row[kode_barang]' onClick='return confirm(\"Hapus barang ini?\")' class='text-red-600 hover:text-indigo-900 ml-2'>Hapus</a>
                  </td>";
                  echo "</tr>";
               }
               echo "</tbody>";
               echo "</table>";
            } else {
               echo "0 results";
            }

            if (isset($_GET['delete'])) {
               $sql = "DELETE FROM barang WHERE kode_barang='$_GET[delete]'";
               if ($connection->query($sql) === TRUE) {
                  echo "<script>alert('Data Berhasil Dihapus');document.location.href='home.php'</script>";
               } else {
                  echo "<script>alert('Data Gagal Dihapus');document.location.href='home.php'</script>";
               }
            }
            ?>

         </div>
      </div>
   </div>

</body>

<script>
   const input = document.getElementById("search_input");
   const button = document.getElementById("search_button");

   button.addEventListener("click", function() {
      const search = input.value;
      if (search === "") return
      window.location.href = `home.php?search=${search}`;
   });
</script>

</html>