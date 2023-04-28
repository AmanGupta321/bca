<%
    String num = request.getParameter("number");
    char f1 = num.charAt(0);
    char l1 = num.charAt(num.length()-1);
    int first = Integer.parseInt(""+f1);
    int last = Integer.parseInt(""+l1);
    int sum = first + last;
    out.println("<font color='red' size=18>");
    out.println("Sum of 1st and last digit is  : "+sum);
    out.println("</font>");
%>