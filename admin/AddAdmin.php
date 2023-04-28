<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW ADMIN</title>      
    <link rel="stylesheet" href="./css/adminstyle12.css">
    <style>
          .recentCustomers{
        width: 35vw;
        margin:0;
        text-align:center;
    }
    #hiddenTagS, #hiddenTagF{
    position: absolute;
  top: 580px;
  right: 870px;
  z-index: 1;
  
  width: 115px;
  height: 35px;
  font-size:25px;
}
#hiddenTagS{
    color: #298a0c;
  background: #a1d25d;
}
#hiddenTagF{
    color: #8a0c0c;
  background: #d15d5d;
}
    </style>
</head>

<body>   
     <!-- PHPWORKS START -->
     <?php
      require("adminnavigationforpre.html");
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
                $hash = password_hash($pwd, PASSWORD_DEFAULT);
            $sql =  "INSERT INTO `admin` (`dob`, `email`, `contact`, `aadhar`, `username`, `password`, `gender`, `address`) VALUES ('$dob', '$email', '$contact','$aadhar', '$uname', '$hash', '$gender', '$address');";
            $result = mysqli_query($conn, $sql);
     
            if($result){
                echo '<div id="hiddenTagS">Success!!!</div>';
                /*
                                
              echo '<div style=" position: absolute; top: 250px; right: 300px; color: green; font-size: 35px; width: 300px; height: 100px;">Success! Your entry has been submitted successfully!</div>';

              echo '<div style="font-weight: bold; color: green; background-color: lightgreen; font-size: 10pt;">Success! Your entry has been submitted successfully!';
              */
            }
        } catch (\Throwable $th) {
            /*echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!</div>';*/
            echo '<div id="hiddenTagF">Fail!!!</div>';
            }
          } 
        }
    ?>
    <!-- PHPWORKS END -->
    
<div class="main">
    <div class="details">      
        <!-- Add New Customers -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Add New Admin</h2>
            </div>
            <br>
                <form action="/gp1/admin/AddAdmin.php" method="POST" >
                <input class="inputstyle" name="username" placeholder="Username" type="text" required/>
                <br />
        
                <input class="inputstyle" name="password" placeholder="Password" type="Password" required/>
                <br />
                <input class="inputstyle" name="dob" type="DATE" required /> 
                <br />

                <input class="inputstyle" name="email" placeholder="Email" type="email" required />
                <br />

                <input class="inputstyle" name="contact" placeholder="Contact" type="Number" required/> 
                <br />

                <input class="inputstyle" name="aadhar" placeholder="Aadhar No." type="Number" required/> 
                <br />
                
                
            
                <div id="gender">
                Gender :&nbsp;<input type="radio" name="r1" value="Male" />Male
                        &nbsp;<input type="radio" name="r1" value="Female" />Female 
                </div>
                <textarea name="address" placeholder="Address" required></textarea>
                
        <br><br><br>
                <input type="submit" class="btn" id="btn1" name="submit" value="Submit">
                <input type="reset" class="btn" id="btn2" value="Reset">
            </div>
        </div>
    </div>
</body>

</html>