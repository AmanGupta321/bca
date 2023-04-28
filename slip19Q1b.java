import java.awt.event.*;
import java.awt.*;
import java.sql.*;
import javax.swing.*;

public class slip19Q1b extends JFrame implements ActionListener
{
      // Create GUI components
      JLabel l1, l2, l3;
      JTextField trno, tname, tper;
      JButton fetchButton;
      ResultSet rs;
      Connection con;
      PreparedStatement pst;
      slip19Q1b(){
          setVisible(true);
          setSize(500,500);
          setLayout(new FlowLayout());
          l1 = new JLabel("Roll No");
          l2 = new JLabel("Name");
          l3 = new JLabel("Per");
          trno = new JTextField(20);
          tname = new JTextField(20);
          tper = new JTextField(20);
          fetchButton = new JButton("Get Record");
          add(l1);
          add(trno);
          add(l2);
          add(tname);
          add(l3);
          add(tper);
          add(fetchButton);
          fetchButton.addActionListener(this) ;
      // Add action listener to the button
      }
         public void actionPerformed(ActionEvent e) {
            Connection conn = null;
            Statement stmt = null;
            ResultSet rs = null;

            try {
               // Register JDBC driver
               Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");

               // Open a connection
               //System.out.println("Connecting to database...");
               conn = DriverManager.getConnection("jdbc:odbc:amanjavadb");

               // Execute SQL query to retrieve the first record from the student table
               String selectSQL = "SELECT * FROM students where rno=1";
               stmt = conn.createStatement();
               rs = stmt.executeQuery(selectSQL);

               // Display data onto the TextFields
               if (rs.next()) {
                  trno.setText(rs.getString("rno"));
                  tname.setText(rs.getString("sname"));
                  tper.setText(rs.getString("per"));
               }
            } catch (Exception se) {
               // Handle errors for JDBC
               se.printStackTrace();
            }
         }


      // Set frame properties
      public static void main(String[] args) {
      new slip19Q1b();
   }
}
