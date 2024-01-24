<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Strings (4)</title>
</head>

<body>
  <?php
  $bookTitle = "The Cask of Amontillado";
  echo "<p>\"$bookTitle\" contains " .
    str_word_count($bookTitle) . " words.</p>";
  // 
  $email = "ppresident@pwhitehouse.gov";
  echo "strpos($email, \"@\"): ", strpos($email, "@"), "<br/>"; //returns 9
  echo "strpos($email, \"p\"): ", strpos($email, "p"), "<br/>"; //returns 0
  echo "strpos($email, \"l\"): ", 
    ((strpos($email, "l") === false) ? "false" : "?"), "<br/>"; //returns false

  echo "<p></p>";
  // 
  //If you want to get the text before the occurence of the character
  //you want to find, simply use the function strRev twice:

  
  $stringA = "user@example.com";
  // substr
  $user = substr($stringA, 0, strpos($stringA, "@"));
  echo "substr($stringA, 0, strpos($stringA, \"@\")) = $user <br/>"; //prints user

  $user = substr($stringA, 5, 5);
  echo "substr($stringA, 5, 5) = $user <br/>";

  // substring
  $toFind = "@";
  $subStr = substr($stringA, 0, strpos($stringA,$toFind));
  echo "substr($stringA, 0, strpos($stringA,$toFind)): $substr";
  echo "<p></p>";

  // strchr (same result)
  $user = strrchr($stringA, "@");
  echo "strrchr($stringA, \"@\") = $user <br/>"; //prints user
  echo "<p></p>";

  $toFind = "@";
  echo "strrev(strchr(strrev($stringA),$toFind)): ";
  $stringA = strrev($stringA); //The first time
  $result = strchr($stringA, $toFind);  // in reverse order
  $result = strrev($result); // The second time
  echo $result, "<br/>"; //prints user@

  echo "<p></p>";

  //You can use it this way instead:
  // echo strrev( strchr(strrev($stringA),$toFind) );

  // tokenizer
  $presidents = "George W. Bush;William Clinton;
George H.W. Bush;Ronald Reagan;Jimmy Carter";
  echo '$presidents' . " = $presidents<br/>";

  $tok = ";";   // "; .";
  $president = strtok($presidents, $tok);
  while ($president != NULL) {
    echo "<b><i>$president</i></b><br/>";
    $president = strtok($tok);
  }

  echo "<p></p>";

  // split/explode
  $tok = ";";
  $presidentArray = explode($tok, $presidents);
  //how about "; " ???
  foreach ($presidentArray as $president) {
    echo "$president<br />";
  }

  echo "<p></p>";

  // implode
  $presidents = implode("| ", $presidentArray);
  echo $presidents, "<br/>";
  ?>
</body>

</html>