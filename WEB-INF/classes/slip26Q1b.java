import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class slip26Q1b extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<html>");
        out.println("<head>");
        out.println("<title>My Hobbies</title>");
        out.println("</head>");
        out.println("<body>");
        out.println("<h3>Select your favorite hobby:</h3>");
        out.println("<form method='post'>");
        out.println("<input type='radio' name='hobby' value='painting' /> Painting<br>");
        out.println("<input type='radio' name='hobby' value='drawing' /> Drawing<br>");
        out.println("<input type='radio' name='hobby' value='singing' /> Singing<br>");
        out.println("<input type='radio' name='hobby' value='swimming' /> Swimming<br>");
        out.println("<input type='submit' value='Submit' />");
        out.println("<input type='reset' value='Reset' />");
        out.println("</form>");
        out.println("</body>");
        out.println("</html>");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String selectedHobby = request.getParameter("hobby");

        // Check if the cookie with the same name already exists
        boolean cookieExists = false;
        Cookie[] cookies = request.getCookies();
        if (cookies != null) {
            for (Cookie cookie : cookies) {
                if (cookie.getName().equals(selectedHobby)) {
                    cookieExists = true;
                    break;
                }
            }
        }

        // If cookie does not exist, create it and add it to the response
        if (!cookieExists) {
            Cookie hobbyCookie = new Cookie("selectedHobby", selectedHobby);
            hobbyCookie.setMaxAge(60 * 60 * 24 * 365); // set cookie to last 1 year
            response.addCookie(hobbyCookie);
        }

        // Display a message to the user
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<html>");
        out.println("<head>");
        out.println("<title>My Hobbies</title>");
        out.println("</head>");
        out.println("<body>");
        out.println("<h3>Your selected hobby is: " + selectedHobby + "</h3>");
        out.println("<p>Cookie created successfully!</p>");
        out.println("</body>");
        out.println("</html>");
    }
}