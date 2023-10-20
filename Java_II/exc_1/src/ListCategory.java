import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class ListCategory {

   public static void main(String[] args) throws Exception {
      DBConnection db = new DBConnection();
      Connection connection = db.getConnection();

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
      rs.close();
   }

}
