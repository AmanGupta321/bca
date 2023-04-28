<?php
//Opening user selected item file
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
    $count = 0;
}
foreach ($cart as $key => $value) {
    $totalquantity += $value;
}

echo "<br>";
echo "<br>";
echo $totalquantity;
echo "<br>";
echo "<br>";
print_r ($cart);
$alldessert = array("ck1" => "Red Velvet", "ck2" => "White Forest", "ck3" => "Black Forest", "ck4" => "Chocolate Truffle", "ck5" => "ButterScotch", "ck6" => "Vanilla", "ck7" => "Strawberry", "ck8" => "Mousse White", "p1" => "Apple Pie", "p2" => "Chocolate Pastry", "p3" => "Dark Chocolate Mousse", "c1" => "Butter Cookie", "c2" => "Macaroons", "c3" => "Peanut Butter Cookie", "c4" => "Chocolate Chip Cookie", "b1" => "Wheat Bread", "b2" => "White Bread", "b3" => "Whole Grain Bread", "b4" => "Donut Bread");

$alldessertprice = array("Red Velvet" => "600", "White Forest" => "500", "Black Forest" => "500", "Chocolate Truffle" => "450", "ButterScotch" => "450", "Vanilla" => "350", "Strawberry" => "600", "Mousse White" => "600", "Apple Pie" => "50", "Chocolate Pastry" => "40", "Dark Chocolate Mousse" => "80", "Butter Cookie" => "100", "Macaroons" => "180", "Peanut Butter Cookie" => "240", "Chocolate Chip Cookie" => "80", "Wheat Bread" => "35", "White Bread" => "30", "Whole Grain Bread" => "45", "Donut Bread" => "60");


// Final Sorted Array
$topayfinalamt = 0;
$z = 0;
$combineallname = array();
foreach ($cart as $key => $value) {
    foreach($alldessert as $k1 => $productname){
        if(trim($key) == (trim($k1))){
            $producttotalprice = $value * $alldessertprice[$productname];
            $topayfinalamt += $producttotalprice;
            echo $productname." -> ".$value." -> ".$alldessertprice[$productname]*$value;   
            echo "<br>";
            $combineallname[$z] = $productname.$value;
            $z++;       
        }
    }
}
$userselectedproducts = '';
echo($z);
for($y=0; $y<$z; $y++){   
    if($y == $z-1){
        $userselectedproducts = $userselectedproducts.$combineallname[$y]."'";
    }
    else{
        $userselectedproducts = $userselectedproducts.$combineallname[$y].", ";
    }
}
echo "<br> uuu";
echo $userselectedproducts;

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
else
    /*code start for check*/
    { 
        $sql =  "SELECT * FROM `productname`";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        $f = false;
        $za = 0;
        if($num_rows>0)
      {
            while($row = mysqli_fetch_assoc($result)){
                echo "<br>";
                if ($row['Username'] == $currentusername){
                    echo "hogya";
                }
            }
            

              
              
            }   
      
  }



if($result){
    echo '<div style="font-weight: bold; color: green; background-color: lightgreen; font-size: 10pt;">Success! Your entry has been submitted successfully!<br>PROCEED TO --></div><a href="./login.php" style="font-weight: bold; color: green; font-size: 15pt;">LOGIN</a>';
}
else{
    echo '<div style="font-weight: bold; color: red; font-size: 15pt;">Error! We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!</div>';
}

fclose($usernametxtfile);
?>  