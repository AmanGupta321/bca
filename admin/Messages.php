<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MESSAGES</title>
</head>
<body>
    <?php
        require("adminnavigationforpre.html");
    ?>
<div class="main">
    <div class="details">
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Messages : </h2><br>
            </div>
            <table>
            <thead>
                    <tr>
                        <td>User</td>
                        <td>FullName</td>
                        <td>Email</td>
                        <td>Message</td>
                    </tr>
                </thead>
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
              else{  
                  $sql = "Select * from `feedback`";
                  $result = mysqli_query($conn, $sql);
                  
                  $num_rows = mysqli_num_rows($result);
                  
                  if($num_rows>0){
                      while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td><div class='imgBx'><img src='customer.png' alt='img1'></div></td>";
                echo "<td><h4>";
                echo $row['fullname'];
                echo "<br><span>India</span></h4></td>";
                echo "<td>";
                echo $row['email'];
                echo "</td>";
                echo "<td>";
                echo $row['msg'];
                echo "</td>";
                echo "</tr>";
                      }}}
               ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>