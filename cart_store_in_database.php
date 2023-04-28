<?php



//echo $randomNumber;


    require("user_selected_cart_values.php");
    require("generate_order_id.php");
    $file = fopen("login_data.txt", "r");
     $currentusername = fgets($file);
    
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "dbaman";
     $conn = mysqli_connect($servername, $username, $password, $database);
     
     if (!$conn){
         die("Sorry we failed to connect: ". mysqli_connect_error());
     }
     else{ 
         $sqlorderdatainsert =  "INSERT INTO `orders` (`UserName`, `OrderID`, `Total_Items`, `Total_Qty`, `Total_Price`) VALUES ('$currentusername', $generatedOrderID, $userselectedproducts, $totalquantity, $topayfinalamt);";
         mysqli_query($conn, $sqlorderdatainsert);
     }
?>