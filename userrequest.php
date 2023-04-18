<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/usereq.css?<?php echo time(); ?>">
</head>

<body>
        <nav>   <!-- vh -80 -->
            <div class="logo"><h1> Q U I Z<br>H U B</h1></div>
            <div class="menu">
                <a href="./index.html">H o m e</a>
                <a href="./result.php">R e s u l t</a>
                <a href="./contact.html">C o n t a c t</a>
                <a href="./about.html">A b o u t</a>
                <a href="./feedback.php">F e e d b a c k</a>
                <a id=logout href="./thankyou.html">L o g o u t</a>
            </div>
        </nav><br>
    
    
    <?php
    // FILE OPERATION TO GET DATA
    $myfile = fopen("login_data.txt", "r") or die ("Unable to open file!");
    $r = fgets($myfile);
    if(!$r){
        echo "Backend error";
    }
    else{
        echo '<hr><hr>';
        echo '<h1 id=h1>Thank You!!! &nbsp;';
        echo '<u>';
        echo $r;
        echo '</u> &nbsp;For participating with us</h1>';
        fclose($myfile);
    }

    if(isset($_POST['submit'])){
        $sub = $_POST['quiz'];
        if($sub == 'html')
        {
            header("Location: http://localhost/AMAN/gp1/html_userpage.php");
            exit();
        }
        elseif($sub == 'php')
        {
            header("Location: http://localhost/AMAN/gp1/php_userpage.php");
            exit();
        }
        else if($sub == 'cpp')
        {
            header("Location: http://localhost/AMAN/gp1/cpp_userpage.php");
            exit();
        }
        else
        {
            header("Location: http://localhost/AMAN/gp1/net_userpage.php");
            exit();
        }
    }
    ?>

    
<br>
<hr>
<hr>
<br>
    <h2>Enjoy the top programming question to enhance your knowledge. Here, we have a quiz on topics : </h2><h3> 1.) HTML<br>2.) PHP<br>3.) CPP<br>4.) NETWORKING<br></h3>
    <br>
    <hr><hr><br>
    <form method="POST">
        Choose a Quiz Subject : &nbsp;
        <select name="quiz">
            <option value="html">HTML</option>
            <option value="php">PHP</option>
            <option value="cpp">CPP</option>
            <option value="network">NETWORKING</option>
        </select>
    <input type="submit" value="Submit" name="submit">
    <input type="button" value="Change Password" name="changepwd" onclick="window.location.href ='forgotpwd.php';">
    </form>
    <br>
    <hr><hr><br>
    <p>Do suggest us at <a href="./feedback.php">feedback </a>form. <br> We care our Valuable Clients.</p>
</body>

</html>