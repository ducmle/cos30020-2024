<?php
for1();
for2();

/* 
 * @param $numbers: an array of numbers
 * @effects return a random element of numbers
 */
function getRandElement($numbers) {
  /* pseudocode:
    1. size = the array size (upper bound of the random range)
    2. random index = a random number in the range [0,size)
      rand(0,size-1)
    3. get & return the element at the random index
  */
}

function for2() {
  $daysOfWeek = ["Monday", "Tuesday",
  "Wednesday", "Thursday", "Friday",
  "Saturday", "Sunday"];
  foreach ($daysOfWeek as $day) {
    echo "<div>$day</div>";
  }
}

function for1() {
  $fastFoods = ["pizza","burgers",
    "french fries","tacos",
    "fried chicken"];
  $len = count($fastFoods);

  var_dump($fastFoods);

  echo "<br/>";
  for ($count = 0; $count < $len; $count++) {
    echo $fastFoods[$count], "<br>";
  }
}
?>