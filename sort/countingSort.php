<?php

function countingSort($arr, $maxValue = null)
{
    if ($maxValue === null) {
        $maxValue = max($arr);
    }

    for ($m = 0; $m < $maxValue + 1; $m++){
        $bucket[] = null;
    }

    $arrLength = count($arr);
    for ($i = 0; $i < $arrLength; $i++){
        if (!array_key_exists($arr[$i], $arr)) {
            $bucket[$arr[$i]] = 0;
        }
        $bucket[$arr[$i]]++;
    }

    $sortedIndex = 0;
    foreach($bucket as $arrayValue => $count) {
        for (; $count > 0; $count--) {
            $arr[$sortedIndex++] = $arrayValue;
        }
    }

    return $arr;
}
$arr = [2, 1, 7, 4, 6, 3, 3];
$arr = countingSort($arr);
print_r($arr);