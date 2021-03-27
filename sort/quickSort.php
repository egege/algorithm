<?php

function quickSort1($arr)
{
    $length = count($arr);
    if ($length < 2) {
        return $arr;
    }

    $middle = $arr[0];
    $rightArr = [];
    $leftArr = [];

    for ($i = 1; $i < $length; $i++) {
        if ($arr[$i] > $middle) {
            $rightArr[] = $arr[$i];
        } else {
            $leftArr[] = $arr[$i];
        }
    }

    $leftArr = quickSort1($leftArr);
    $leftArr[] = $middle;
    $rightArr = quickSort1($rightArr);

    return array_merge($leftArr, $rightArr);
}




function quickSort2(&$arr, $left, $right)
{
    if ($left < $right) {
        $partition = partition($arr, $left, $right);
        quickSort2($arr, $left, $partition - 1);
        quickSort2($arr, $partition + 1, $right);
    }

    return $arr;
}

function partition(&$arr, $left, $right) :int
{
    $pivot = $left;
    $index = $pivot + 1;
    for ($i = $index; $i <= $right; $i++) {
        if ($arr[$i] < $arr[$pivot]) {
            swap($arr, $i, $index);
            $index++;
        }
    }

    swap($arr, $pivot, $index - 1);
    return $index - 1;
}

function swap(&$arr, $i, $j) 
{
    list($arr[$i], $arr[$j]) = [$arr[$j], $arr[$i]];
}

$arr = [2, 1, 7, 4, 6, 3];
$arr = quickSort2($arr, 0, count($arr) - 1);
print_r($arr);