<% 
String e = request.getParameter("email");
String exp = "^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$";
if(exp.matches(e)){
    out.print("Valid Email");
}
else{
    out.print("Invalid Email");
}
%>
