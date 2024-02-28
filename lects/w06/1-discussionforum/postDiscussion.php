<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Discussion forum</title>
</head>

<body>
  <!-- front-end -->
  <h1>Post new message</h1>
  <hr />
  <!-- back-end: handle post -->
  <?=handlePost() ?>
  <!-- front-end: continues -->
  <form method="post">
    <p>
      <label for="topic">Topic:</label>
      <input type="text" name="topic" id="topic">
      <label for="topic">Name:</label>
      <input type="text" name="name" id="name">
    </p>
    <div>
      <label for="message">Message:</label>
    </div>
    <div>
      <textarea name="message" id="message" cols="50" rows="10"></textarea>
    </div>
    <input type="submit" value="Post message">
    <input type="reset" value="Reset">
  </form>
  <hr/>
  <a href="viewDiscussion.php">View Discussion</a>
</body>
</html>

<?php
  // back end
  function handlePost() {
    $topic = $_POST["topic"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    if (isset($topic) && isset($name) && isset($message)) {
      // write message to file
      $postMessage = $topic . "~" . $name . "~" . $message . PHP_EOL;
      $file = "data" . DIRECTORY_SEPARATOR . "messages.txt";
      $messageStore = fopen($file, "a");
      if ($messageStore === false) {
        die("Failed to open message store");
      }
      fwrite($messageStore, "$postMessage");
      fclose($messageStore);
      // return a response
      $msgTemp = <<<BLOCK
      <b>Topic:</b> {{topic}}<br/>
      <b>Name:</b> {{name}}<br/>
      <b>Message:</b> {{message}}<br/>
      BLOCK;
      return str_replace(
        array("{{topic}}", "{{name}}", "{{message}}"),
        array($topic, $name, $message),
        $msgTemp
      );
    }
  }
  ?>