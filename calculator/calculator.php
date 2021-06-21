<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="width: 100%; height:auto; background-color:blue;">
    <div class="div1" style="margin: 0%;padding: 0%; font-weight:900;text-decoration:none; font-size:22pt; background-color:black; color:white; display:flex; justify-content:center; width: 100%; height: 500px; box-sizing: border-box;border: 2px solid red;border-radius: 30px; overflow: scroll;">
        <p>Calculator:</p>
        <div class="div2" style="border: 2px solid red; background-color:tomato; width:70%; height:auto;margin-top: 15px; border-radius: 40px;">
            <form method="POST">
                <input type="number" name="num1" placeholder="Enter Your 1st No." class="num1" style="font-size: 17pt; float: left; margin: 10px;">
                <input type="number" name="num2" placeholder="Enter your 2nd no." class="num2" style="font-size: 17pt; float: left; margin: 10px;">
                <select name="operation" style="margin: 10px; font-size: 18pt; float: left;">
                    <option value="Addition">Add</option>
                    <option value="Subs">Subs</option>
                    <option value="Multiply">Multiply</option>
                    <option value="Division">Divide</option>
                </select>
                <input type="submit" name="submit" style="border: 2px solid red; border-radius: 20px; text-decoration: none; font-size: 20pt; background-color: salmon; color: white; margin: 10px;display: flex; justify-content: center; padding-top: 6px; align-items: center;">
            </form>
            <div class="para" style="width: 100%; height: 150px; margin-top: 275px; display: flex; justify-content: center; align-items: center; background-color:black; border: 2px solid red; box-sizing:border-box; border-radius: 40px;">
                <?php
                if (isset($_POST['submit'])) {
                    $Num1 = $_POST['num1'];
                    $Num2 = $_POST['num2'];
                    $Operation = $_POST['operation'];

                    switch ($Operation) {
                        case 'Addition':
                            $sum = $Num1 + $Num2;
                            echo "The Addition is: ";
                            break;
                        case 'Subs':
                            $sum = $Num1 - $Num2;
                            echo "The subs. is: ";
                            break;
                        case 'Multiply':
                            $sum = $Num1 * $Num2;
                            echo "The Multiplication is: ";
                            break;
                        case 'Division':
                            $sum = $Num1 / $Num2;
                            echo "The Division is: ";
                            break;


                        default:
                            echo "Please input the following section: ";
                            break;
                    }
                    echo "$sum";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>