<!DOCTYPE html>
<html>
<head>
    <title>FORGET PASSWORD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap">
    <link rel="stylesheet" href="./css/forgotpwd.css?<?php echo time(); ?>">
</head>
<body>
    <!-- PHPWORKS START -->
    <!-- UPDATE `register` SET `password` = '1235' WHERE `register`.`username` = 'aman -->
<?php    
if(isset($_POST['submit']))
        {
        $uname = $_POST['username'];
        $changepwd = $_POST['changepassword'];

          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "dbaman";
          $conn = mysqli_connect($servername, $username, $password, $database);
    
          if (!$conn)
        {
              die("Sorry we failed to connect: ". mysqli_connect_error());
        }
          else
        { 
              $sql =  "SELECT * FROM `register`";
              $result = mysqli_query($conn, $sql);
              $num_rows = mysqli_num_rows($result);
              $f = false;
              if($num_rows>0)
            {
                  while($row = mysqli_fetch_assoc($result))
                {
                    if ($row['username']==$uname)
                    {
                        $sql_change = "UPDATE `register` SET `password` = '$changepwd' WHERE `register`.`username` = '$uname';";
                        mysqli_query($conn, $sql_change);
                        echo '<div style="font-weight: bold; font-size: 18pt; color: green; background-color: lightgreen; text-align: center;">PASSWORD CHANGED SUCCESSFULLY</div>';
                        echo '<script type="text/javascript">let redirect_Page = () => {
                            let tID = setTimeout(function () {
                                window.location.href = "./login.php";
                                window.clearTimeout(tID);
                            },2200);
                        }
                        redirect_Page();</script>';

                        $f = true;
                        break;
                        }
                        else{
                            $f = false;
                        }
                }
            }
            if ($f == false){
                echo '<div style="font-weight: bold; text-align: center; color: rgba(248, 46, 11); background-color: rgb(250, 151, 151); font-size: 15pt;">OOPS!!! No Record Found...<br><a href="./register.php" style="text-align: center; font-weight: bold; color: rgba(19,247,76); font-size: 15pt;">REGISTER HERE</a></div>';
                }
        }
        }
    ?>
    <!-- PHPWORKS END -->



        <nav>
            <!-- vh -80 -->
            <div class="logo">
                <h1> Q U I Z<br>H U B</h1>
            </div>
            <div class="menu">
                <a href="./index.html">H o m e</a>
                <a href="./login.php">L o g i n</a>
                <a href="./about.html">A b o u t</a>
                <a href="./contact.html">C o n t a c t</a>
                <a href="./feedback.php">F e e d b a c k</a>
            </div>
        </nav>


        <div class="main_div">
            <div class="box">
                <h1>Forgot Password</h1>
                <form method = "POST">
                    <div class="inputBox">
                        <input type="text" name="username" autocomplete="off" required>
                        <label for="">Username</label>
                    </div>

                    <div class="inputBox">
                        <input type="Password" name="changepassword" autocomplete="off" required>
                        <label for="">Change Password</label>
                    </div>

                    <input type="submit" class = "button" name="submit" value="Submit">
                    
                </form>
            </div>
        </div>
</body>
</html>