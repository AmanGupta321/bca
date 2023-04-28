import java.io.*;

import javax.servlet.*;

import javax.servlet.http.*;

 

public class slip4Q1b extends HttpServlet implements Servlet {

 

    public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {

        PrintWriter pw = res.getWriter();

        pw.println("<html><body><h1><b>INFORMATION OF SERVER</b></h1>");

        pw.println("<br>Server Name:" + req.getServerName());

        pw.println("<br>Server Port:" + req.getServerPort());

        pw.println("<br> Ip Address:" + req.getRemoteAddr());

        pw.println("<br> CLient Browser:" + req.getHeader("User-Agent"));

        pw.println("</body></html>");

        pw.close();

    }

}