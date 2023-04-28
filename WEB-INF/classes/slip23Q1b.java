import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;

public class slip23Q1b extends HttpServlet {
	
   public void service(HttpServletRequest request,  HttpServletResponse response) throws IOException, ServletException
    {
		PrintWriter out = response.getWriter();
		  try
		  {
			Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
		    Connection con = DriverManager.getConnection("jdbc:odbc:javajsn");
		    Statement st = con.createStatement();
		    String u=request.getParameter("t1");
		    String p=request.getParameter("pwd");
			ResultSet rs = st.executeQuery("Select * from login where uname='"+u+"' and password='"+p+"'");
            if(rs.next())
              out.print("Login Success");
              else
               out.print("Login UnSuccess");
		   }catch(Exception e){
			   out.print(e);
			   }
    }
}