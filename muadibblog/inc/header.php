<?php
    require('config/db.php');

    //create a query
    $query = 'SELECT * FROM post';

    //get result 
    $result = mysqli_query($conn, $query);

    //fetch data (associative array is basically ['name' => username])
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);

    // free result (free it from memory)
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Muadib's Blog</title>
  <meta author="Abdulaziz Amer">
  <meta name="SQL lab">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
   
</body>

</html>