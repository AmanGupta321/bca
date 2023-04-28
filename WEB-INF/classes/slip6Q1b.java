import java.io.*;

import javax.servlet.*;

import javax.servlet.http.*;

public class slip6Q1b extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)

            throws ServletException, IOException {

        int visits = 0;

        Cookie[] cookies = request.getCookies();

        if (cookies != null) {

            for (Cookie cookie : cookies) {

                if (cookie.getName().equals("visitCount")) {

                    visits = Integer.parseInt(cookie.getValue());

                }

            }

        }

        visits++;

        Cookie visitCookie = new Cookie("visitCount", Integer.toString(visits));

        response.addCookie(visitCookie);

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        if (visits == 1) {

            out.println("<html><head><title>Welcome</title></head><body>");

            out.println("<h2>Welcome to my website!</h2>");

            out.println("</body></html>");

        } else {

            out.println("<html><head><title>Visit Count</title></head><body>");

            out.println("<h2>You have visited this website " + visits + " times.</h2>");

            out.println("</body></html>");

        }

        out.close();

    }

}