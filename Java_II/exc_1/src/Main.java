import java.sql.*;
import java.util.Scanner;

public class Main {
   final static String url = "jdbc:mysql://127.0.0.1:3306/java_mysql";
   final static String user = "root";
   final static String password = "root";

   static void createCategory(Connection connection) throws Exception {
      Scanner sc = new Scanner(System.in);
      System.out.println("\n====TAMBAH KATEGORI BARANG=====\n");

      System.out.println("Masukkan Nama: ");
      String name = sc.nextLine();

      System.out.println("Masukan Deskripsi: ");
      String deskripsi = sc.nextLine();

      String sql = String.format("insert into kategori (name, deskripsi) values (\"%s\", \"%s\")", name, deskripsi);

      sc.close();

      System.out.println("\nExcecuting -> : " + sql);
      Statement stmt = connection.createStatement();
      stmt.executeUpdate(sql);
      stmt.close();
   }

   static void showCategory(Connection connection) throws Exception {
      String sql = "select * from kategori";

      System.out.println("\n====DAFTAR KATEGORI BARANG=====\n");

      Statement stmt = connection.createStatement();
      ResultSet rs = stmt.executeQuery(sql);

      while (rs.next()) {
         System.out.println("ID: " + rs.getInt("id"));
         System.out.println("Nama: " + rs.getString("name"));
         System.out.println("Deskripsi: " + rs.getString("deskripsi"));
         System.out.println("---------------------");
      }

      stmt.close();
   }

   public static void main(String[] args) throws Exception {

      try {
         Connection connection = DriverManager.getConnection(url, user, password);

         // createCategory(connection);
         showCategory(connection);
      } catch (SQLClientInfoException e) {
         System.err.println("Gagal Execute Command\n");
         System.err.println(e.toString());
      }
   }
}