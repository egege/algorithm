<?php
function selectSort(&$arr)
{
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return $length;
    }

    for ($i = 0; $i < $length - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        
        if ($minIndex != $i) {
            list($arr[$minIndex], $arr[$i]) = [$arr[$i], $arr[$minIndex]];
        }
    }
}

$arr = [2, 1, 7, 4, 6, 3];
selectSort($arr);
print_r($arr);