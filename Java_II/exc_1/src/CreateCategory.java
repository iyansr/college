import java.sql.Connection;
import java.sql.Statement;
import java.util.Scanner;

public class CreateCategory {

   public static void main(String[] args) throws Exception {

      DBConnection db = new DBConnection();
      Connection connection = db.getConnection();

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

}
