import java.sql.*;
public class slip8Q1a {
    public static void main(String[] args) throws Exception {
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select ename from employee where ename like 'a%';");
        System.out.println("Employees Name : ");
        if(rs.next()){
            System.out.println(rs.getString(1));  
        }
    }
}
