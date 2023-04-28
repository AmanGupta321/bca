import java.sql.*;
public class slip11Q1b{
    public static void main(String[] args) throws Exception {
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from sales where saledate>=#01-02-2023# and saledate<=#28-02-2023#");

        while(rs.next()){
            System.out.println("\t"+rs.getInt(1));
            System.out.println("\t"+rs.getInt(2));
            System.out.println("\t"+rs.getDate(3));
        }

    }
}
