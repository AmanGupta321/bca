<?php
    $file = fopen("order_id.txt", "r");
    $orderID = fgets($file);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbaman";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
        $sqlorderdatainsert =  "INSERT INTO `payments` (`OrderID`, `Payment`, `Status`) VALUES ($orderID, 'Not Initiated', 'pending');";
        mysqli_query($conn, $sqlorderdatainsert);
        header("Location: http://localhost:8012/gp1/orderfailed.php");
        exit;
    }
?>