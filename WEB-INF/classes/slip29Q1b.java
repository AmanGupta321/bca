import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class slip29Q1b extends HttpServlet {

  public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {

    // Set content type
    response.setContentType("text/html");

    // Get current session
    HttpSession session = request.getSession();

    // Get current timeout value
    int currentTimeout = session.getMaxInactiveInterval();

    // Print current timeout value
    PrintWriter out = response.getWriter();
    out.println("<html><body>");
    out.println("<h3>Current Session Timeout: " + currentTimeout + " seconds</h3>");

    // Display form to change timeout value
    out.println("<form method='post' action='" + request.getContextPath() + "/slip29Q1b'>");
    out.println("Enter new timeout value (in seconds): <input type='text' name='timeout'>");
    out.println("<input type='submit' value='Change'>");
    out.println("</form>");

    out.println("</body></html>");

  }

  public void doPost(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {

    // Get new timeout value from form data
    int newTimeout = Integer.parseInt(request.getParameter("timeout"));

    // Get current session
    HttpSession session = request.getSession();

    // Set new timeout value
    session.setMaxInactiveInterval(newTimeout);

    // Redirect to doGet method to display updated timeout value
    response.sendRedirect(request.getContextPath() + "/slip29Q1b");

  }

}