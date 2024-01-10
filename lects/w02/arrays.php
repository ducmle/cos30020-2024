<?php
// $votingAge = 18;
// echo "<div>The legal voting age is $votingAge </div>";
// echo '<div>The legal voting age is $votingAge </div>', "<br/>";

// // constant
// define("UnitCode", "COS30020");
// $unitCode = UnitCode;
// echo "unit code: ", $unitCode, "<br/>", PHP_EOL;

// arrays
$provinces = 
  // createArray1()
  createArray2()
  ;

echo "Canada's smallest province is $provinces[1]", "<br/>", PHP_EOL;

print("count(".'$provinces'.") = ". count($provinces). PHP_EOL."<br/>");
echo PHP_EOL, 'var_dump($provinces) = ', var_dump($provinces), "<br/>";

$arrStr = print_r($provinces, true);
echo '$provinces = ', $arrStr, "<br/>";


// echo PHP_EOL, 'var_dump($provinces) = ', var_dump($provinces), "<br/>", PHP_EOL;

// print("count(".'$provinces'.") = ". count($provinces). PHP_EOL);

// echo "Canada's smallest province is $provinces[1]", "<br/>", PHP_EOL;

// // count(array)
// $territories = array("Nunavut", "Northwest
//         Territories", "Yukon Territory");
// echo PHP_EOL, "<div>Canada has ",
// count($provinces), " provinces and ",
// count($territories), " territories.</div>";

// // print_r
// echo PHP_EOL;
// print_r($territories);

// // change element
// $hospitalDepts = array(
//     "Anesthesia", // first element (0)
//     "Molecular Biology", // second element(1)
//     "Neurology"); // third element (2)
// $hospitalDepts[0] = "Anesthesiology";

// mixed-type array
$mixedArr = array(
  "hello",
  1,
  2,
  "world"
);

// print_r("mixed array: \n" . print_r($mixedArr, true));
echo '$mixedArr = ', var_dump($mixedArr);

function createArray1() {
  $provinces = array(
    "Newfoundland and Labrador",
    "Prince Edward Island",
    "Nova Scotia",
    "New Brunswick",
    "Quebec",
    "Ontario",
    "Manitoba",
    "Saskatchewan",
    "Alberta",
    "British Columbia",
  );
  return $provinces;
}

function createArray2() {
  // array (same as above)
  $provinces[] = "Newfoundland and Labrador";
  $provinces[] = "Prince Edward Island";
  $provinces[] = "Nova Scotia";
  $provinces[] = "New Brunswick";
  $provinces[] = "Quebec";
  $provinces[] = "Ontario";
  $provinces[] = "Manitoba";
  $provinces[] = "Saskatchewan";
  $provinces[] = "Alberta";
  $provinces[] = "British Columbia";

  return $provinces;
}