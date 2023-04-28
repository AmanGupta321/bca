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
            require("cart_store_in_database.php");
            echo '<script type="text/javascript">
                window.location.href = "./gateway.php"; </script>';      
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
?>