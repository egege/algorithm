<?php
function radixSort($arr, $maxDigit)
{
    $mod = 10;
    $dev = 1;
    $arrLength = count($arr);

    for ($i = 0; $i < $maxDigit; $i++,$dev *= 10,$mod *= 10) {
        $counter = [];

        for ($j = 0; $j < $arrLength; $j++) {
            $bucket = floor(($arr[$j] % $mod) / $dev);
            $counter[$bucket][] = $arr[$j];
        }

        // $pos = 0;
        // foreach ($counter as $bucket) {
        //     foreach ($bucket as $value) {
        //         $arr[$pos++] = $value;
        //     }
        // }
        $pos = 0;
        for ($bucketIndex = 0; $bucketIndex < 10; $bucketIndex++) {
            if (isset($counter[$bucketIndex])) {
                foreach ($counter[$bucketIndex] as $value) {
                    $arr[$pos++] = $value;
                }
            }
        }
    }

    return $arr;
}

function getMaxDigit($num) {
    if ($num == 0) {
        return 1;
    }
    $length = 0;
    for ($temp = $num; $temp != 0; $temp = floor($temp / 10)) {
        $length++;
    }

    return $length;
}
$arr = [2, 1, 7, 4, 6, 3, 3, 100, 11];
$maxDigit = getMaxDigit(max($arr));
$arr = radixSort($arr, $maxDigit);
print_r($arr);