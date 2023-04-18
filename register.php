<!DOCTYPE html>
<html>

<head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <!-- PHPWORKS START -->
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $lname = $_POST['lName'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $aadhar = $_POST['aadhar'];
            $uname = $_POST['username'];
            $pwd = $_POST['password'];
            $address = $_POST['address'];
            
        if(isset($_POST['submit'])){
             $gender = $_POST['r1'];
            }

          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "dbaman";
          $conn = mysqli_connect($servername, $username, $password, $database);
    
          if (!$conn){
              die("Sorry we failed to connect: ". mysqli_connect_error());
          }
          else{ 
            $sql =  "INSERT INTO `register` (`firstName`, `lastName`, `dob`, `email`, `contact`, `aadhar`, `username`, `password`, `gender`, `address`) VALUES ('$name', '$lname', '$dob', '$email', '$contact','$aadhar', '$uname', '$pwd', '$gender', '$address');";
            $result = mysqli_query($conn, $sql);
            $sql_result_query = "INSERT INTO `result` (`username`, `html`, `php`, `cpp`, `network`) VALUES ('$uname', '20', '20', '20', '20');";
            mysqli_query($conn, $sql_result_query);
     
            if($result){
              echo '<div style="font-weight: bold; color: green; background-color: lightgreen; font-size: 10pt;">Success! Your entry has been submitted successfully!<br>PROCEED TO --></div><a href="./login.php" style="font-weight: bold; color: green; font-size: 15pt;">LOGIN</a>';
            }
            else{
                echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!</div>';
            }
          }
        }
    ?>
    <!-- PHPWORKS END -->

    <div id="header" class="section">
        <h1>SIGNUP PAGE </h1>
    </div>

    <!-- The Contents of the        
                    Form Starts here:-->

    <div class="sectionnew">
        <form action="/AMAN/gp1/register.php" method="POST" >
            <input class="up" name="name" placeholder="First Name" type="text" required />
            <br />

            <input class="up" name="lName" placeholder="Last name" type="text" required />
            <br />

            <input class="up" name="dob" type="DATE" required /> 
            <br />

            <input class="up" name="email" placeholder="Email" type="email" required />
            <br />

            <input class="up" name="contact" placeholder="Contact" type="Number" /> 
            <br />

            <input class="up" name="aadhar" placeholder="Aadhar No." type="Number" /> 
            <br />
            
            <input class="up" name="username" placeholder="Username" type="text" />
            <br />

            <input class="up" name="password" placeholder="Password" type="Password" />
            <br />
        
            <div id="gender">
            Gender :&nbsp;<input type="radio" name="r1" value="Male" />Male
                    &nbsp;<input type="radio" name="r1" value="Female" />Female 
            </div>
            <textarea name="address" placeholder="Address" required></textarea>
            
        <br>
            <input type="submit" id="submit" name="submit" value="Submit">
            <input type="reset" id="reset" value="Reset">
        </form>
        </div>
</body>

</html>
