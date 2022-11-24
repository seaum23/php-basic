<?php

use Samin\Data\HashMap;
require "vendor/autoload.php";

$hashMap = new HashMap();

echo $hashMap->sizeof();
echo PHP_EOL;
$hashMap->add(1, 100);
// echo PHP_EOL;
var_dump( $hashMap->get(2) );