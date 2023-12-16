<?php
include "connection.php";

$sql = mysqli_query($connection, "SELECT * FROM biodata WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Mahasiswa</title>
   <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="p-10">
   <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form action="" method="POST" class="space-y-4">
         <fieldset>
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Mahasiswa</label>
            <input type="text" value="<?= $data["nama"] ?>" name="nama" id="nama" placeholder="Masukkan Nama Mahasiswa" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>
         <fieldset>
            <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <input type="text" value="<?= $data["tempat_lahir"] ?>" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>
         <fieldset>
            <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <input type="date" value="<?= $data["tanggal_lahir"] ?>" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>
         <fieldset>
            <label for="program_studi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
            <input type="text" value="<?= $data["program_studi"] ?>" name="program_studi" id="program_studi" placeholder="Masukkan Program Studi" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
         </fieldset>
         <input name="update_mahasiswa" type="submit" value="Simpan" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
      </form>
   </div>

</body>

</html>

<?php

if (isset($_POST['update_mahasiswa'])) {
   $sql = mysqli_query($connection, "UPDATE biodata SET nama='$_POST[nama]', tempat_lahir='$_POST[tempat_lahir]', tanggal_lahir='$_POST[tanggal_lahir]', program_studi='$_POST[program_studi]' WHERE id='$_GET[id]'");

   if ($sql) {
      echo "<script>alert('Data Berhasil Diupdate');document.location.href='home.php'</script>";
   } else {
      echo "<script>alert('Data Gagal Diupdate');document.location.href='home.php'</script>";
   }
}
