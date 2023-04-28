<?php
    $usertextfile1 = fopen("usi.txt", "r+");
    $usertextfile2 = fopen("login_data.txt", "r+");
    $usertextfile3 = fopen("price_data.txt", "r+");
    $usertextfile4 = fopen("finalprice.txt", "r+");
    $usertextfile5 = fopen("usq.txt", "r+");
    $usertextfile6 = fopen("order_id.txt", "r+");
    ftruncate($usertextfile1, 0);
    ftruncate($usertextfile2, 0);
    ftruncate($usertextfile3, 0);
    ftruncate($usertextfile4, 0);
    ftruncate($usertextfile5, 0);
    ftruncate($usertextfile6, 0);
    fclose($usertextfile1);
    fclose($usertextfile2);
    fclose($usertextfile3);
    fclose($usertextfile4);
    fclose($usertextfile5);
    fclose($usertextfile6);
?>