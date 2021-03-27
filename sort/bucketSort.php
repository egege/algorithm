<?php

function bucketSort($arr, $bucketSize = 5)
{
    $length = count($arr);
    if ($length < 2) {
        return $arr;
    }

    $maxValue = max($arr);
    $minValue = min($arr);

    $bucketCount = ceil(($maxValue - $minValue) / $bucketSize);
    $buckets = [];
    for ($i = 0; $i < $bucketCount; $i++) {
        $buckets[$i] = [];
    }

    for ($i = 0; $i < $length; $i++) {
        $bucketIndex = floor(($arr[$i] - $minValue) / $bucketSize);
        $buckets[$bucketIndex][] = $arr[$i];
    }

    $sortedArr = [];
    for ($i = 0; $i < $bucketCount; $i++) {
        if ($buckets[$i]) {
            $bucketTemp = $buckets[$i];
            sort($bucketTemp);
            $sortedArr = array_merge($sortedArr, $bucketTemp);
        }
    }

    return $sortedArr;
}
$arr = [2, 1, 7, 4, 6, 3, 3];
$arr = bucketSort($arr);
print_r($arr);