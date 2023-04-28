<%@ page language="java" %>
<html>
    <head>
        <title>Number to Words Program</title>
    </head>
    <body>
        <h1>Numbers to Words Program (in Red color)</h1>
        <p>Enter any Number:</p>
        <form method="post">
            <input type="text" name="no">
            <input type="submit" value="Submit">
        </form>
<%
    if(request.getMethod().equalsIgnoreCase("post")) {
        String no = request.getParameter("no");
        String words = "";
        for (int i = 0; i < no.length(); i++) {
            Character ch = no.charAt(i);
            int digit = Integer.parseInt("" + ch);
            switch (digit) {
                case 1:
                    words += "one ";
                    break;
                case 2:
                    words += "two ";
                    break;
                case 3:
                    words += "three ";
                    break;
                case 4:
                    words += "four ";
                    break;
                case 5:
                    words += "five ";
                    break;
                case 6:
                    words += "six ";
                    break;
                case 7:
                    words += "seven ";
                    break;
                case 8:
                    words += "eight ";
                    break;
                case 9:
                    words += "nine ";
                    break;
                case 0:
                    words += "zero ";
                    break;
            }
        }
        out.println("<font color='red'>" + words + "</font>");
    }
%>
</body>
</html>
