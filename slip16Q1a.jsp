<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username and Password</title>
</head>
<body>
    <form method="post">
        Enter Username : <input type="text" name="username"><br>
        Enter Password : <input type="text" name="password"><br>
        <input type="submit">
    </form>
    <%
    if(request.getMethod().equalsIgnoreCase("post")) {
        String uname = request.getParameter("username");
        String pwd = request.getParameter("password");
        if(uname.equals(pwd)){
            %>
            <%@ include file="slip16Q1a_Login.html" %>
            <%
        }
        else{
            %>
            <%@ include file="slip16Q1a_Error.html" %>
            <%
        }
    }
    %>
</body>
</html>

