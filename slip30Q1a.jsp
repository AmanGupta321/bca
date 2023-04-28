<%@ page language="java" %>
<html>
    <head>
        <title>Reverse String</title>
    </head>
    <body>
        <h1>Program to reverse a String input by User</h1>
        <p>Please a String:</p>
        <form method="post">
            <input type="text" name="name">
            <input type="submit" value="Submit">
        </form>
<%
    if(request.getMethod().equalsIgnoreCase("post")) {
        String name = request.getParameter("name");
        for(int i=name.length()-1;i>=0;i--){
            out.print(name.charAt(i));
        }
    }
%>
</body>
</html>
