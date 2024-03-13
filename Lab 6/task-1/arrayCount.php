<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Array Checking</h1>

    <?php

        $myArrya = array("apples", "bananas", "peaches","Papaeras");
        function checkElement($element, $array)
        {
            return in_array($element, $array);
        }


        function arrayCount($array)
        {
            return count($array);
        }


        if ($_SERVER['REQUEST_METHOD'] === "POST")
        {
            $fruit = $_POST['fruitName'];

            
            
            echo "<p> The array has ". count($myArrya). " Fruit elements, can you guess them</p>";

        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" > 
        <label for="">Guess the fruit please:   ?</label>
        <input type="text" name="fruitName">
        <input type="submit" value="Check">
    </form>

        <?php
            echo "<p>$fruit ". (checkElement($fruit,$myArrya) ? "is here!!" : "not here ;("). "</p>";
        ?>

    
</body>
</html>