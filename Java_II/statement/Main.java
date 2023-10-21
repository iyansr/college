package statement;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLClientInfoException;
import java.util.Scanner;

public class Main {
   private final static String url = "jdbc:mysql://127.0.0.1:3306/java_mysql";
   private final static String user = "root";
   private final static String password = "root";

   static public Connection getConnection() throws Exception {
      try {
         Connection connection = DriverManager.getConnection(url, user, password);
         return connection;
      } catch (SQLClientInfoException e) {
         System.err.println("Gagal Execute Command\n");
         System.err.println(e.toString());
         return null;
      }
   }

   public static void main(String[] args) {
      try {
         Connection connection = getConnection();
         String query = "SELECT items.name AS item_name, categories.name AS category_name "
               + "FROM items "
               + "INNER JOIN categories ON items.category_id = categories.id "
               + "WHERE items.name LIKE ? AND categories.name LIKE ?";
         PreparedStatement preparedStatement = connection.prepareStatement(query);

         Scanner scanner = new Scanner(System.in);

         System.out.print("Masukkan Nama Barang: ");
         String itemName = scanner.nextLine();

         System.out.print("Masukkan Nama Kategori: ");
         String categoryName = scanner.nextLine();

         preparedStatement.setString(1, "%" + itemName + "%");
         preparedStatement.setString(2, "%" + categoryName + "%");
         ResultSet resultSet = preparedStatement.executeQuery();

         if (resultSet.next() == false) {
            System.out.println("Data tidak ditemukan");
            scanner.close();
            return;
         }

         while (resultSet.next()) {
            System.out.println(resultSet.getString("item_name") + " | " + resultSet.getString("category_name"));
         }

         scanner.close();

      } catch (Exception e) {
         System.out.println(e);
      }

   }

}
