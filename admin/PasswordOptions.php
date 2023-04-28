<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE PASSWORD</title>
    <style>
        .recentCustomers{
        width: 20vw;
            
    }
    #btn3{
    background-color: rgb(63, 115, 237);
}
#btn4{
    background-color: rgb(191, 54, 228);
}
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
                <h2>Change Password</h2>
                <br><br>
                <h4>Select a Option:</h4>
            </div>
               
                            <input type="submit" class="btn" id="btn3" value="Admin" onclick="window.location.href = './AdminPassword.php';">
                       
                            <input type="submit" class="btn" id="btn4" value="Customers" onclick="window.location.href = './CustomerPassword.php';">
                        
        </div>
    </div>
</div>
 </body>
 </html>