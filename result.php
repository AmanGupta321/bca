<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULT</title>
    <link rel="stylesheet" href="./css/resultpage.css"/>
</head>
<body>
        <nav>
        <!-- vh -80 -->
        <div class="logo">
            <h1> Q U I Z<br>H U B</h1>
        </div>
        <div class="menu">
            <a href="./index.html">H o m e</a>
            <a href="./about.html">A b o u t</a>
            <a href="./contact.html">C o n t a c t</a>
            <a href="./feedback.php">F e e d b a c k</a>
            <a id=logout href="./thankyou.html">L o g o u t</a>
        </div>
    </nav><hr>


    <div id="box">
    <p><u>Result Pa</u>ge</p>
    <br>
    <?php
        $myfile = fopen("login_data.txt", "r") or die ("Unable to open file!");
        $uname = fgets($myfile);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "dbaman";
        $html = NULL;
        $php = NULL;
        $cpp = NULL;
        $net = NULL;
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn)
        {
                die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{
            $sql = "SELECT * FROM `result` WHERE username = '$uname'";        
            $result = mysqli_query($conn, $sql);

            $sql1 = "SELECT * FROM `register` WHERE username = '$uname'";        
            $result1 = mysqli_query($conn, $sql1);

            echo "<table>";
            while($row1 = mysqli_fetch_assoc($result1))
        {
            echo "<tr>"."<td colspan=4 id=upper>"."Name : ".$row1['firstName']." ".$row1['lastName']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."DOB : ".$row1['dob']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."Contact : ".$row1['contact']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."Email : ".$row1['email']."</td>"."</tr>";
        }
            echo "<tr class=underline>";
            echo "<th>"."HTML"."</th>";
            echo "<th>"."PHP"."</th>";
            echo "<th>"."CPP"."</th>";
            echo "<th>"."NETWORK"."</th>";
            echo "</tr>";
            echo "<tr>";
            while($row = mysqli_fetch_assoc($result))
            {
                $html = $row['html'];
                if ($html != 20){
                    echo "<td>".$html."/10</td>";
                }
                else{
                    echo "<td>"."Not Attempted"."</td>";
                    $html = 0;
                }
                
                $php = $row['php'];
                if($php != 20){
                    echo "<td>".$php."/10</td>";
                }
                else{
                    echo "<td>"."Not Attempted"."</td>";
                    $php = 0;
                }

                $cpp = $row['cpp'];
                if($cpp != 20){
                    echo "<td>".$cpp."/10</td>";
                }
                else{
                    echo "<td>"."Not Attempted"."</td>";
                    $cpp = 0;
                }

                $net = $row['network'];
                if($net != 20){
                    echo "<td>".$net."/10</td>";
                }
                else{
                    echo "<td>"."Not Attempted"."</td>";
                    $net = 0;
                }
            }
            echo"</tr>";
        }
        $tm = ($html + $php + $cpp + $net);
        echo "<tr class=underline>"."<td colspan=4>"."Marks Obtained : ".$tm."/40</td>"."</tr>";
        $per = $tm/0.40;
        echo "<tr>"."<td colspan=4>"."Percentage : ".$per."%</td>"."</tr>";    
        echo "</table>";
        ?>
        <br>
        <input type="button" value="My Profile" name="myprofile" onclick="window.location.href ='userrequest.php';">
    </div>
</body>
</html>