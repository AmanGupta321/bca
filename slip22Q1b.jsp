<%@ page import="java.sql.*;" %>
    <%! int hno; 
        String hname,address; 
    %>
    <% try
    { 
        // Establishing Connection
        Class.forName("sun.jdbc.odbc.JdbcOdbcDriver"); 
        Connection cn=DriverManager.getConnection("jdbc:odbc:javajsn","",""); 
        Statement st=cn.createStatement();

        // Query to insert data in Account table
        String accountNumber = request.getParameter("accountNumber");
        String accountType = request.getParameter("accountType");
        int balance = Integer.parseInt(request.getParameter("balance"));
        String sql = "INSERT INTO account (accountNumber, accountType, balance) VALUES (?, ?, ?)";
        PreparedStatement statement = cn.prepareStatement(sql);
        statement.setString(1, accountNumber);
        statement.setString(2, accountType);
        statement.setInt(3, balance);
        int rowsInserted = statement.executeUpdate();
        statement.close();

        if (rowsInserted > 0) {
            out.println("Account added successfully.");
        } else {
            out.println("Failed to add account.");
        }

        // Query to fetch all details from account table
        ResultSet rs=st.executeQuery("select * from account"); 
        %>
        <h2>Accounts</h2>
        <table border="1" width="40%">
            <tr>
                <td>Account No</td>
                <td>Type</td>
                <td>Balance</td>
            </tr>
            
            <% 
                while(rs.next()) { 
                    out.println("<tr><td>");
                    out.println(rs.getString(1));
                    out.println("</td>");

                    out.println("<td>");
                    out.println(rs.getString(2));
                    out.println("</td>");
                    
                    out.println("<td>");
                    out.println(rs.getInt(3));
                    out.println("</td>");
                    out.println("</tr>");
                 
            } 
                cn.close(); 
            }
            catch(Exception e){ 
                out.println(e); 
            } 
            %>
</body>

</html>