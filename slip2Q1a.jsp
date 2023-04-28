<%@ page language="java" %>
<%@ include file="slip2Q1a_form.jsp" %>
<%
int number = Integer.parseInt(request.getParameter("number"));
int sum = 0;
for (int i = 1; i <= number/2; i++) {
    if (number % i == 0) {
        sum += i;
    }
}
if (sum == number) {
    out.println("<p>" + number + " is a perfect number.</p>");
} else {
    out.println("<p>" + number + " is not a perfect number.</p>");
}
%>
