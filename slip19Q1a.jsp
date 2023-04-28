<%@ page language="java" %>
<%@ page import="java.util.*" %>
<html>
    <head>
        <title>Greeting Program</title>
    </head>
    <body>
        <h1>Greeting Program</h1>
        <p>Please enter your name:</p>
        <form method="post">
            <input type="text" name="name">
            <input type="submit" value="Submit">
        </form>
<%
    if(request.getMethod().equalsIgnoreCase("post")) {
        String name = request.getParameter("name");
        String greeting = "";
        Date d = new Date();
        int hour = d.getHours();
        if (hour >= 0 && hour < 12) {
            greeting = "Good morning";
        } else if (hour >= 12 && hour < 18) {
            greeting = "Good afternoon";
        } else if (hour >= 18 && hour < 24) {
            greeting = "Good evening";
        }
        out.println("<p>" + greeting + ", " + name + "!</p>");
    }
%>
</body>
</html>
