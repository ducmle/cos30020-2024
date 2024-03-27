<?php
function beginCountdown() {
  for($count = 10; $count >= 0; $count--) {
    if ($count == 0) {
      echo "<p>We have liftoff!</p>";
    } else {
      echo "<p>Liftoff in $count seconds.</p>";
    }
  }
}

beginCntdown();

warning3();

function warning3()
{
  beginCountdown();
}

// function beginCountdown($time = 10)
// {
//   // if (!isset($time))
//   //   $time = 10;
//   for ($count = $time; $count >= 0; $count--) {
//     if ($count == 0) {
//       echo "<p>We have liftoff!</p>";
//     } else {
//       echo "<p>Liftoff in $count seconds.</p>";
//     }
//   }
// }

// beginCountdown();