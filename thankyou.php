<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANK YOU</title>
    <style>
        input {
            background-color: #3fb6b2;
            font-family: 'Poppins', sans-serif;
            padding: 12px 45px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            color: #ffffff;
            outline: none;
            font-weight: bold;
        }

        td {
            color: green;
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
        }

        table {
            margin-right: auto;
            margin-left: auto;
            margin-top: 150px;
        }

        div {
            position: absolute;
            top: 95px;
            left: 150px;
            width: 80%;
            z-index: -1;
            height: 55vh;
            background-color: rgba(159, 243, 159, 0.459);
            border: 5px double rgba(247, 134, 89, 0.973);
        }
    </style>
</head>

<body>
    <?php
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
    ?>
    <div id="border"></div>
    <table>
        <tr>
            <td>
                <h1>LOGGED OUT</h1>
            </td>
        </tr>
        <tr>
            <td id="td2">Thank You for using Golden Bakery.</td>
        </tr>
        <tr>
            <td><br><input type="button" value="Sign in Again" onclick="window.location.href='login.php';"></td>
        </tr>
    </table>


</body>

</html>