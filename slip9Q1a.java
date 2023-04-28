import java.sql.*;
import java.util.Scanner;
class slip9Q1a{
		public static void main(String args[])throws Exception{
				Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
				Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
				PreparedStatement st = con.prepareStatement("Insert into employee values(?,?,?)");
				Scanner s = new Scanner(System.in);
				System.out.println("Enter eno, ename and salary");
				int e = s.nextInt();
				String n = s.next();
				int sal = s.nextInt();
				st.setInt(1,e);
				st.setString(2,n);
				st.setInt(3,sal);
				st.executeUpdate();
				System.out.println("Record Inserted");
				con.close();
			}
	}