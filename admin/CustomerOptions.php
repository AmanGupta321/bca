 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
    <style>
        .recentCustomers{
        width: 20vw;}
       
    </style>
 </head>
 <body>
    <?php
        require("adminnavigationforpre.html");
    ?>
 <div class="main" id="main">
    <div class="details">
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Select a Option:</h2>
            </div>
               
                            <input type="submit" class="btn" id="btn1" value="Add User" onclick="window.location.href = './Customers.php';">
                       
                            <input type="submit" class="btn" id="btn2" value="Modify Existing User" onclick="window.location.href = './preCustomers.php';">
                        
        </div>
    </div>
</div>
 </body>
 </html>