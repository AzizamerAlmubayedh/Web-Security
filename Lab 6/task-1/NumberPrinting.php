<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>hello wolrd</h1>
    <?php

        $counter = 11; 
        $counter2 = 21;  
        while ($counter < 16)
        {
            
            while ($counter2 < 26)
            {
                echo $counter;
                echo "<p></p>";
                echo $counter2;   
                echo "<p></p>";
                
                $counter2 += 1;
                $counter += 1; 
                
            }
        }
    ?>
    
</body>
</html>