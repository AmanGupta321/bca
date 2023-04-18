<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/net.css">
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
    if(isset($_POST['submit'])){
        // answer
        // a
        // c
        // a
        // b
        // c
        // b
        // d
        // c
        // c
        // a
        $ans = array('a', 'c', 'a', 'b', 'c', 'b', 'd', 'c', 'c', 'a');
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
            $sql =  "UPDATE `result` SET `network`= '$points' WHERE `result`.`username` = '$read_username';";
            mysqli_query($conn, $sql);

            header("Location: http://localhost/AMAN/gp1/userrequest.php");
            exit();
            }
    
    }
    ?>
    <hr>
    <form action="/AMAN/gp1/net_userpage.php" method="post">
    1. A collection of hyperlinked documents on the internet forms the?<br>
    <input type="radio" name="r1" value="a" required/>World Wide Web(WWW)<br>
    <input type="radio" name="r1" value="b" />E-mail System<br>
    <input type="radio" name="r1" value="c" />Mailing list<br>

    <br>
    2. The term HTTP stands for?
    <br>
    <input type="radio" name="r2" value="a" required/>Hyper terminal tracing program<br>
    <input type="radio" name="r2" value="b" />Hypertext tracing protocol<br>
    <input type="radio" name="r2" value="c" />Hypertext transfer protocol<br>

    <br>
    3. Which software prevents the external access to a system?
    <br>
    <input type="radio" name="r3" value="a" required/>Firewall<br>     
    <input type="radio" name="r3" value="b" />Gateway<br>
    <input type="radio" name="r3" value="c" />Router<br>

    <br>
    4. Which one of the following is the most common internet protocol?
    <br>
    <input type="radio" name="r4" value="a" required/>HTML<br>
    <input type="radio" name="r4" value="b" />TCP/IP<br>
    <input type="radio" name="r4" value="c" />NetBEUI<br>

    <br>
    5. The term FTP stands for?
    <br>
    <input type="radio" name="r5" value="a" required/>File transfer program <br>
    <input type="radio" name="r5" value="b" />File transmission protocol<br>
    <input type="radio" name="r5" value="c" />File transfer protocol<br>
    <input type="radio" name="r5" value="d" />File transfer protection<br>

    <br>
    6. The maximum length (in bytes) of an IPv4 datagram is?
    <br>
    <input type="radio" name="r6" value="a" required/>1024<br>     
    <input type="radio" name="r6" value="b" />65535<br>
    <input type="radio" name="r6" value="c" />512<br>

    <br>
    7. The length of an IPv6 address is?
    <br>
    <input type="radio" name="r7" value="a" required/>32 bits<br>
    <input type="radio" name="r7" value="b" />64 bits<br>
    <input type="radio" name="r7" value="c" />256 bits<br>
    <input type="radio" name="r7" value="d" />128 bits<br>

    <br>
    8. Which of the following cannot be used as a medium for 802.3 ethernet?
    <br>
    <input type="radio" name="r8" value="a" required/>A thin coaxial cable<br>     
    <input type="radio" name="r8" value="b" />A twisted pair cable<br>
    <input type="radio" name="r8" value="c" />A microwave link<br>
    <input type="radio" name="r8" value="d" />A fibre optical cable<br>

    <br>
    9. How many versions available of IP?
    <br>
    <input type="radio" name="r9" value="a" required/>6 version<br>     
    <input type="radio" name="r9" value="b" />4 version<br>
    <input type="radio" name="r9" value="c" />2 version<br>
    <input type="radio" name="r9" value="d" />1 version<br>

    <br>
    10. The term WAN stands for?
    <br>
    <input type="radio" name="r10" value="a" />Wide Area Network<br>
    <input type="radio" name="r10" value="b" required/>Wide Area Net<br>     
    <input type="radio" name="r10" value="c" />Wide Access Network<br>
    <input type="radio" name="r10" value="d" />Wide Access Net<br>

    <input type="submit" value="Submit" name="submit">
    <input type="button" value="My Profile" name="myprofile" onclick="window.location.href ='userrequest.php';">
    <input type="button" value="Logout" name="logout" onclick="window.location.href ='thankyou.html';">
    <br><br>
    </form>
</body>
</html>