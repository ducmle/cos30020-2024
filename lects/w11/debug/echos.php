<?php

echo calculatePay();

function calculatePay()
{
  $payRate = 15;
  $numHours = 40;
  $grossPay = $payRate * $numHours;
  echo "<p>grossPay: $grossPay</p>";  // debug
  $federalTaxes = $grossPay * .06794;
  $stateTaxes = $grossPay * .0476;
  $socialSecurity = $grossPay * .062;
  $medicare = $grossPay * .0145;
  $netPay = $grossPay - $federalTaxes;
  $netPay -= $stateTaxes;
  $netPay -= $socialSecurity;
  $netPay -= $medicare;
  return number_format($netPay, 2);
}
