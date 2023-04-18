<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/cpp.css">
</head>
<body>
        <nav>
            <!-- vh -80 -->
            <div class="logo">
                <h1> Q U I Z<br>H U B</h1>
            </div>
            <div class="menu">
                <a href="./index.html">H o m e</a>
                <a href="./contact.html">C o n t a c t</a>
                <a href="./about.html">A b o u t</a>
                <a href="./feedback.php">F e e d b a c k</a>
            </div>
        </nav>
    <hr>
    <?php
    echo '<h1 id=h1>Welcome ';
    $myfile = fopen("login_data.txt", "r") or die ("Unable to open file!");
    $read_username = fgets($myfile);
    echo $read_username;
    echo '</h1>';
    fclose($myfile);
    if (isset($_POST['submit'])){
        // answer
        // b
        // c
        // b
        // c
        // b
        // d
        // a
        // a
        // c
        // a
        $ans = array('b', 'c', 'b', 'c', 'b', 'd', 'a', 'a', 'c', 'a');
        $points = NULL;
        for($i=1; $i<=10; $i++){
                $selected_option = $_POST['r'.$i];
                    if($selected_option == $ans[$i-1]){
                        $points+=1;
                }
        }
        // echo $points;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "dbaman";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn){
                    die("Sorry we failed to connect: ". mysqli_connect_error());
                }
        else{ 
            $sql =  "UPDATE `result` SET `cpp`= '$points' WHERE `result`.`username` = '$read_username';";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/AMAN/gp1/userrequest.php");
            exit();
            }
    
}
    ?>
    <hr>
    <form action="/AMAN/gp1/cpp_userpage.php" method="post">
    1. Which of the following is the original creator of the C++ language?
    <br>
    <input type="radio" name="r1" value="a" required/>Dennis Ritchie<br>     
    <input type="radio" name="r1" value="b" />Bjarne Stroustrup<br>
    <input type="radio" name="r1" value="c" />Brian Kernighan<br>
    
    <br>
    2. Which of the following is the address operator?
    <br>
    <input type="radio" name="r2" value="a" required/>@<br>
    <input type="radio" name="r2" value="b" />#<br>
    <input type="radio" name="r2" value="c" />&<br>
    <input type="radio" name="r2" value="d" />%<br>

    <br>
    3. Which of the following is the correct identifier?<br>
    <input type="radio" name="r3" value="a" required/>$varname<br>
    <input type="radio" name="r3" value="b" />VAR_123<br>
    <input type="radio" name="r3" value="c" />varname@<br>
    <input type="radio" name="r3" value="d" />None of the above<br>

    <br>
    4. C++ is a _______ type of language?
    <br>
    <input type="radio" name="r4" value="a" required/>High-level Language<br>
    <input type="radio" name="r4" value="b" />Low-level Language<br>
    <input type="radio" name="r4" value="c" />Middle-level Language<br>

    <br>
    5. Which of the following represents the tab?
    <br>
    <input type="radio" name="r5" value="a" required/>\n<br>
    <input type="radio" name="r5" value="b" />\t<br>
    <input type="radio" name="r5" value="c" />\r<br>
    <input type="radio" name="r5" value="d" />None of the above<br>

    <br>
    6. Which of the following is the correct syntax to add the header file in the C++ program?
    <br>
    <input type="radio" name="r6" value="a" required/>#include &lt;userdefined&gt; <br>     
    <input type="radio" name="r6" value="b" />#include "userdefined.h"<br>
    <input type="radio" name="r6" value="c" />&lt;include&gt; "userdefined.h"<br>
    <input type="radio" name="r6" value="d" />Both A and B<br>

    <br>
    7. Which of the following is the correct syntax to print the message in C++ language?
    <br>
    <input type="radio" name="r7" value="a" required/>cout&lt;&lt;"Hello world!";<br>
    <input type="radio" name="r7" value="b"/>Cout&lt;&lt;"Hello world!";<br>
    <input type="radio" name="r7" value="c"/>Out&lt;&lt;"Hello world!";<br>
    <input type="radio" name="r7" value="d"/>None of above<br>
    

    <br>
    8. Which type of array is always considered as linear array?
    <br>
    <input type="radio" name="r8" value="a" required/>Single-dimensional<br>     
    <input type="radio" name="r8" value="b" />Multi-dimensional<br>
    <input type="radio" name="r8" value="c" />Both A and B<br>
    <input type="radio" name="r8" value="d" />None of the above<br>

    <br>
    9. Which of the following can be considered as the members that can be inherited but not accessible in any class?
    <br>
    <input type="radio" name="r9" value="a" required/>Public<br>     
    <input type="radio" name="r9" value="b" />Protected<br>
    <input type="radio" name="r9" value="c" />Private<br>
    <input type="radio" name="r9" value="d" />Both A and C<br>

    <br>
    10. Which of the following statement is correct about the class?
    <br>
    <input type="radio" name="r10" value="a" required/>An object is the instance of the class<br>     
    <input type="radio" name="r10" value="b" />An object is the instance of the object<br>
    <input type="radio" name="r10" value="c" />An object is the instance of the data type of that class<br>
    <input type="radio" name="r10" value="d" />Both A and C<br>

    <input type="submit" value="Submit" name="submit">
    <input type="button" value="My Profile" name="myprofile" onclick="window.location.href ='userrequest.php';">
    <input type="button" value="Logout" name="logout" onclick="window.location.href ='thankyou.html';">
    <br><br>
    </form>
</body>
</html>