<?php
/* 
 @param: $levels - the bit-wise combination of levels to be used or omitted; e.g. ~E_WARNING & ~E_USER_NOTICE
 */
function setErrorReporting($levels, bool $negate = false) {
  $oldErrorLevel = error_reporting();
  $thisErrorLevel = $negate ? $oldErrorLevel & $levels : $oldErrorLevel | $levels;
  error_reporting($thisErrorLevel);
}