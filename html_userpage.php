<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/html.css">
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
        // b
        // a 
        // c
        // a
        // a
        // b
        // a
        // b
        // b
        // c

        $ans = array('b', 'a', 'c', 'a', 'a', 'b', 'a', 'b', 'b', 'c');
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
            $sql =  "UPDATE `result` SET `html`= '$points' WHERE `result`.`username` = '$read_username';";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/AMAN/gp1/userrequest.php");
            exit();
            }
}
    ?>
    <hr>
    
    <form action="/AMAN/gp1/html_userpage.php" method="post">
    1. HTML STANDS FOR:<br>
    <input type="radio" name="r1" value="a" required/>Hyperlinks and Text Markup Language<br>
    <input type="radio" name="r1" value="b" />Hyper Text Markup Language<br>
    <input type="radio" name="r1" value="c" />Home Tool Markup Language<br>

    <br>
    2. How many tags are there in a regular element?
    <br>
    <input type="radio" name="r2" value="a" required/>2<br>
    <input type="radio" name="r2" value="b" />1<br>
    <input type="radio" name="r2" value="c" />3<br>

    <br>
    3. What is the difference between an opening tag and a closing tag?
    <br>
    <input type="radio" name="r3" value="a" required/>Opening tag has a / in front<br>
    <input type="radio" name="r3" value="b" />There is no difference<br>
    <input type="radio" name="r3" value="c" />Closing tag has a / in front<br>

    <br>
    4. &lt; br &gt; What type of tag is this?
    <br>
    <input type="radio" name="r4" value="a" required/>Break<br>
    <input type="radio" name="r4" value="b" />A broken one<br>
    <input type="radio" name="r4" value="c" />An opening tag<br>

    <br>
    5. &lt; body &gt; is this an opening tag or a closing tag?
    <br>
    <input type="radio" name="r5" value="a" required/>opening<br>
    <input type="radio" name="r5" value="b" />closing<br>

    <br>
    6. Where is the meta tag only found?
    <br>
    <input type="radio" name="r6" value="a" required/>The last page<br>     
    <input type="radio" name="r6" value="b" />The home page<br>
    <input type="radio" name="r6" value="c" />The second page<br>

    <br>
    7. What is an element that does not have a closing tag called?
    <br>
    <input type="radio" name="r7" value="a" required/>Empty element<br>
    <input type="radio" name="r7" value="b" />Closed element<br>

    <br>
    8. You should save HTML files with which file extension?
    <br>
    <input type="radio" name="r8" value="a" required/>.htm<br>     
    <input type="radio" name="r8" value="b" />.html<br>
    <input type="radio" name="r8" value="c" />.webpage<br>

    <br>
    9. &lt;input&gt; is -
    <br>
    <input type="radio" name="r9" value="a" required/>a format tag<br>     
    <input type="radio" name="r9" value="b" />an empty tag<br>
    <input type="radio" name="r9" value="c" />All of the above<br>
    
    <br>
    10. The tags in HTML are :
    <br>
    <input type="radio" name="r10" value="a" required/>case-sensitive<br>     
    <input type="radio" name="r10" value="b" />in upper case<br>
    <input type="radio" name="r10" value="c" />not case sensitive<br>
    <input type="radio" name="r10" value="d" />in lowercase<br>

    <input type="submit" value="Submit" name="submit">
    <input type="button" value="My Profile" name="myprofile" onclick="window.location.href ='userrequest.php';">
    <input type="button" value="Logout" name="logout" onclick="window.location.href ='thankyou.html';">
    <br><br>

</form>
</body>
</html>