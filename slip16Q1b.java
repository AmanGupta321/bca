import java.sql.*;

public class slip16Q1b {
   public static void main(String[] args) throws Exception {
      Connection conn = null;
      PreparedStatement pstmt = null;
      ResultSet rs = null;

         // Register JDBC driver
         Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");

         // Open a connection
         //System.out.println("Connecting to database...");
         conn = DriverManager.getConnection("jdbc:odbc:amanjavadb");

         // Prepare SQL query to insert data into the database
         String insertSQL = "INSERT INTO students (rno, sname, per) VALUES (?, ?, ?)";
         pstmt = conn.prepareStatement(insertSQL);

         // Accept details of at least 5 students
         pstmt.setInt(1, 1);
         pstmt.setString(2, "John");
         pstmt.setFloat(3, 85.6f);
         pstmt.executeUpdate();

         pstmt.setInt(1, 2);
         pstmt.setString(2, "Jane");
         pstmt.setFloat(3, 92.5f);
         pstmt.executeUpdate();

         pstmt.setInt(1, 3);
         pstmt.setString(2, "Bob");
         pstmt.setFloat(3, 76.3f);
         pstmt.executeUpdate();

         pstmt.setInt(1, 4);
         pstmt.setString(2, "Alice");
         pstmt.setFloat(3, 88.9f);
         pstmt.executeUpdate();

         pstmt.setInt(1, 5);
         pstmt.setString(2, "Peter");
         pstmt.setFloat(3, 93.7f);
         pstmt.executeUpdate();

         System.out.println("Data inserted successfully!");

         // Prepare SQL query to retrieve the student with highest percentage
         String selectSQL = "SELECT * FROM students WHERE per = (SELECT MAX(per) FROM students)";
         pstmt = conn.prepareStatement(selectSQL);
         rs = pstmt.executeQuery();

         // Display details of the student with highest percentage
         while (rs.next()) {
            System.out.println("Roll No: " + rs.getInt("rno") + ", Name: " + rs.getString("sname") + ", Percentage: " + rs.getFloat("per"));
         }

      }
   }