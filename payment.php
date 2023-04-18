<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT</title>
    <link rel="stylesheet" href="./css/payment.css"/>
</head>

<body>
<table>
        <tr>
            <td colspan="2">
                <h1>Order Placed Successfully...</h1>
            </td>
        </tr>
        <?php
        
            $myfile = fopen("login_data.txt", "r") or die ("Unable to open file!");
            $uname = fgets($myfile);
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
    
                $sql1 = "SELECT * FROM `register` WHERE username = '$uname'";        
                $result1 = mysqli_query($conn, $sql1);
    
                
                while($row1 = mysqli_fetch_assoc($result1))
            {
                echo "<tr>"."<td colspan=2 id=upper>"."Name : ".$row1['firstName']." ".$row1['lastName']."</td>"."</tr>";
                echo "<tr>"."<td colspan=2>"."Contact : ".$row1['contact']."</td>"."</tr>";
            }
                
                
                //CODE STARTS 
                $pricedata = fopen("usi.txt", "r") or die ("Unable to open file!");
$ch = 0;
$arr = array();

//Forming array of data
while (!feof($pricedata)){
    $var = fgets($pricedata);
    $arr[$ch] = $var;
    $ch++; 
}
unset($arr[0]);
arsort($arr);
$newarr = array_values($arr);

/* Array For Product and is Quantity*/
$cart = array();
$count = 0  ;
$totalquantity = 0;
$arraylength = 0;
for ($i=0; $i<$ch-1 ; $i++) { 
    for ($j=0; $j<$ch-1 ; $j++) { 
        if(trim($newarr[$i]) == (trim($newarr[$j]))) {
            $count++;
        }
    }	
    $cart[trim($newarr[$i])] = $count;
    $arraylength++;
    $count = 0;
}
$totalproduct = 1;
foreach ($cart as $key => $value) {
    $totalquantity +=$value;
    $totalproduct++;
}

$alldessert = array("ck1" => "Red Velvet", "ck2" => "White Forest", "ck3" => "Black Forest", "ck4" => "Chocolate Truffle", "ck5" => "ButterScotch", "ck6" => "Vanilla", "ck7" => "Strawberry", "ck8" => "Mousse White", "p1" => "Apple Pie", "p2" => "Chocolate Pastry", "p3" => "Dark Chocolate Mousse", "c1" => "Butter Cookie", "c2" => "Macaroons", "c3" => "Peanut Butter Cookie", "c4" => "Chocolate Chip Cookie", "b1" => "Wheat Bread", "b2" => "White Bread", "b3" => "Whole Grain Bread", "b4" => "Donut Bread");

$alldessertprice = array("Red Velvet" => "600", "White Forest" => "500", "Black Forest" => "500", "Chocolate Truffle" => "450", "ButterScotch" => "450", "Vanilla" => "350", "Strawberry" => "600", "Mousse White" => "600", "Apple Pie" => "50", "Chocolate Pastry" => "40", "Dark Chocolate Mousse" => "80", "Butter Cookie" => "100", "Macaroons" => "180", "Peanut Butter Cookie" => "240", "Chocolate Chip Cookie" => "80", "Wheat Bread" => "35", "White Bread" => "30", "Whole Grain Bread" => "45", "Donut Bread" => "60");
                
    // Final Sorted Array
echo "<tr class='underline'>";
                echo "<th rowspan=".$totalproduct.">"."Item"."</th>";
                echo "</tr>";
    $topayfinalamt = 0;
    $z = 0;
    $combineallname = array();
    foreach ($cart as $key => $value) {
        foreach($alldessert as $k1 => $productname){
            if(trim($key) == (trim($k1))){
                $producttotalprice = $value * $alldessertprice[$productname];
                $topayfinalamt += $producttotalprice;
                echo "<tr class='underline'>";
                echo "<td>".$productname."</th>";
                echo "</tr>";
                $combineallname[$z] = $productname.$value;
                $z++;
            }
        }
    }
    $userselectedproducts = '';
    for($y=0; $y<$z; $y++){    
        if($y == $z-1){
            $userselectedproducts = $userselectedproducts.$combineallname[$y]."'";
        }
        else{
            $userselectedproducts = $userselectedproducts.$combineallname[$y].", ";
        }
    }
    if ($z>=1){
        $userselectedproducts = "'".$userselectedproducts; 
    }
    //echo $userselectedproducts;
    //CODE ENDS            

                echo "<tr class='underline'>";
                echo "<th>"."Total Amount"."</th>";
                $finalpricetxtfile = fopen("finalprice.txt", "r");
                $amount = fgets($finalpricetxtfile);
                echo "<td> ₹ ".$amount."</td>";
                fclose($finalpricetxtfile);
                echo"</tr>";

                echo "<tr class='underline'>";
                echo "<th>"."Mode of Payment"."</th>";
                echo "<td>"."Cash on Delivery"."</td>";
                echo "</tr>";
                
                echo "<tr class='underline'>";
                echo "<th>"."Quantity"."</th>";
                echo "<td>".$totalquantity."</td>";
                echo "</tr>";

            }
            ?>
            <tr>
                <td><br></td>
            </tr>
            <?php
            echo "<tr><td colspan=4><b>You will receive a Confirmation Order and the estimated date of delivery. </b></td></tr>";
            ?>
        </div>
    

    </table>
    <?php 
if($arraylength > 12){
    $height = 160;
}
else{
    $height = 100;
}
echo "<div id='border'";
echo "style='height: ";
echo $height;
echo "vh'";
echo "></div>";
?>

<br><br>
    <p>Do suggest us at <a href="./feedback.php">feedback </a>form. <br> We care our Valuable Clients.</p>
</body>
<?php
    $usernametxtfile = fopen("login_data.txt", "r");
    $currentusername = fgets($usernametxtfile);
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbaman";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
        $sqlorderdatainsert =  "INSERT INTO `orderdata` (`Username`, `All Product`, `Total Quantity`, `Total Amount`) VALUES ('$currentusername', $userselectedproducts, $totalquantity, $topayfinalamt);";
        mysqli_query($conn, $sqlorderdatainsert);
    $sql1 =  "SELECT * FROM `payment`";
        $result = mysqli_query($conn, $sql1);
        $num_rows = mysqli_num_rows($result);
        $f = true;
        if($num_rows>0)
      {
            while($row = mysqli_fetch_assoc($result))
          {
              if ($row['Username'] == $currentusername)
              {
                $querytodeleterow =  "DELETE FROM `payment` where `Username` = '$currentusername';";
                mysqli_query($conn, $querytodeleterow);
                $sqlupdatequery =  "INSERT INTO `payment` (`Username`, `All Product`, `Total Quantity`, `Total Amount`) VALUES ('$currentusername', $userselectedproducts, $totalquantity, $topayfinalamt);";
                mysqli_query($conn, $sqlupdatequery);
                /*Clearing txt file*/
    $usertextfile1 = fopen("usi.txt", "r+");
    $usertextfile3 = fopen("price_data.txt", "r+");
    $usertextfile4 = fopen("finalprice.txt", "r+");
    ftruncate($usertextfile1, 0);
    ftruncate($usertextfile3, 0);
    ftruncate($usertextfile4, 0);
    fclose($usertextfile1);
    fclose($usertextfile3);
    fclose($usertextfile4);
                
                $f = false;
                }
            }
      
  }
 if($f){
    $sqlupdatequery =  "INSERT INTO `payment` (`Username`, `All Product`, `Total Quantity`, `Total Amount`) VALUES ('$currentusername', $userselectedproducts, $totalquantity, $topayfinalamt);";
                mysqli_query($conn, $sqlupdatequery);
                /*Clearing txt file*/
    $usertextfile1 = fopen("usi.txt", "r+");
    $usertextfile3 = fopen("price_data.txt", "r+");
    $usertextfile4 = fopen("finalprice.txt", "r+");
    ftruncate($usertextfile1, 0);
    ftruncate($usertextfile3, 0);
    ftruncate($usertextfile4, 0);
    fclose($usertextfile1);
    fclose($usertextfile3);
    fclose($usertextfile4);
 }
    /*Clearing txt file*/
    if(!$result){
        echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!</div>';
    }
    }
    
    fclose($usernametxtfile);
?>
<?php
    
    ?>
</html>