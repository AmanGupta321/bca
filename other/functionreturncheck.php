<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/usereq.css?<?php echo time(); ?>">
</head>

<body>

    <?php
    $price = 0;
    if(array_key_exists('submit', $_POST)){
        onsubmit1();
    }

    elseif(array_key_exists('addtocart', $_POST)){
        addcart();
    }

    elseif(array_key_exists('ckamount', $_POST)){
        $d = $_POST['dessert'];
        $q = $_POST['quant'];
        pricecheck($d, $q);
    }
    
    function onsubmit1(){
        echo '<script type="text/javascript">
        window.location.href = "./feedback.php"; </script>';      
    }
    function addcart(){
        $ds = $_POST['dessert'];
        $qty = $_POST['quant'];
        pricecheck($ds, $qty);

        $userselecteditem = "usi.txt";
        $textdes = PHP_EOL.$ds;
        file_put_contents($userselecteditem, $textdes, FILE_APPEND);

        $userselectedquat = "usq.txt";
        $textqt = PHP_EOL.$qty;
        file_put_contents($userselectedquat, $textqt, FILE_APPEND);
        echo '<script>alert("Added to Cart Successfully...")</script>';

        $userselecteditemprice = "price_data.txt";
        $textp = PHP_EOL.$price;
        file_put_contents($userselecteditemprice, $textdesp, FILE_APPEND);
    }

      function pricecheck($des, $quantity){
        global $price;
        if($des == 'ck1' || $des == 'ck7' || $des == 'ck8')
        {
            $price = 600*$quantity;
        }
        elseif($des == 'ck2' || $des == 'ck3' || $des == 'ck6')
        {
            $price = 500*$quantity;
        }
        elseif($des == 'ck4' || $des == 'ck5')
        {
            $price = 450*$quantity;
        }
        elseif($des == 'b1')
        {
            $price = 35*$quantity;
        }
        elseif($des == 'b2')
        {
            $price = 30*$quantity;
        }
        elseif($des == 'b3')
        {
            $price = 45*$quantity;
        }
        elseif($des == 'b4')
        {
            $price = 60*$quantity;
        }
        elseif($des == 'p1')
        {
            $price = 50*$quantity;
        }
        elseif($des == 'p2')
        {
            $price = 40*$quantity;
        }
        elseif($des == 'p3' && $des == 'c4')
        {
            $price = 80*$quantity;
        }
        elseif($des == 'c1')
        {
            $price = 100*$quantity;
        }
        elseif($des == 'c2')
        {
            $price = 180*$quantity;
        }
        elseif($des == 'c3')
        {
            $price = 240*$quantity;
        }
        else
        {
            $text = "Nothing Selected";
        }
    
    return $des;
    }
    ?>


    <form method="post">
                    <select name="dessert">
                        <option value="ck1">Red Velvet</option>
                        <option value="ck2">White Forest</option>
                        <option value="ck3">Black Forest</option>
                        <option value="ck4">Chocolate Truffle</option>
                        <option value="ck5">ButterScotch</option>
                        <option value="ck6">Vanilla</option>
                        <option value="ck7">Strawberry</option>
                        <option value="ck8">Mousse White</option>
                        <option value="p1">Apple Pie</option>
                        <option value="p2">Chocolate Pastry</option>
                        <option value="p3">Dark Chocolate Mousse</option>
                        <option value="c1">Butter Cookie</option>
                        <option value="c2">Macaroons</option>
                        <option value="c3">Peanut Butter Cookie</option>
                        <option value="c4">Chocolate Chip Cookie</option>
                        <option value="b1">Wheat Bread</option>
                        <option value="b2">White Bread</option>
                        <option value="b3">Whole Grain Bread</option>
                        <option value="b4">Donut Bread</option>
                    </select>


                    <select name="quant">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                            <?php echo $price ?>
       
            <input type="submit" value="Submit" name="submit">
       </form>

</html>