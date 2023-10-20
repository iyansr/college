import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLClientInfoException;

public class DBConnection {

   private final static String url = "jdbc:mysql://127.0.0.1:3306/java_mysql";
   private final static String user = "root";
   private final static String password = "root";

   public Connection getConnection() throws Exception {
      try {
         Connection connection = DriverManager.getConnection(url, user, password);
         return connection;
      } catch (SQLClientInfoException e) {
         System.err.println("Gagal Execute Command\n");
         System.err.println(e.toString());
         return null;
      }
   }

}
