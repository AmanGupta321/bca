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
            require("cart_btn_functions.php");
            require("cart_user_selected_item_table.php");
       
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