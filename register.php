<!DOCTYPE html>
<html>

<head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="./css/regist.css">
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
            try {
                //code...
            
            $sql =  "INSERT INTO `register` (`firstName`, `lastName`, `dob`, `email`, `contact`, `aadhar`, `username`, `password`, `gender`, `address`) VALUES ('$name', '$lname', '$dob', '$email', '$contact','$aadhar', '$uname', '$pwd', '$gender', '$address');";
            $result = mysqli_query($conn, $sql);
     
            if($result){
              echo '<div style="font-weight: bold; color: green; background-color: lightgreen; font-size: 10pt;">Success! Your entry has been submitted successfully!<br>PROCEED TO --></div><a href="./login.php" style="font-weight: bold; color: green; font-size: 15pt;">LOGIN</a>';
            }
        } catch (\Throwable $th) {
            /*echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!</div>';*/
            echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! Aadhaar Card already register.<br>Try using different aadhar card.</div>';
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

    <div id="feedrules">
        How to Fill the form?
        <hr>
        1. All fields are mandatory to fill. <br>
        2. New Aadhar for every new registration  <br>
        3. Username should be Unique 
    </div>

    
    <div class="sectionnew">
        <form action="/gp1/register.php" method="POST" >
            <input class="up" name="name" placeholder="First Name" type="text" required />
            <br />

            <input class="up" name="lName" placeholder="Last name" type="text" required />
            <br />

            <input class="up" name="dob" type="DATE" required /> 
            <br />

            <input class="up" name="email" placeholder="Email" type="email" required />
            <br />

            <input class="up" name="contact" placeholder="Contact" type="Number" required/> 
            <br />

            <input class="up" name="aadhar" placeholder="Aadhar No." type="Number" required/> 
            <br />
            
            <input class="up" name="username" placeholder="Username" type="text" required/>
            <br />

            <input class="up" name="password" placeholder="Password" type="Password" required/>
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
        <div id="usernameselected">
            UserName Already Selected : <hr>
        <!-- Code Starts-->                        
        <?php
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
                                
                                    echo $row['username'];
                                    echo "<br>";
                            }
                        }
                    }
        ?>
        <!-- Code End-->                        
        </div>
</body>

</html>
