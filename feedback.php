<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK</title>
    <link rel="stylesheet" href="./css/feedback.css">
</head>
<body>
<?php
if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "dbaman";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn)
        {
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{ 
            $sql =  "INSERT INTO `feedback` (`fullname`, `email`, `msg`) VALUES ('$fullname', '$email', '$msg');";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/AMAN/gp1/index.html");
            exit();
            }
        }
?>
        <nav>
            <!-- vh -80 -->
            <div style="background-color: lightgreen;"></div>
            <div class="logo">
                <h1> Q U I Z<br>H U B</h1>
            </div>
            <div class="menu">
                <a href="./index.html">H o m e</a>
                <a href="./login.php">L o g i n</a>
                <a href="./about.html">A b o u t </a>
                <a href="./contact.html">C o n t a c t</a>
                <a href="./feedback.php">F e e d b a c k</a>
            </div>
        </nav><hr><hr>

    <form method="POST">
        <h2>Send Message</h2>
        <br>
        <table>
            <tr>
                <th>Full Name </th>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <th>Email </th>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <th>Type Your Message </th>
                <td><textarea name="msg" required="required"></textarea></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Send" class="button">
    </form>
</body>
</html>