import java.sql.*;
class slip4Q1a{
    public static void main(String[] args) throws Exception {
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        st.executeUpdate("Delete from Student where name like 's%'");
        System.out.println("Record Deleted Successfully!!!");


    }
}