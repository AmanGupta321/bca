<?php              
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
    // GOT THE FINAL TOTAL QTY
    $totalquantity +=$value;
    $totalproduct++;
}
// GOT THE FINAL TOTAL QTY : $totalquantity
//print_r($totalproduct);

$alldessert = array("ck1" => "Red Velvet", "ck2" => "White Forest", "ck3" => "Black Forest", "ck4" => "Chocolate Truffle", "ck5" => "ButterScotch", "ck6" => "Vanilla", "ck7" => "Strawberry", "ck8" => "Mousse White", "p1" => "Apple Pie", "p2" => "Chocolate Pastry", "p3" => "Dark Chocolate Mousse", "c1" => "Butter Cookie", "c2" => "Macaroons", "c3" => "Peanut Butter Cookie", "c4" => "Chocolate Chip Cookie", "b1" => "Wheat Bread", "b2" => "White Bread", "b3" => "Whole Grain Bread", "b4" => "Donut Bread");

$alldessertprice = array("Red Velvet" => "600", "White Forest" => "500", "Black Forest" => "500", "Chocolate Truffle" => "450", "ButterScotch" => "450", "Vanilla" => "350", "Strawberry" => "600", "Mousse White" => "600", "Apple Pie" => "50", "Chocolate Pastry" => "40", "Dark Chocolate Mousse" => "80", "Butter Cookie" => "100", "Macaroons" => "180", "Peanut Butter Cookie" => "240", "Chocolate Chip Cookie" => "80", "Wheat Bread" => "35", "White Bread" => "30", "Whole Grain Bread" => "45", "Donut Bread" => "60");
                
    $topayfinalamt = 0;
    $z = 0;
    $combineallname = array();
    foreach ($cart as $key => $value) {
        foreach($alldessert as $k1 => $productname){
            if(trim($key) == (trim($k1))){
                $producttotalprice = $value * $alldessertprice[$productname];
                $topayfinalamt += $producttotalprice;
                $combineallname[$z] = $productname.$value;
                $z++;
            }
        }
    }
    // GOT FINAL AMOUNT : $topayfinalamt
    $userselectedproducts = '';
    for($y=0; $y<$z; $y++){    
        if($y == $z-1){
            $userselectedproducts .= $combineallname[$y]."'";
        }
        else{
            $userselectedproducts .= $combineallname[$y].", ";
        }
    }
    if ($z>=1){
        $userselectedproducts = "'".$userselectedproducts; 
    }
    // GOT $userselectedproducts
    
    //CODE ENDS            
?>