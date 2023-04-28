import java.sql.*;

public class slip12Q1a {
    public static void main(String[] args) throws Exception{
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select count(*) from college");

        if(rs.next()){
            System.out.println("\t"+rs.getInt(1));
        }
    }
}
