<?php
$dailyForecast = <<<BLOCK
<p><strong>San Francisco daily weather
forecast</strong>: Today: Partly cloudy. Highs from the
60s to mid 70s. West winds 5 to 15 mph. Tonight:
Increasing clouds. Lows in the mid 40s to lower 50s.
West winds 5 to 10 mph.</p>
BLOCK;

$weatherFile = "data" . DIRECTORY_SEPARATOR . "sfweather.txt";
// we will learn to create a new file later
// for now, assume that it exists
if (is_writable($weatherFile)) {
  file_put_contents($weatherFile, $dailyForecast);
  echo "<p>The forecast information has been saved to
the $weatherFile file.</p>";
} else {
  echo "<p>The forecast information CANNOT be saved to
the $weatherFile file.</p>";
}
