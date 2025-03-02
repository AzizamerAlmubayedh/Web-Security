<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ITEMBOX for Your Game</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>ITEMBOX for Your Game</h2>
  <p>Welcome, ITEMBOX for more fun game-play !!!<a href="additem.php">add your items</a>.</p>
  <hr />

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Show me the list of gameitems
  $query = "SELECT * FROM itembox WHERE approved = 1 ORDER BY price DESC, date ASC";
  $data = mysqli_query($dbc, $query);


  echo '<table>';
  $i = 0;
  while ($row = mysqli_fetch_array($data)) { 
    if ($i == 0) {
      echo '<tr><td colspan="2" class="topproductheader">Top Product: ' . $row['product'] . '</td></tr>';
    }
    echo '<tr><td class="productinfo">';
  
    echo '<span class="price">' ."$". $row['price'] . '</span><br />';
    echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
    echo '<strong>Product:</strong> ' . $row['product'] . '<br />';
    echo '<strong>Date:</strong> ' . $row['date'] . '</td>';

    if (is_file(UPLOADPATH . $row['screenshot']) && filesize(UPLOADPATH . $row['screenshot']) > 0) {
      echo '<td><img src="' . UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
    }
    else {
      echo '<td><img src="' . UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
    }
    $i++;
  }
  echo '</table>';

  mysqli_close($dbc);
?>

</body> 
</html>
