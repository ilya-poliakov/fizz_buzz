<?php
/**
 * Created by PhpStorm.
 * User: SP
 * Date: 14.01.2019
 * Time: 11:43
 */

echo "Greetings to FIZZ-BUZZ \nThe data will be delivered from file\n";
$results = "FIZZ BUZZ RESULTS\n";
$file = fopen(__DIR__ . '/fizz-buzz-params.txt', 'r');
while (!feof($file)) {
    $fizzBuzzParams = fgets($file);
    $values = explode(',', $fizzBuzzParams);
    if (isset($values[0]) && isset($values[1]) && isset($values[2]) && count($values) == 3) {
        $fizz = (int)$values[0];
        $buzz = (int)$values[1];
        $finalNumber = (int)$values[2];
        $numbers = range(1, $finalNumber, 1);
        $fizzBuzz = array_map(function ($i) use ($fizz, $buzz) {
            $isFizz = !($i % $fizz);
            $isBuzz = !($i % $buzz);
            switch ($i) {
                case $isFizz && $isBuzz:
                    return 'FB';
                case $isBuzz:
                    return 'B';
                case $isFizz:
                    return 'F';
                default :
                    return $i;
            }
        }, $numbers);
        $results.= implode(' ', $fizzBuzz);
        $results .= "\n";
    } else $results .= "\nWARNING - wrong data\n";
}
fclose($file);
$file = fopen(__DIR__ . '/fizz-buzz-results.txt', 'w');
fputs($file, $results);
fclose($file);
