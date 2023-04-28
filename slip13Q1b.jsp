<%@page contentType="text/html" pageEncoding="UTF-8" %>
<html>

<body>
<%@ page import="java.sql.*;" %>
    <%! int hno; 
        String hname,address; 
    %>
    <% try
    { 
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver"); 
        Connection cn=DriverManager.getConnection("jdbc:odbc:javajsn","",""); 
        Statement st=cn.createStatement();
        ResultSet rs=st.executeQuery("select * from college"); %>
        <table border="1" width="40%">
            <tr>
                <td>Hospital No</td>
                <td>Name</td>
                <td>Address</td>
            </tr>
            <% while(rs.next()) { %>
                <tr>
                    <td>
                        <%= rs.getInt("cid") %>
                    </td>
                    <td>
                        <%= rs.getString("cname") %>
                    </td>
                    <td>
                        <%= rs.getString("addr") %>
                    </td>
                </tr>
                <% 
            } 
                cn.close(); 
            }
            catch(Exception e){ 
                out.println(e); 
            } 
            %>
</body>

</html>