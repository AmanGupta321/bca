import java.sql.*;
import java.util.*;

public class slip24Q1b {
    public static void main(String[] args) throws Exception {
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        Scanner sc = new Scanner(System.in);
        while (true) {
            System.out.println("\n1. Insert\n2. Update\n3. Delete\n4. Search\n5. Display\n6. Exit");
            System.out.println("Enter Your Option");
            int opt = sc.nextInt();
            switch (opt) {
                case 1:
                    System.out.println("Enter eno, ename and salary");
                    int e = sc.nextInt();
                    String n = sc.next();
                    int sal = sc.nextInt();
                    st.executeUpdate("Insert into emp values (" + e + ", '" + n + "', " + sal + ")");
                    System.out.println("Record Inserted");
                    break;

                case 2:
                    System.out.println("Enter eno, ename and salary");
                    e = sc.nextInt();
                    n = sc.next();
                    sal = sc.nextInt();
                    st.executeUpdate("update emp set ename = '" + n + ", sal = " + sal + " where eno = " + e);
                    System.out.println("Record Updated");
                    break;

                case 3:
                    System.out.println("Enter eno to delete record");
                    e = sc.nextInt();
                    st.executeUpdate("delete from emp where eno = " + e);
                    System.out.println("Record Deleted");
                    break;

                case 4:
                    System.out.println("Enter eno to Search Record");
                    e = sc.nextInt();
                    ResultSet rs = st.executeQuery("Select * from emp where eno = " + e);
                    while (rs.next()) {
                        System.out.println("\t" + rs.getInt(1));
                        System.out.println("\t" + rs.getString(2));
                        System.out.println("\t" + rs.getInt(3));
                        System.out.println("\n");
                    }
                    break;
                case 5:
                    rs = st.executeQuery("select * from emp");
                    while (rs.next()) {
                        System.out.println("" + rs.getInt(1));
                        System.out.println("" + rs.getString(2));
                        System.out.println("" + rs.getInt(3));
                    }
                    break;
                case 6:
                    System.exit(0);
            }
        }
    }
}
