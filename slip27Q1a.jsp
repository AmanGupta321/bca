  <%
    String tid = request.getParameter("tid");
    String tname = request.getParameter("tname");
    String desg = request.getParameter("desg");
    String subject = request.getParameter("subject");
    String qualification = request.getParameter("qualification");

    if (tid != null && !tid.isEmpty() && tname != null && !tname.isEmpty() && desg != null && !desg.isEmpty() && subject != null && !subject.isEmpty() && qualification != null && !qualification.isEmpty()) 
    {
      out.println("<h3>Teacher Details:</h3>");
      out.println("TID: " + tid + "<br>");
      out.println("TName: " + tname + "<br>");
      out.println("Desg: " + desg + "<br>");
      out.println("Subject: " + subject + "<br>");
      out.println("Qualification: " + qualification + "<br>");
    }
  %>