import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.Scanner;

public class Items {

   Connection connection;
   String query = "SELECT " +
         "items.id AS item_id, " +
         "items.name AS item_name, " +
         "items.price, " +
         "items.quantity, " +
         "items.unit, " +
         "categories.name AS category_name, " +
         "supplier.id AS supplier_id, " +
         "supplier.name AS supplier_name," +
         "supplier.address AS supplier_address, " +
         "supplier.website AS supplier_website, " +
         "supplier.email AS supplier_email " +
         "FROM " +
         "items " +
         "INNER JOIN categories ON items.category_id = categories.id " +
         "INNER JOIN supplier ON items.supplier_id = supplier.id " +
         "WHERE 1=1 ";

   Scanner scanner = new Scanner(System.in);

   public Items(Connection connection) {
      this.connection = connection;
   }

   private void filterItemByName() throws Exception {
      String localQuery = this.query;

      System.out.print("Masukkan Nama Barang: ");
      String itemName = this.scanner.nextLine();

      System.out.println("Itemname : " + itemName);
      if (!itemName.isEmpty()) {
         localQuery += " AND items.name LIKE '%" + itemName + "%'";
         this.execute(localQuery);
      } else {
         System.out.println("Nama Barang tidak valid");
      }

   }

   private void filterBySupplierName() throws Exception {
      String localQuery = this.query;

      System.out.print("Masukkan Nama Supplier: ");
      String supplierName = this.scanner.nextLine().trim();
      if (!supplierName.isEmpty()) {
         localQuery += " AND supplier.name LIKE '%" + supplierName + "%'";
         this.execute(localQuery);
      } else {
         System.out.println("Nama Supplier tidak valid");
      }
   }

   private void filterByQty() throws Exception {
      String localQuery = this.query;

      System.out.print("Masukkan Jumlah Barang: ");
      String qtyString = this.scanner.nextLine().trim();

      int qty = 0;

      if (!qtyString.isEmpty()) {
         try {
            qty = Integer.parseInt(qtyString);
            localQuery += " AND items.quantity = " + qty;
            this.execute(localQuery);
         } catch (NumberFormatException e) {
            System.out.println("Format Jumlah tidak valid");
         }
      } else {
         System.out.println("Format Jumlah tidak valid");
      }

   }

   private void filterByMaxPrice() throws Exception {
      String localQuery = this.query;

      System.out.print("Masukkan Batas Harga Tertinggi: ");
      String priceString = this.scanner.nextLine().trim();

      int price = Integer.MAX_VALUE;

      if (!priceString.isEmpty()) {
         try {
            price = Integer.parseInt(priceString);
            localQuery += " AND items.quantity <= " + price;
            this.execute(localQuery);
         } catch (NumberFormatException e) {
            System.out.println("Format Harga tidak valid");
         }
      } else {
         System.out.println("Format Harga tidak valid");
      }

   }

   private void execute(String query) throws Exception {
      Statement stmt = this.connection.createStatement();
      ResultSet rs = stmt.executeQuery(query);

      while (rs.next()) {
         System.out.println("Nama Item: " + rs.getString("item_name"));
         System.out.println("Kategori: " + rs.getString("category_name"));
         System.out.println("Harga: " + rs.getString("price"));
         System.out.println("Jumlah: " + rs.getString("quantity"));
         System.out.println("Supplier: " + rs.getString("supplier_name"));
         System.out.println("---------------------");
      }

      stmt.close();
      rs.close();
   }

   public void getAllItems() throws Exception {

      boolean loop = true;

      while (loop) {
         System.out.println("\n======= MENU BARANG =======");
         System.out.println("Pilih Filter (1-5): ");
         System.out.println("1. Nama Barang");
         System.out.println("2. Nama Supplier");
         System.out.println("3. Batas Harga");
         System.out.println("4. Jumlah Barang");
         System.out.println("5. Semua");
         System.out.println("6. Kembali");

         try {
            int choice = this.scanner.nextInt();
            this.scanner.nextLine();

            switch (choice) {
               case 1:
                  this.filterItemByName();
                  break;
               case 2:
                  this.filterBySupplierName();
                  break;
               case 3:
                  this.filterByMaxPrice();
                  break;
               case 4:
                  this.filterByQty();
                  break;
               case 5:
                  this.execute(this.query);
                  break;

               case 6:
                  loop = false;
                  break;

               default:
                  System.out.println("Pilihan tidak valid");
            }
         } catch (Exception e) {
            System.out.println("Pilihan tidak valid");
            loop = false;
         }

      }
   }
}
