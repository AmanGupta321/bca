import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;

public class slip10Q1b extends HttpServlet {
	
   public void service(HttpServletRequest request,  HttpServletResponse response) throws IOException, ServletException
    {
		PrintWriter out = response.getWriter();
		  try
		  {
			Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
		    Connection con = DriverManager.getConnection("jdbc:odbc:javajsn");
		    Statement st = con.createStatement();
			ResultSet rs = st.executeQuery("Select * from product");
            out.print("<table>");
            while(rs.next()){
                out.print("<tr>");
                
                    out.print("<td>");
                    out.print(rs.getInt(1));
                    out.print("</td>");
                
                    out.print("<td>");
                    out.print(rs.getString(2));
                    out.print("</td>");
                
                    out.print("<td>");
                    out.print(rs.getInt(3));
                    out.print("</td>");
                
                out.print("</tr>");
            }
            out.print("</table>");
        }
           catch(Exception e){
			   out.print(e);
			   }
    }
}