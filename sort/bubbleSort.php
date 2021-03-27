<?php
function bubbleSort(&$arr) {
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return $arr;
    }
    
    for($bubbledNum = 0; $bubbledNum < $length - 1; $bubbledNum++) {
        for ($j = 1; $j < $length - $bubbledNum; $j++) {
            if ($arr[$j] < $arr[$j - 1]) {
                list($arr[$j - 1], $arr[$j]) = [$arr[$j], $arr[$j - 1]];
            }
        }
    }

    return $arr;
}

$arr = [2, 1, 7, 4, 6, 3];
bubbleSort($arr);
print_r($arr);
