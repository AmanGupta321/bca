import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

public class slip26Q1a {
    public static void main(String[] args) throws Exception{
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver")   ;
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select cname from college;");
        while(rs.next()){
            System.out.println(rs.getString(1));
        }
    }
}
