<?php

include "connection.php";



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
      <div class="flex space-x-6">
         <div class="mt-10 flex-1 sm:w-full sm:max-w-sm">
            <form action="" method="POST" class="space-y-4">
               <fieldset>
                  <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Mahasiswa</label>
                  <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Mahasiswa" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>
               <fieldset>
                  <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>
               <fieldset>
                  <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>
               <fieldset>
                  <label for="program_studi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
                  <input type="text" name="program_studi" id="program_studi" placeholder="Masukkan Program Studi" class="block mt-2 px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
               </fieldset>
               <input name="tambah_mahasiswa" type="submit" value="Simpan" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
            </form>

            <?php
            if (isset($_POST["tambah_mahasiswa"])) {
               $nama = $_POST["nama"];
               $tempat_lahir = $_POST["tempat_lahir"];
               $tanggal_lahir = $_POST["tanggal_lahir"];
               $program_studi = $_POST["program_studi"];

               $sql = "INSERT INTO biodata (nama, tempat_lahir, tanggal_lahir, program_studi) 
                        VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$program_studi')";


               if ($connection->query($sql) === TRUE) {
                  echo "<p>Data berhasil ditambahkan</p>";
               } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
               }
            }
            ?>
         </div>

         <div class="flex-3 mt-10">
            <div>
               <label for="search_input" class="block text-sm font-medium leading-6 text-gray-900">Cari Mahasiswa</label>
               <div class="flex items-center mt-2 space-x-2">
                  <div class="flex-1 ">
                     <input value="<?= isset($_GET["search"]) ? $_GET["search"] : '' ?>" type="text" name="search" id="search_input" placeholder="Masukkan Nama Mahasiswa" class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>

                  <?php

                  if (isset($_GET["search"])) {
                     echo "<a href='home.php' class='justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold leading-6 text-indigo-600'>Reset</a>";
                  }

                  ?>
                  <button name="search" id="search_button" class="justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cari</button>
               </div>
            </div>
            <?php

            $param = "%";
            $sql = "SELECT * FROM biodata WHERE LOWER(biodata.nama) LIKE ?";
            $statment = $connection->prepare($sql);
            if (isset($_GET['search'])) {
               $param = strtolower("%{$_GET['search']}%");
            }
            $statment->bind_param("s", $param);
            $statment->execute();
            $result = $statment->get_result();

            echo "<table class='w-full divide-y divide-gray-300'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>NIM</th>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Nama</th>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Tempat Lahir</th>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Tanggal Lahir</th>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Program Studi</th>";
            echo "<th scope='col' class='px-3 py-3.5 text-left text-sm font-semibold text-gray-900'>Aksi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='bg-white divide-y divide-gray-300'>";
            while ($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["nim"] . "</td>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["nama"] . "</td>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["tempat_lahir"] . "</td>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["tanggal_lahir"] . "</td>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $row["program_studi"] . "</td>";
               echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                  <a href='update.php?id=$row[id]' class='text-indigo-600 hover:text-indigo-900'>Edit</a>
                  <a href='?delete=$row[id]' onClick='return confirm(\"Hapus data mahasiswa ini?\")' class='text-red-600 hover:text-indigo-900 ml-2'>Hapus</a>
                  </td>";
               echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";


            if (isset($_GET['delete'])) {
               $sql = "DELETE FROM biodata WHERE id='$_GET[delete]'";
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