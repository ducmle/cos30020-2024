<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Using hidden form field</title>
</head>

<body>
  <?php 
    // declare the state field (to be passed between client and server)
    $counter = $_POST["counter"];
    if (!isset($counter)) { // initialise it the first time
      $counter = 1;
    } else {
      $counter++; // auto increment
    }
  ?>
  <h1>Using hidden form field</h1>
  <form method="post">
    <p>
      <input type="submit" value="Send request" />
      <!-- use hidden input field to record the state field -->
      <input type="hidden" name="counter" value="<?= $counter ?>" />
    </p>
  </form>
</body>

</html>