<?php
define('ROOT_URL', 'http://localhost/muadibblog/'); // Include the protocol
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul>
            <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_URL; ?>addpost.php">Add Post</a></li>
        </ul>
    </div>
</body>
</html>
