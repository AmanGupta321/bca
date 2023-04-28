import java.sql.*;
public class slip13Q1b {
    public static void main(String[] args) throws Exception{
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from college;");
        System.out.println("College Details : ");
        while(rs.next()){
            System.out.println(rs.getString(1));  
        }
        
    }
}
