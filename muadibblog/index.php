<?php
require('config/db.php');
include('nav.php');
//create a query
$query = 'SELECT * FROM post WHERE id = 1';

//get result 
$result = mysqli_query($conn, $query);

//fetch data (associative array is basically ['name' => 'Hamoud'])
$post = mysqli_fetch_assoc($result);
//var_dump($posts);

// free result (free it from memory)
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
        <?php foreach($posts as $post) : ?>
                <div class="card card-body bg-light">
                    <h3><?php echo $post['title']; ?></h3>
                    <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                    <p><?php echo $post['body']; ?></p>
                    <a class="btn btn-primary" href="post.php?id=<?php echo $post['id']; ?>">Read more</a>
                </div>
            <?php endforeach; ?>
            <!--<script src="js/script.js"></script>-->
    </div>

    
</body>
