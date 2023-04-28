<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFY EXISTING USERS</title>
    <style>
    </style>
</head>

<body>
    <?php
        require("adminnavigationforpre.html");
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "dbaman";
        $conn = mysqli_connect($servername, $username, $password, $database);
    ?>
<div class="main">
    <div class="details">            

        
        
            <!-- UPDATE USER CODE -->
        <div class="recentCustomers" id="updateUser">
            <div class="cardHeader">
                <h2>Modify User : </h2>
            </div>
            <table>
            <form action="/gp1/admin/preCustomers.php" method="POST">
                <h4>Reference : </h4>
                Select a Option :
            <tr>
                <select name="selectedReferenceOption" class="inputstyle">
                    <option value="username">Username</option>
                    <option value="aadhar">aadhar</option>
                    <option value="Email" type="email">Email</option>
                </select>
            </tr>
            <tr>
                <input class="updateUserinput"  name="selectedReferenceOptionInput" placeholder="Enter Selected Option Value" type="text"  />
            </tr><br><br><br>
                    What You want to Update : 
                    <select name="updatingField" class="inputstyle">
                        <option value="firstName">firstName</option>
                        <option value="lastName">lastName</option>
                        <option value="dob">DOB (2005-05-07)</option>
                        <option value="Email">Email</option>
                        <option value="contact">Mobile No</option>
                        <option value="aadhar">Aadhar</option>
                        <option value="password">Password</option>
                        <option value="gender">Gender</option>
                        <option value="address">Address</option>
                    </select>
                <tr><input class="updateUserinput" name="updatingFieldValue" placeholder="Enter Selected Option Value" type="text"  /></tr>
                <br>
                <tr> <input type="submit" id="updatebtn" class="btn" name="modify" value="Update"></tr>
            </form><br><br>
        <?php
            // Check if the form was submitted
           
            if(array_key_exists('modify', $_POST))
            {
                // Get the selected value from the select tag
                $selectedReferenceOption = $_POST['selectedReferenceOption'];
                    $selectedReferenceOptionInput = $_POST['selectedReferenceOptionInput'];
                    $updatingField = $_POST['updatingField'];
                    $updatingFieldValue = $_POST['updatingFieldValue'];
                    if($updatingField == "password"){
                        $updatingFieldValue = password_hash($updatingFieldValue, PASSWORD_DEFAULT);
                    }

                if (!$conn)
                {
                      die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                
            else{  
            $sql = "Select * from `register`";
            $result = mysqli_query($conn, $sql);
            
            $num_rows = mysqli_num_rows($result);
            $f = false;
            if($num_rows>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row[$selectedReferenceOption]==$selectedReferenceOptionInput){
                        $sql1 =  "update `register` SET $updatingField = '$updatingFieldValue' where $selectedReferenceOption='$selectedReferenceOptionInput'";
                        mysqli_query($conn, $sql1);
                        echo '<div style="font-weight: bold; font-size: 18pt; color: green; background-color: lightgreen; text-align: center;">Successfully Updated</div>';
                    echo "<br>";
                    echo "<script>";
                    echo "var interval_name = setInterval(call_back, 1200);";
                    echo "function call_back() {";
                    echo "window.location.href = 'http://localhost:8012/gp1/admin/preCustomers.php'";
                    echo "clearInterval(interval_name)";
                    echo "}";
                    echo "</script>";
                    $f = true;
                    break;
                    }
                    else{
                        $f = false;
                    }
                }
            }
            
            
                if($f == false)
                {  
                    echo '<div style="font-weight: bold; font-size: 18pt; color: rgba(248,46,11); background-color: rgb(250, 151, 151); text-align: center;">OOPS!!! No Record Found...</div>';
                    echo "<br>";                
                }                      
            }
            
        }?>
         </table>
          </div>



        <!-- DELETE USER CODE -->
        <div class="recentCustomers" id="deleteUser">
            <div class="cardHeader">
                <h2>Delete User : </h2>
            </div>
           <table>
            <form action="/gp1/admin/preCustomers.php" method="POST">
                <tr><input class="forminput" name="username" placeholder="First Name" type="text"  /></tr>
                <br>
                <tr> <input type="submit" id="deletebtn"  name="delete" value="Delete"></tr>
            </form>
        <br><br>
        <?php    
        
         $conn = mysqli_connect($servername, $username, $password, $database);    
                if(array_key_exists('delete', $_POST))
                {
                $uname = $_POST['username'];            
                  if (!$conn)
                {
                      die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                else{  
                    $sql = "Select * from `register`";
                    $result = mysqli_query($conn, $sql);
                    
                    $num_rows = mysqli_num_rows($result);
                    $f = false;
                    if($num_rows>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row['username']==$uname){
                                mysqli_query($conn, "delete from `login` where username='$uname'");
                                $sql1 =  "delete from `register` where username='$uname'";
                                mysqli_query($conn, $sql1);
                                echo '<div style="font-weight: bold; font-size: 18pt; color: green; background-color: lightgreen; text-align: center;">USER Deleted SUCCESSFULLY</div>';
                            echo "<br>";
                            echo "<script>";
                            echo "var interval_name = setInterval(call_back, 1200);";
                            echo "function call_back() {";
                            echo "window.location.href = 'http://localhost:8012/gp1/admin/preCustomers.php'";
                            echo "clearInterval(interval_name)";
                            echo "}";
                            echo "</script>";
                            $f = true;
                            break;
                            }
                            else{
                                $f = false;
                            }
                        }
                    }
                   
                    
                      if($f == false)
                        {  
                            echo '<div style="font-weight: bold; font-size: 18pt; color: rgba(248,46,11); background-color: rgb(250, 151, 151); text-align: center;">OOPS!!! No Record Found...</div>';
                            echo "<br>";
                                                      
                        }                      
                    }
                }
            ?></table>
        <!-- PHPWORKS END -->
        </div>




         <!-- SHOWS CURRENT USERS FROM DATABASE -->
         <div class="recentCustomers" id="availableUser">
            <div class="cardHeader">
                <h2>Our Customers : </h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td style="width:100px;">UserName</td>
                        <td style="width:100px;">firstName</td>
                        <td style="width:100px;">lastName</td>
                        <td style="width:100px;">DOB</td>
                        <td style="width:150px;">Email</td>
                        <td style="width:100px;">Contact</td>
                        <td style="width:130px;">Aadhar</td>
                        <td style="width:100px;">Gender</td>
                        <td style="width:100px;">Address</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $database = "dbaman";
                     $conn1 = mysqli_connect($servername, $username, $password, $database);
                    if (!$conn1)
                    {
                        die("Sorry we failed to connect: ". mysqli_connect_error());
                    }
                    else
                    { 
                        $sql =  "SELECT * FROM `register`";
                        $result = mysqli_query($conn1, $sql);
                        $num_rows = mysqli_num_rows($result);
                        if($num_rows>0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                                {/*<td width='60px'><div class='imgBx'><img src='customer.png' alt=''></div></td>*/
                                    echo "<tr>";
                                    /* USERNAME */
                                    echo "<td>";
                                    echo $row['username'];
                                    echo "</td>";

                                    /*
                                    // Hash-Password
                                    echo "<td>";
                                    echo $row['password'];
                                    echo "</td>";

                                    // PASSWORD
                                    echo "<td>";
                                    //echo $row['password'];
                                    //echo base64_decode($row['password']);
                                    echo "</td>";
                                    */

                                    /* FirstName */
                                    echo "<td>";
                                    echo $row['firstName'];
                                    echo "</td>";
                                    /* LastName */
                                    echo "<td>";
                                    echo $row['lastName'];
                                    echo "</td>";
                                    /* DOB */
                                    echo "<td>";
                                    echo $row['dob'];
                                    echo "</td>";
                                    /* Email */
                                    echo "<td>";
                                    echo $row['Email'];
                                    echo "</td>";
                                    /* Contact */
                                    echo "<td>";
                                    echo $row['contact'];
                                    echo "</td>";
                                    /* Aadhar */
                                    echo "<td>";
                                    echo $row['aadhar'];
                                    echo "</td>";
                                    /* Gender */
                                    echo "<td>";
                                    echo $row['gender'];
                                    echo "</td>";
                                    /* Address */
                                    echo "<td>";
                                    echo $row['address'];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                        }
                    }
                    ?>
                    </tbody>
                </table>
        </div>
            <!-- Code End-->

    </div>
</div>
</body>

</html>