import java.sql.*;
class slip27Q1b{
    public static void main(String[] args)throws Exception{
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
        Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
        Statement st = con.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_UPDATABLE);
        ResultSet rs = st.executeQuery("Select * from teacher");
        rs.last();
            System.out.println("Result Set : Last ");
            System.out.println(""+rs.getInt(1));
            System.out.println(""+rs.getString(2));
            System.out.println(""+rs.getString(3));
            System.out.println(""+rs.getInt(4));

        rs.previous();
            System.out.println("\nResult Set : Previous ");
            System.out.println(""+rs.getInt(1));
            System.out.println(""+rs.getString(2));
            System.out.println(""+rs.getString(3));
            System.out.println(""+rs.getInt(4));

        rs.first();
            System.out.println("\nResult Set : First ");
            System.out.println(""+rs.getInt(1));
            System.out.println(""+rs.getString(2));
            System.out.println(""+rs.getString(3));
            System.out.println(""+rs.getInt(4));
	}
}