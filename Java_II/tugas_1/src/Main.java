import java.sql.Connection;
import java.util.Scanner;

public class Main {

   public static void main(String[] args) throws Exception {
      DBConnection dbConnection = new DBConnection();
      Connection connection = dbConnection.getConnection();
      Items items = new Items(connection);
      Category category = new Category(connection);

      Scanner scanner = new Scanner(System.in);

      while (true) {
         System.out.println("\nMenu:");
         System.out.println("1. Daftar Barang");
         System.out.println("2. Daftar Kategori");
         System.out.println("3. Tambah Kategori");
         System.out.println("4. Keluar");

         System.out.print("Masukkan Pilihan (1-4): ");
         int choice = scanner.nextInt();

         switch (choice) {
            case 1:
               items.getAllItems();
               break;
            case 2:
               category.listAll();
               break;
            case 3:
               category.create();
               break;
            case 4:
               System.out.println("Exiting program. Goodbye!");
               System.exit(0);
            default:
               System.out.println("Invalid choice. Please enter a number between 1 and 4.");
         }
      }

   }
}
