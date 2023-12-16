package sql_transaction;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

public class Main {
   private final static String url = "jdbc:mysql://mysql.web-ii.orb.local:3306/java_db_trx";
   private final static String user = "root";
   private final static String password = "root";

   public static void main(String[] args) throws Exception {

      Connection connection = DriverManager.getConnection(url, user, password);
      Scanner scanner = new Scanner(System.in);
      try {
         connection.setAutoCommit(false);

         System.out.print("Masukkan nama anggota: ");
         String name = scanner.nextLine();

         System.out.print("Masukan Jumlah: ");
         int jumlah = scanner.nextInt();
         scanner.nextLine();

         Statement statement = connection.createStatement();
         statement.executeUpdate("insert into anggota (nama) values ('" + name + "')");

         Statement stmnt = connection.createStatement();
         ResultSet rs = stmnt.executeQuery("select * from anggota where nama = '" + name + "'");

         int id;
         if (rs.next()) {
            id = rs.getInt("id");
         } else {
            throw new Exception("Anggota tidak ditemukan");
         }

         Statement statement2 = connection.createStatement();
         statement2.executeUpdate("insert into iuran (id_anggota, jumlah) values (" + id + ", " + jumlah + ")");

         connection.commit();
      } catch (SQLException e) {
         System.out.println(e.getMessage());
         connection.rollback();
      }
      scanner.close();

   }
}
