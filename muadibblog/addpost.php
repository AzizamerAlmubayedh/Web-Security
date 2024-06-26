<?php
require('config/db.php');
include('nav.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']); 
    $body = mysqli_real_escape_string($conn, $_POST['body']); 
    $author = mysqli_real_escape_string($conn, $_POST['author']); 

    $query = "INSERT INTO post(title, author, body) VALUES('$title', '$author', '$body')"; 

    if(mysqli_query($conn, $query)) { 
        header('Location: ' . ROOT_URL);
        exit();
    } else { 
        echo 'ERROR: '. mysqli_error($conn); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc/header.php'); ?>
</head>
<body>
    <div class="container"> 
        <h1>Add Post</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <div class="form-group"> 
                <label>Title</label> 
                <input type="text" name="title" class="form-control"> 
            </div> 
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control"> 
            </div>
            <div class="form-group"> 
                <label>Body</label> 
                <textarea name="body" class="form-control"></textarea> 
            </div> 
            <input type="submit" name="submit" value="submit" class="btn btn-primary"> 
        </form>
    </div>
</body>
</html>
