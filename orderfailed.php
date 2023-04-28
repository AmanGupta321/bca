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
            color: red;
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
            background-color: rgb(243 159 159 / 46%);
            border: 5px double rgb(228 18 18 / 97%);
        }
    </style>
</head>

<body>
    <?php
        require("clearAllTextFile.php");
    ?>
    <div id="border"></div>
    <table>
        <tr>
            <td>
                <h1>ORDER FAILED !!!</h1>
            </td>
        </tr>
        
        <tr>
            <td><br><input type="button" value="Sign in Again" onclick="window.location.href='login.php';"></td>
        </tr>
    </table>


</body>

</html>