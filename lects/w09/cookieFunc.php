<?php

function getCookieConfig() {
  return array(
    "expireInterval" => 60 * 60,  // seconds
    "path" => "/", 
    "domain" => ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false,
    "secure" => false
    );
}