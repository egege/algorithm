<?php 
function shellSort(&$arr)
{
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return $arr;
    }

    $gap = 1;
    while ($gap < $length / 3) {
        $gap = $gap * 3 + 1;
    }
    for (; $gap >=1; $gap = floor($gap / 3)) {
        for ($i = $gap; $i < $length; $i += $gap) {
            $insertNum = $arr[$i];
            for ($j = $i - $gap; $j >=0 && $arr[$j] > $insertNum; $j -= $gap) {
                $arr[$j + $gap] = $arr[$j];
            }
            $arr[$j + $gap] = $insertNum;
        }
    }
}

$arr = [2, 1, 7, 4, 6, 3];
shellSort($arr);
print_r($arr);