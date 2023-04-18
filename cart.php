<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY CART</title>
    <link rel="stylesheet" href="./css/mycart.css" />
</head>

<body>
    <nav>
        <!-- vh -80 -->
        <div class="logo">
            <h1> G O L D E N<br>B A K E R Y</h1>
        </div>
        <div class="menu">
            <a href="./index.php">H o m e</a>
            <a href="./catalogue_user.html">C a t a l o g u e</a>
            <a href="./about.html">A b o u t</a>
            <a href="./contact.html">C o n t a c t</a>
            <a id=logout href="./thankyou.php">L o g o u t</a>
        </div>
    </nav>
    <hr>


    <div id="box">
        <p><u>MY C</u>ART</p>
        <br>
        <?php
    if(array_key_exists('clr', $_POST)){
        clear();
    }
    elseif(array_key_exists('submit', $_POST)){
        $finalpricetxtfile = fopen('finalprice.txt', "r");
        $finalprice = fgets($finalpricetxtfile);
        if ($finalprice == 0){
            echo '<script>alert("Cart is Empty")</script>';
        }
        else{
            echo '<script type="text/javascript">
                window.location.href = "./payment.php"; </script>';      
        }
        fclose($finalpricetxtfile);
    }
    elseif(array_key_exists('catalogue', $_POST)){
        echo '<script type="text/javascript">
            window.location.href = "./catalogue_user.html"; </script>';      
    }
    elseif(array_key_exists('addmore', $_POST)){
        echo '<script type="text/javascript">
            window.location.href = "./userrequest.php"; </script>';      
    }
    function clear(){
        $usertextfile1 = fopen("usi.txt", "r+");
        $usertextfile2 = fopen("usq.txt", "r+");
        $usertextfile3 = fopen("price_data.txt", "r+");
        $usertextfile4 = fopen("finalprice.txt", "r+");
        ftruncate($usertextfile1, 0);
        ftruncate($usertextfile2, 0);
        ftruncate($usertextfile3, 0);
        ftruncate($usertextfile4, 0);
        fclose($usertextfile1);
        fclose($usertextfile2);
        fclose($usertextfile3);
        fclose($usertextfile4);
    }
    
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

            echo "<table>";
            while($row1 = mysqli_fetch_assoc($result1))
        {
            echo "<tr>"."<td colspan=4 id=upper>"."Name : ".$row1['firstName']." ".$row1['lastName']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."DOB : ".$row1['dob']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."Contact : ".$row1['contact']."</td>"."</tr>";
            echo "<tr>"."<td colspan=4>"."Email : ".$row1['email']."</td>"."</tr>";
        }
            echo "<tr class=underline>";
            echo "<th>"."Item"."</th>";
            echo "<th>"."Price"."</th>";
            echo "<th>"."Quantity"."</th>";
            echo "<th>"."Total"."</th>";
            echo "</tr>";
            
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


$alldessert = array("ck1" => "Red Velvet", "ck2" => "White Forest", "ck3" => "Black Forest", "ck4" => "Chocolate Truffle", "ck5" => "ButterScotch", "ck6" => "Vanilla", "ck7" => "Strawberry", "ck8" => "Mousse White", "p1" => "Apple Pie", "p2" => "Chocolate Pastry", "p3" => "Dark Chocolate Mousse", "c1" => "Butter Cookie", "c2" => "Macaroons", "c3" => "Peanut Butter Cookie", "c4" => "Chocolate Chip Cookie", "b1" => "Wheat Bread", "b2" => "White Bread", "b3" => "Whole Grain Bread", "b4" => "Donut Bread");

$alldessertprice = array("Red Velvet" => "600", "White Forest" => "500", "Black Forest" => "500", "Chocolate Truffle" => "450", "ButterScotch" => "450", "Vanilla" => "350", "Strawberry" => "600", "Mousse White" => "600", "Apple Pie" => "50", "Chocolate Pastry" => "40", "Dark Chocolate Mousse" => "80", "Butter Cookie" => "100", "Macaroons" => "180", "Peanut Butter Cookie" => "240", "Chocolate Chip Cookie" => "80", "Wheat Bread" => "35", "White Bread" => "30", "Whole Grain Bread" => "45", "Donut Bread" => "60");


// Final Sorted Array
    $topayfinalamt = 0;
    foreach ($cart as $key => $value) {
        foreach($alldessert as $k1 => $v){
            if(trim($key) == (trim($k1))){
                $producttotalprice = $value * $alldessertprice[$v];
                $topayfinalamt += $producttotalprice;
                echo "<tr>";
                echo "<td>".$v."</td>";
                echo "<td>"."₹".$alldessertprice[$v]."</td>";
                echo "<td>".$value."</td>";
                echo "<td>"."₹".$producttotalprice."</td>";
                echo"</tr>";
            }
        }
    }
    $filefinalprice = fopen("finalprice.txt", "w");
    fwrite($filefinalprice, $topayfinalamt);
    fclose($filefinalprice);              
        }
       
        $pricedata = fopen("finalprice.txt", "r") or die ("Unable to open file!");
        $r = fgets($pricedata);
        if(!$r){
            echo "<tr class=underline><td colspan=4><b>Your Cart is Empty";
        }
        else{
            echo "<tr class=underline><td colspan=4><b>Total Price : ₹ ";
            echo $r;
            echo '</b></td></tr>';
            fclose($pricedata);
        }

        /*$alldessert = array("ck1" => "Red Velvet", "ck2" => "White Forest", "ck3" => "Black Forest", "ck4" => "Chocolate Truffle", "ck5" => "ButterScotch", "ck6" => "Vanilla", "ck7" => "Strawberry", "ck8" => "Mousse White", "p1" => "Apple Pie", "p2" => "Chocolate Pastry", "p3" => "Dark Chocolate Mousse", "c1" => "Butter Cookie", "c2" => "Macaroons", "c3" => "Peanut Butter Cookie", "c4" => "Chocolate Chip Cookie", "b1" => "Wheat Bread", "b2" => "White Bread", "b3" => "Whole Grain Bread", "b4" => "Donut Bread");*/
        ?>
        <form method="post">
            <tr>
                <td colspan=2><input type="submit" id="btn1" value="Proceed To Checkout" name="submit"></td>
                <td colspan=2><input type="submit" id="btn2" value="Add More" name="addmore"></td>
            </tr>
            <tr>
                <td colspan=2><input type="submit" id="btn3" value="View Catalogue" name="catalogue"></td>
                <td colspan=2><input type="submit" id="btn4" value="Clear Cart" name="clr"></td>
            </tr>

            </table>
        </form>
    </div>

</body>

</html>