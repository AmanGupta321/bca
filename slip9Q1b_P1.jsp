<%
String s[] = request.getParameterValues("prod");
int tot=0;
for(int i=0;i<s.length;i++) {
    tot+=Integer.parseInt(s[i]);
}
session.setAttribute("totl", tot);
response.sendRedirect("slip9Q1b_P2.html");
%>