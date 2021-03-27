<?php
function mergeSort($arr)
{
    $length = count($arr);
    if ($length < 2) {
        return $arr;
    }

    $mid = floor($length / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    return merge(mergeSort($left), mergeSort($right));
}

function merge($left, $right)
{
    $result = [];

    while(count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    while(count($left)) {
        $result[] = array_shift($left);
    }

    while(count($right)) {
        $result[] = array_shift($right);
    }

    return $result;
}

$arr = [2, 1, 7, 4, 6, 3];
$arr = mergeSort($arr);
print_r($arr);