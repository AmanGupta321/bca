<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="./css/usere.css?<?php echo time(); ?>">
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
            <a href="./contact.html">C o n t a c t</a>
            <a href="./forgotpwd.php">C h a n g e&nbsp;&nbsp; P a s s w o r d</a>
            <a id=logout href="./thankyou.php">L o g o u t</a>
        </div>
    </nav><br>


    <?php

    $price = 0;
    $submit_msg = '';
    // FILE OPERATION TO GET DATA
    $myfile = fopen("login_data.txt", "r") or die ("Unable to open file!");
    $r = fgets($myfile);
    if(!$r){
        echo "Backend error";
    }
    else{
        echo '<hr><hr>';
        echo '<h1 id=h1>Thank You!!! &nbsp;';
        echo '<u>';
        echo $r;
        echo '</u> &nbsp;For Joining us.</h1>';
        fclose($myfile);
    }
    
    if(array_key_exists('submit', $_POST)){
        onsubmit1();
    }

    elseif(array_key_exists('addtocart', $_POST)){
        addcart();
    }
    
    function onsubmit1(){
        echo '<script type="text/javascript">
        window.location.href = "./cart.php"; </script>';      
    }
    function addcart(){
        global $price;
        $dessertget = $_POST['dessert'];
        pricecheck($dessertget);

        $userselecteditem = "usi.txt";
        $textdes = PHP_EOL.$dessertget;
        file_put_contents($userselecteditem, $textdes, FILE_APPEND);

        $price_d = "price_data.txt";
        $textprice = PHP_EOL.$price;
        file_put_contents($price_d, $textprice, FILE_APPEND);
        
        global $submit_msg;
        $submit_msg = "Added to Cart Successfully...";
    }

      function pricecheck($des){
        global $price;
        if($des == 'ck1' || $des == 'ck7' || $des == 'ck8')
        {
            $price = 600;
        }
        elseif($des == 'ck2' || $des == 'ck3' || $des == 'ck6')
        {
            $price = 500;
        }
        elseif($des == 'ck4' || $des == 'ck5')
        {
            $price = 450;
        }
        elseif($des == 'b1')
        {
            $price = 35;
        }
        elseif($des == 'b2')
        {
            $price = 30;
        }
        elseif($des == 'b3')
        {
            $price = 45;
        }
        elseif($des == 'b4')
        {
            $price = 60;
        }
        elseif($des == 'p1')
        {
            $price = 50;
        }
        elseif($des == 'p2')
        {
            $price = 40;
        }
        elseif($des == 'p3' || $des == 'c4')
        {
            $price = 80;
        }
        elseif($des == 'c1')
        {
            $price = 100;
        }
        elseif($des == 'c2')
        {
            $price = 180;
        }
        elseif($des == 'c3')
        {
            $price = 240;
        }
        else
        {
            $text = "Nothing Selected";
        }
    }
    ?>


    <br>
    <hr>
    <hr>
    <br>
    <h2>Order Your Desire Choice from below options: </h2>
    <br>
    <hr>
    <hr><br>



    <form method="post">
        <table>
            <tr>
                <td>
                    <span id="textz">
                        <span id="textZ">S</span>ELECT<span id="textZ"> I</span>TEM : </span>&nbsp;
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

                </td>
                
                <td>
                    <input id="addtocart" type="submit" value="Add To Cart" name="addtocart">
                </td>
            </tr>
        </table>

        <br>
        <hr>
        <hr>
        <br><br>


        <table>
            <tr>
            
                <td id="checkamount">
                    <span id="textz">
                        <span id="textZ">I</span>TEM AMOUNT : <span id="textZ">
                        ₹<?php echo $price ?>
                        </span></span>
                        <br>
                        <span id="textZ">
                        <?php echo $submit_msg ?>
                        </span>
                </td>
            </tr>
        </table>


        <br>
        <hr>
        <hr>
        <hr>
        <hr><br>

        <div id="buttoncenter">
            <input type="submit" value="Go To Cart" name="submit">
            <input type="button" value="Change Password" name="changepwd" onclick="window.location.href ='forgotpwd.php';">
        </div>
    </form>
    <br>
    <hr>
    <hr>
    <hr>
    <hr><br>


    <br><br>
    <p>Do suggest us at <a href="./feedback.php">feedback </a>form. <br> We care our Valuable Clients.</p>
</body>

</html>