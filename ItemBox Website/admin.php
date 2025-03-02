<?php
  require_once('authorize.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ITEMBOX (for only Admin)</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>ITEMBOX (for only Admin)</h2>
  <hr />

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  $query = "SELECT * FROM itembox ORDER BY price DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  echo '<table>';
  echo '<tr><th>Name</th><th>Date</th><th>Product</th><th>Action</th></tr>';
  while ($row = mysqli_fetch_array($data)) { 

    echo '<tr class="itemrow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['product'] . '</td>';
    echo '<td><a href="removeitem.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
      '&amp;name=' . $row['name'] . '&amp;product=' . $row['product'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Remove</a>';
    if ($row['approved'] == '0') {
      echo ' / <a href="approveitem.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
        '&amp;name=' . $row['name'] . '&amp;product=' . $row['product'] . '&amp;screenshot=' .
        $row['screenshot'] . '">Approve</a>';
    }
    echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
?>

</body> 
</html>
