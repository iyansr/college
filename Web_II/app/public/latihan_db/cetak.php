<?php

include "session.php";
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">

   <div>
      <?php
      $sql = "SELECT * FROM barang ";
      $statment = $connection->prepare($sql);
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

            echo "</tr>";
         }
         echo "</tbody>";
         echo "</table>";
      } else {
         echo "0 results";
      }


      ?>

   </div>

</body>

<script>
   window.print();
</script>

</html>