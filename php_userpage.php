<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/php.css">
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
        // b
        // d
        // c
        // a
        // c
        // c
        $ans = array('a', 'c', 'b', 'd', 'c', 'a', 'c', 'c', 'c', 'a');
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
            $sql =  "UPDATE `result` SET `php`= '$points' WHERE `result`.`username` = '$read_username';";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/AMAN/gp1/userrequest.php");
            exit();
            }
}
    ?>
    <hr>
    <form action="/AMAN/gp1/php_userpage.php" method="post">
    1. PHP STANDS FOR:<br>
    <input type="radio" name="r1" value="a" required/>Personal Home Processor<br>
    <input type="radio" name="r1" value="b" />Hypertext Preprocessor<br>
    <input type="radio" name="r1" value="c" />Pretext Hypertext Preprocessor<br>

    <br>
    2. Who is known as the father of PHP?
    <br>
    <input type="radio" name="r2" value="a" required/>Drek Kolkevi<br>
    <input type="radio" name="r2" value="b" />List Barely<br>
    <input type="radio" name="r2" value="c" />Rasmus Lerdrof<br>

    <br>
    3. Variable name in PHP starts with?
    <br>
    <input type="radio" name="r3" value="a" required/>! (Exclamation)<br>     
    <input type="radio" name="r3" value="b" />$ (Dollar)<br>
    <input type="radio" name="r3" value="c" />& (Ampersand)<br>
    <input type="radio" name="r3" value="d" /># (Hash)<br>

    <br>
    4. Which of the following is used to display the output in PHP?
    <br>
    <input type="radio" name="r4" value="a" required/>echo<br>
    <input type="radio" name="r4" value="b" />write<br>
    <input type="radio" name="r4" value="c" />print<br>
    <input type="radio" name="r4" value="d" />Both (a) and (c)<br>

    <br>
    5. Which of the following is used for concatenation in PHP?
    <br>
    <input type="radio" name="r5" value="a" required/>+ (plus)<br>
    <input type="radio" name="r5" value="b" />* (Asterisk)<br>
    <input type="radio" name="r5" value="c" />. (dot)<br>

    <br>
    6. What does PEAR stands for?
    <br>
    <input type="radio" name="r6" value="a" required/>PHP extension and application repository<br>     
    <input type="radio" name="r6" value="b" />PHP enhancement and application reduce <br>
    <input type="radio" name="r6" value="c" />PHP event and application repository<br>

    <br>
    7. Which of the following is the correct way to create a function in PHP?
    <br>
    <input type="radio" name="r7" value="a" required/>Create myFunction()<br>
    <input type="radio" name="r7" value="b" />New_function myFunction()<br>
    <input type="radio" name="r7" value="c" />function myFunction()<br>
    <input type="radio" name="r7" value="d" />None of the above<br>

    <br>
    8. What is the use of fopen() function in PHP?
    <br>
    <input type="radio" name="r8" value="a" required/>The fopen() function is used to open folders in PHP<br>     
    <input type="radio" name="r8" value="b" />The fopen() function is used to open remote server<br>
    <input type="radio" name="r8" value="c" />The fopen() function is used to open files in PHP<br>

    <br>
    9. Which of the following function is used to set cookie in PHP?
    <br>
    <input type="radio" name="r9" value="a" required/>createcookie() <br>
    <input type="radio" name="r9" value="b" />makecookie()<br>
    <input type="radio" name="r9" value="c" />setcookie()<br>

    <br>
    10. Which of the following is not a variable scope in PHP?
    <br>
    <input type="radio" name="r10" value="a" required/>Extern<br>     
    <input type="radio" name="r10" value="b" />Local<br>
    <input type="radio" name="r10" value="c" />Static<br>
    <input type="radio" name="r10" value="d" />Global<br>

    <input type="submit" value="Submit" name="submit">
    <input type="button" value="My Profile" name="myprofile" onclick="window.location.href ='userrequest.php';">
    <input type="button" value="Logout" name="logout" onclick="window.location.href ='thankyou.html';">
    </form>
</body>
</html>