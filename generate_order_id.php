<?php
    function generateRandomNumber($min, $max, $exclude) {
        $num = rand($min, $max);
        while (in_array($num, $exclude)) {
            $num = rand($min, $max);
        }
        return $num;
    }
    $excludedNumbers = array();     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbaman";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
    $sql1 =  "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql1);
        $num_rows = mysqli_num_rows($result);
        $f = true;
        if($num_rows>0)
      {
            while($row = mysqli_fetch_assoc($result))
          {
               $excludedNumbers[] = $row['OrderID'];
          }
      }
    }
    $generatedOrderID = generateRandomNumber(1, 1000, $excludedNumbers);
    $orderIDdata = fopen("order_id.txt", "w");
    fwrite($orderIDdata, $generatedOrderID);
    fclose($orderIDdata);
?>