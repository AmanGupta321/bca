import java.sql.*;
import java.util.Scanner;

public class slip20Q1a {

    public static void main(String[] args) throws Exception {
        // Get employee ID from command line arguments
        Scanner sc = new Scanner(System.in);
        int empId = sc.nextInt();

        // JDBC variables
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection conn = null;
        Statement stmt = null;

        try {
            // Create JDBC connection
            
            conn = DriverManager.getConnection("jdbc:odbc:amanjavadb");

            // Create statement
            stmt = conn.createStatement();

            // Execute delete query
            String query = "DELETE FROM employee WHERE ENo = " + empId;
            int numRowsAffected = stmt.executeUpdate(query);

            // Print number of rows affected
            System.out.println(numRowsAffected + " row(s) deleted.");

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
