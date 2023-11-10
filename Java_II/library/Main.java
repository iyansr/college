package library;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;
import java.sql.ResultSet;
import java.sql.SQLClientInfoException;
import java.sql.CallableStatement;

import java.util.Scanner;

public class Main {

   private final static String url = "jdbc:mysql://mysql.web-ii.orb.local:3306/java_db";
   private final static String user = "root";
   private final static String password = "root";

   static Connection getConnection() throws Exception {
      try {
         Connection connection = DriverManager.getConnection(url, user, password);
         return connection;
      } catch (SQLClientInfoException e) {
         System.err.println("Gagal Execute Command\n");
         System.err.println(e.toString());
         return null;
      }
   }

   static void getAllBuku() throws Exception {
      Connection connection = getConnection();

      String query = "SELECT * FROM buku";
      Statement statement = connection.createStatement();
      ResultSet rs = statement.executeQuery(query);

      if (!rs.next()) {
         System.out.println("---------------------");
         System.out.println("Tidak ada buku");
         System.out.println("---------------------");

      } else {
         do {
            System.out.println("---------------------");
            System.out.println("ISBN Buku: " + rs.getString("isbn"));
            System.out.println("Penulis: " + rs.getString("penulis"));
            System.out.println("Penerbit: " + rs.getString("penerbit"));
            System.out.println("Jumlah: " + rs.getInt("jumlah_eksemplar"));
            System.out.println("Tahun Terbit: " + rs.getInt("tahun_terbit"));

         } while (rs.next());
      }

      rs.close();
      statement.close();
   }

   static void getAllUser() throws Exception {
      Connection connection = getConnection();

      String query = "SELECT * FROM anggota";
      Statement statement = connection.createStatement();
      ResultSet rs = statement.executeQuery(query);

      if (!rs.next()) {
         System.out.println("---------------------");
         System.out.println("Tidak ada anggota");
         System.out.println("---------------------");

      } else {
         do {
            System.out.println("---------------------");
            System.out.println("Kode Anggota: " + rs.getString("kode"));
            System.out.println("Nama Anggota: " + rs.getString("nama"));
            System.out.println("Alamat Anggota: " + rs.getString("alamat"));
            System.out.println("No. Telepon: " + rs.getString("no_telepon"));
            System.out.println("Email: " + rs.getString("email"));

         } while (rs.next());
      }

      rs.close();
      statement.close();
   }

   static void pinjamBuku() throws Exception {
      Connection connection = getConnection();
      CallableStatement callableStatement = connection.prepareCall("{CALL peminjaman_proc(? , ?)}");

      Scanner scanner = new Scanner(System.in);
      System.out.print("Masukkan ISBN Buku: ");
      String isbn = scanner.nextLine();
      System.out.print("Masukkan Kode Anggota: ");
      String kodeAnggota = scanner.nextLine();

      callableStatement.setString(1, kodeAnggota);
      callableStatement.setString(2, isbn);

      callableStatement.executeUpdate();
      System.out.println("Berhasil Pinjam Buku");

   }

   public static void main(String[] args) {
      try {

         Scanner scanner = new Scanner(System.in);

         while (true) {
            System.out.println("\nMenu:");
            System.out.println("1. Daftar Semua Buku");
            System.out.println("2. Daftar User");
            System.out.println("3. Pinjam Buku");
            System.out.println("4. Keluar");

            String choice = scanner.nextLine();

            switch (choice) {
               case "1":
                  System.out.println("ASDASDASD");
                  getAllBuku();
                  break;
               case "2":
                  getAllUser();
                  break;
               case "3":
                  pinjamBuku();
                  break;
               case "4":
                  System.out.println("Exiting program. Goodbye!");
                  System.exit(0);
                  break;

               default:
                  System.err.println("Pilihan Salah!");

                  break;
            }

         }

      } catch (Exception e) {
         System.out.println(e);
      }

   }

}
