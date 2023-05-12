<?php
    $orderdata = fopen("order_id.txt", "r");
    $orderID = fgets($orderdata);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbaman";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
        $checkorderquery =  "select OrderID from payments where OrderID = $orderID";
        $executeQuery = mysqli_query($conn, $checkorderquery);
        $rows = mysqli_num_rows($executeQuery);
        if($rows>0)
        {
            echo '<script>alert("Invalid Submit\nData Already Submitted for this record\nTry Logging Again.")</script>';
        }
        else{
        $sqlorderdatainsert =  "INSERT INTO `payments` (`OrderID`, `Payment`, `Status`) VALUES ($orderID, 'paid', 'delivered');";
        mysqli_query($conn, $sqlorderdatainsert);
        header("Location: http://localhost:8012/gp1/orderplaced.php");
        exit;
        }
    }
?>