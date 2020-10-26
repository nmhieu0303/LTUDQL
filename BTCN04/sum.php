<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
</head>

<body style="height:100vh;display: flex;justify-content: center;align-items: center;">
    <h1 >
    Kết quả phép tính: 
        <?php
        $num1 = (int)$_POST["number1"];
        $num2 = (int)$_POST["number2"];
        echo ($num1 . " + " . $num2 . " = " . ($num1 + $num2));
        ?>
    </h1>
</body>

</html>