<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <?php
        require("adminnavigation.html");
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
           $executeQuery = mysqli_query($conn1, $sql);
           $rows = mysqli_num_rows($executeQuery);
           $peopleCount = 0;
           $htmlappendtext_recentcustomer = "";
           if($rows>0)
           {
               while($rows = mysqli_fetch_assoc($executeQuery))
                   {
                        $peopleCount++;
                        $htmlappendtext_recentcustomer .= "<tr><td width='60px'><div class='imgBx'><img src='customer.png' alt='image'></div></td><td><h4>".$rows['username']."<br><span>".$rows['address']."</span></h4></td></tr>";

                   }
           }
           $sql =  "SELECT * FROM `payments`";
           $executeQuery = mysqli_query($conn1, $sql);
           $rows = mysqli_num_rows($executeQuery);
           $salesCount = 0;
           if($rows>0)
           {
               while($rows = mysqli_fetch_assoc($executeQuery))
                   {
                    if($rows['Payment'] == "paid"){
                        $salesCount++;
                    }
                   }
           }
           $sql =  "SELECT * FROM `feedback`";
           $executeQuery = mysqli_query($conn1, $sql);
           $rows = mysqli_num_rows($executeQuery);
           $feedbackCount = 0;
           if($rows>0)
           {
               while($rows = mysqli_fetch_assoc($executeQuery))
                   {
                        $feedbackCount++;
                   }
           }
           $sql =  "select total_price from orders, payments where orders.orderid = payments.orderid and payments.payment = 'paid';";
           $executeQuery = mysqli_query($conn1, $sql);
           $rows = mysqli_num_rows($executeQuery);
           $totalEarning = 0;
           if($rows>0)
           {
               while($rows = mysqli_fetch_assoc($executeQuery))
                   {
                        $totalEarning += $rows['total_price'];
                   }
           }
           $sql =  "select total_items, total_price, payment, status from orders, payments where orders.orderid = payments.orderid;";
           $executeQuery = mysqli_query($conn1, $sql);
           $rows = mysqli_num_rows($executeQuery);
           $htmlappendtext_payment = "";
           if($rows>0)
           {
               while($rows = mysqli_fetch_assoc($executeQuery))
                   {
                       $htmlappendtext_payment .= "<tr><td>".$rows['total_items']."</td><td> ₹ ".$rows['total_price']."</td><td>".$rows['payment']."</td><td><span class='status ".strtolower($rows['status'])."'>".$rows['status']."</span></td></tr>";
                   }
           }


       }
    ?>
  <div class="main">
      

        <!-- cards -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers"><?php echo $peopleCount ?></div>
                    <div class="cardName">Customer</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="people-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?php echo $salesCount ?></div>
                    <div class="cardName">Sales</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?php echo $feedbackCount ?></div>
                    <div class="cardName">Comments</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">₹ <?php echo $totalEarning ?></div>
                    <div class="cardName">Earnings</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>

        <div class="details">
            <!-- order details list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $htmlappendtext_payment ?>
                    </tbody>
                </table>
            </div>

            <!-- New Customers -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>
                <table>
                    <?php echo $htmlappendtext_recentcustomer ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>