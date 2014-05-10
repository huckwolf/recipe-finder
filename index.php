<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-9
 * Time: 11:50
 * To change this template use File | Settings | File Templates.
 */

// define time zone and set it to Sydney time zone, this is for checking food used-by.
require('autoload.php');

date_default_timezone_set('Australia/Sydney');

$rawFood = new RecipeFinder\RecipeFinder($argv[1], file_get_contents($argv[2]));
$result  = $rawFood->findBestMatchFoodForTonight();

print_r($result);
echo "\n";
//echo $result."\n";