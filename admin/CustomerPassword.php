<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Customer Password</title>
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
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Change Customer Password</h2>
            </div>
            <table>
                <form action="/gp1/admin/CustomerPassword.php" method="POST">
                    <br><br>
                    Reference : 
                    <tr><select class="inputstyle" name="selectedReferenceOption">
                        <option value="username">Username</option>
                        <option value="aadhar">aadhar</option>
                        <option value="Email" type="email">Email</option>
                    </select></tr>
                    <tr><input class="inputstyle" name="selectedReferenceOptionInput" placeholder="Enter Selected Option Value" type="text"  /></tr>
                    <br>
                    <br>
                    <hr><br><br>
                    <tr>Enter Current Password : <input class="inputstyle" name="currentPassword" placeholder="Enter Current Password" type="password"  /></tr>
                    <br>
                    <tr>Enter New Password : <input class="inputstyle" name="newPassword" placeholder="Enter New Password" type="password"  /></tr>
                    <br>
                    <tr> <input type="submit" class="btn" id="btn1" name="updatePassword" value="Update Password"></tr>
                </form><br><br>

                <?php
                // Check if the form was submitted
                if(array_key_exists('updatePassword', $_POST))
                {
                    // Get the selected value from the select tag
                    $selectedReferenceOption = $_POST['selectedReferenceOption'];
                    $selectedReferenceOptionInput = $_POST['selectedReferenceOptionInput'];
                    $newPassword = $_POST['newPassword'];
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $currentPassword = $_POST['currentPassword'];
    
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
                        if($row[$selectedReferenceOption]==$selectedReferenceOptionInput && password_verify($currentPassword, $row['password'])){
                            $sql1 =  "update `register` SET password= '$newPassword' where username='$selectedReferenceOptionInput' and password='$currentPassword'";
                            mysqli_query($conn, $sql1);
                            echo '<div style="font-weight: bold; font-size: 18pt; color: green; background-color: lightgreen; text-align: center;">Password Updated SUCCESSFULLY</div>';
                        echo "<br>";
            
    
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
?>
            </table>
        </div>
    </div>
</div>
</body>
</html>