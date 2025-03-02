<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ITEMBOX</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>ITEMBOX</h2>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // FILTERs (for Security)
    $name = $_POST['name'];
    $product = $_POST['product'];
    $price =$_POST['price'];
    $screenshot =$_FILES['screenshot']['name'];

    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size']; 

    if (!empty($name) && !empty($product) && !empty($price) && !empty($screenshot)) {

      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= MAXFILESIZE)) {

        if ($_FILES['screenshot']['error'] == 0) {
          // Move the file to the target upload folder
          $target = UPLOADPATH . $screenshot;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Write the data to the database
            $query = "INSERT INTO itembox (date, name, product, price, screenshot,approved) 		VALUES (NOW(), '$name', '$product', $price, '$screenshot',0)";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Thanks for adding your Items! It will be reviewed and added to the Itembox-list as soon as possible.</p>';

            echo '<p><strong>Name:</strong> ' . $name . '<br />';
            echo '<strong>Product:</strong> ' . $product . '<br />';
	   echo '<strong>Price:</strong> ' . $price . '<br />';
            echo '<img src="' . UPLOADPATH . $screenshot . '" alt="Product image" /></p>';
            echo '<p><a href="index.php">&lt;&lt; Back to the List</a></p>';

            $name = "";
	  $product="";
            $price = "";
            $screenshot = "";

            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (MAXFILESIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to add your item.</p>';
    }
  }
?>

  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFILESIZE; ?>" />
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />

    <label for="name">Product:</label>
    <input type="text" id="product" name="product" value="<?php if (!empty($product)) echo $product; ?>" /><br />

    <label for="score">Price:</label>
    <input type="text" id="price" name="price" value="<?php if (!empty($price)) echo $price; ?>" /><br />

    <label for="screenshot">Screen shot:</label>
    <input type="file" id="screenshot" name="screenshot" />
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body> 
</html>
