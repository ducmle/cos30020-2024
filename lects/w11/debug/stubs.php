<?php

echo calculatePay();

function calculatePay()
{
  $payRate = 15;
  $numHours = 40;
  $grossPay = doGrossPay($payRate, $numHours); // $payRate * $numHours;
  // echo "<p>grossPay: $grossPay</p>";  // debug
  // call stubs here
  $federalTaxes = doFedTax($grossPay); //$grossPay * .06794;
  $stateTaxes = doStateTax($grossPay);// $grossPay * .0476;

  $socialSecurity = $grossPay * .062;
  $medicare = $grossPay * .0145;
  $netPay = $grossPay - $federalTaxes;
  $netPay -= $stateTaxes;
  $netPay -= $socialSecurity;
  $netPay -= $medicare;
  return number_format($netPay, 2);
}

// normal function
function doGrossPay($payRate, $numHours) {
  return $payRate * $numHours;
}

// stub
function doFedTax($grossPay) {
  return 100;
}

// stub
function doStateTax($grossPay) {
  return 100;
}