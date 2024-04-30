<?php
require('config/db.php');
include('nav.php');

$id = mysqli_real_escape_string($conn, $_GET['id']);

//create a query
$query = 'SELECT * FROM post WHERE id = '.$id;
$result = mysqli_query($conn, $query);


//fetch data (associative array is basically ['name' => 'Hamoud'])
$post = mysqli_fetch_assoc($result);

mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>
<head>
    <?php 
        include ('inc/header.php');
    ?>
</head>
<body>
    <div class="container">
        <h1>Posts</h1>
       
                <div class="card card-body bg-light">
                    <h3><?php echo $post['title']; ?></h3>
                    <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                    <p><?php echo $post['body']; ?></p>
                </div>
            
    </div>

    
</body>
