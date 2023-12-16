<?php
include "session.php";
include "connection.php";

$sql = mysqli_query($connection, "SELECT * FROM barang WHERE kode_barang='$_GET[id]'");
$data = mysqli_fetch_array($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update</title>
   <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="p-10">
   <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form action="" method="POST" class="space-y-4">

         <fieldset>
            <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
            <input value="<?= $data["nama_barang"] ?>" type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>

         <fieldset>
            <label for="harga" class="block text-sm font-medium leading-6 text-gray-900">Harga Barang</label>
            <input value="<?= $data["harga"] ?>" type="text" name="harga" id="harga" placeholder="Masukkan Harga Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>

         <fieldset>
            <label for="merk" class="block text-sm font-medium leading-6 text-gray-900">Merek Barang</label>
            <input value="<?= $data["merk"] ?>" type="text" name="merk" id="merk" placeholder="Masukkan Merek Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>

         <fieldset>
            <label for="satuan" class="block text-sm font-medium leading-6 text-gray-900">Satuan</label>
            <input value="<?= $data["satuan"] ?>" type="text" name="satuan" id="satuan" placeholder="Masukkan Merek Barang" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>
         <input name="update" type="submit" value="Update" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
      </form>
   </div>

</body>

</html>

<?php

if (isset($_POST['update'])) {
   $sql = mysqli_query($connection, "UPDATE barang SET nama_barang='$_POST[nama_barang]', harga='$_POST[harga]', merk='$_POST[merk]', satuan='$_POST[satuan]' WHERE kode_barang='$_GET[id]'");

   if ($sql) {
      echo "<script>alert('Data Berhasil Diupdate');document.location.href='home.php'</script>";
   } else {
      echo "<script>alert('Data Gagal Diupdate');document.location.href='home.php'</script>";
   }
}
