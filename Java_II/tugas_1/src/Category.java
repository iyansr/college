import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.Scanner;

public class Category {

   Connection connection;

   public Category(Connection connection) {
      this.connection = connection;
   }

   public void create() throws Exception {
      Scanner sc = new Scanner(System.in);
      System.out.println("\n====TAMBAH KATEGORI BARANG=====\n");

      System.out.print("Masukkan Nama: ");
      String name = sc.nextLine();

      System.out.print("Masukan Deskripsi: ");
      String deskripsi = sc.nextLine();

      String sql = String.format("insert into categories (name, description) values (\"%s\", \"%s\")", name, deskripsi);

      System.out.println("\nExcecuting -> : " + sql);
      Statement stmt = this.connection.createStatement();
      stmt.executeUpdate(sql);
      stmt.close();
   }

   public void listAll() throws Exception {
      String sql = "select * from categories";
      Statement stmt = this.connection.createStatement();
      ResultSet rs = stmt.executeQuery(sql);

      while (rs.next()) {
         System.out.println("Kategori: " + rs.getString("name"));
         System.out.println("Deskripsi: " + rs.getString("description"));
         System.out.println("---------------------");
      }

      stmt.executeQuery(sql);
      stmt.close();
   }

}
